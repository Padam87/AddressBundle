<?php

namespace Padam87\AddressBundle\Service;

use JMS\DiExtraBundle\Annotation as DI;
use Padam87\AddressBundle\Entity\AddressInterface;

/**
 * @DI\Service("padam87.address.formatter")
 */
class FormatterService
{
    const FLAG_HTML      = 1;
    const FLAG_NOBR      = 2;

    public $patterns = array(
        'generic' => "{street}\n{?district}\n{city}\n{?state}\n{zipCode}",
        'us' => "{street}\n{city}, {state} {zipCode}",
        'hu' => "{city}\n{street}\n{zipCode}"
    );

    public $fallbackPattern = 'generic';

    /**
     * Formats an address
     *
     * @param \Padam87\AddressBundle\Entity\Address $address
     * @param string $countryCode
     * @param int $flags
     * @return string
     */
    public function format(AddressInterface $address, $flags = 0)
    {
        $string = preg_replace_callback(
            "/{([^}]*)}/",
            function($matches) use ($address) {
                $match = $matches[1];
                $optional = false;

                if ($match[0] == '?') {
                    $match = str_replace("?", "", $match);
                    $optional = true;
                }

                $getter = "get" . str_replace(" ", "", ucwords(str_replace("_", " ", $matches[1])));

                if (method_exists($address, $getter)) {
                    return $address->$getter();
                } elseif ($optional) {
                    return '';
                } else {
                    return '{' . $matches[1] . '}';
                }
            },
            $this->getPattern($address->getCountry())
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
     * @param string $countryCode
     * @return string
     */
    protected function getPattern($countryCode = null)
    {
        $pattern = null;
        $countryCode = strtolower($countryCode);

        if ($countryCode != null && isset($this->patterns[$countryCode])) {
            $pattern = $this->patterns[$countryCode];
        } else {
            $pattern = $this->patterns[$this->fallbackPattern];
        }

        return $pattern;
    }

    /**
     * Determines if a format/flag was used or not
     *
     * @param type $flags
     * @param type $flag
     * @return boolean
     */
    protected function isFlagged($flags, $flag)
    {
        return ($flags & $flag) === $flag;
    }
}