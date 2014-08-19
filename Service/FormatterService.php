<?php

namespace Padam87\AddressBundle\Service;

use Padam87\AddressBundle\Entity\AddressInterface;
use Symfony\Component\Intl\Intl;

class FormatterService
{
    const FLAG_HTML      = 1;
    const FLAG_NOBR      = 2;
    const FLAG_NOCASE    = 4;

    /**
     * Valid tokens: country, state, county, city, zipCode, district, street
     *
     * Available modifiers:
     *  ?   Optional token
     *  ^   Convert value to uppercase
     *  ˇ   Convert value to lowercase
     *  \n  Line break
     *
     * @var array
     */
    public $patterns = array(
        'generic' => "{street}\n{?district}\n{city}\n{?state}\n{zipCode}\n{country}",
        'US' => "{street}\n{^city}, {^state} {^zipCode}\n{^country}",
        'GB' => "{street}\n{^city}\n{?^county}\n{^zipCode}\n{^country}",
        'HU' => "{city} {?district}\n{street}\n{zipCode}\n{country}"
    );

    public $fallbackPattern = 'generic';

    /**
     * Formats an address
     *
     * @param AddressInterface|array $address
     * @param int                    $flags
     *
     * @return string
     */
    public function format($address, $flags = 0)
    {
        $formatter = $this;

        $string = preg_replace_callback(
            "/{([^}]*)}/",
            function ($matches) use ($formatter, $address, $flags) {
                $match = $matches[1];

                $optional = false;
                $toUpper = false;
                $toLower = false;

                if (strstr($match, "?") != false) {
                    $match = str_replace("?", "", $match);
                    $optional = true;
                }

                if (strstr($match, "^") != false) {
                    $match = str_replace("^", "", $match);
                    $toUpper = true;
                }

                if (strstr($match, "ˇ") != false) {
                    $match = str_replace("ˇ", "", $match);
                    $toLower = true;
                }

                $value = null;

                if ($address instanceof AddressInterface) {
                    $getter = "get" . str_replace(" ", "", ucwords(str_replace("_", " ", $match)));

                    if (method_exists($address, $getter)) {
                        $value = $address->$getter();
                    }
                } elseif (is_array($address) && array_key_exists($match, $address)) {
                    $value = $address[$match];
                }

                if ($value === null) {
                    if ($optional) {
                        $value = '';
                    } else {
                        $value = '{' . $matches[1] . '}';
                    }
                }

                if ($match === 'country') {
                    $value = Intl::getRegionBundle()->getCountryName(strtoupper($value));
                }

                if (!$formatter->isFlagged($flags, \Padam87\AddressBundle\Service\FormatterService::FLAG_NOCASE)) {
                    if ($toUpper) {
                        $value = strtoupper($value);
                    }

                    if ($toLower) {
                        $value = strtolower($value);
                    }
                }

                return $value;
            },
            $this->getPattern($address)
        );

        // remove multiple line breaks
        while (strstr($string, "\n\n") != false) {
            $string = str_replace("\n\n", "\n", $string);
        }

        // remove multiple commas
        while (strstr($string, ",,") != false) {
            $string = str_replace(",,", ",", $string);
        }

        if ($this->isFlagged($flags, self::FLAG_NOBR)) {
            $string = str_replace("\n", " ", $string);
        }

        if ($this->isFlagged($flags, self::FLAG_HTML)) {
            $string = nl2br($string);
        }

        return $string;
    }

    /**
     * Returns the pattern for the given country.
     * Falls back to the fallback pattern, if no pattern was specified for the counrty
     *
     * @param AddressInterface|array $address
     *
     * @return string
     */
    protected function getPattern($address)
    {
        $pattern = null;
        $countryCode = $address instanceof AddressInterface
            ? $address->getCountry()
            : $address['country']
        ;
        $countryCode = strtolower($countryCode);

        if ($countryCode != null && isset($this->patterns[strtoupper($countryCode)])) {
            $pattern = $this->patterns[strtoupper($countryCode)];
        } else {
            $pattern = $this->patterns[$this->fallbackPattern];
        }

        return $pattern;
    }

    /**
     * Determines if a format/flag was used or not
     *
     * @param int $flags
     * @param int $flag
     *
     * @return boolean
     */
    public function isFlagged($flags, $flag)
    {
        return ($flags & $flag) === $flag;
    }
}