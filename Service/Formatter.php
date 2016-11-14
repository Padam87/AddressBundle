<?php

namespace Padam87\AddressBundle\Service;

use Padam87\AddressBundle\Entity\AddressInterface;
use Symfony\Component\Intl\Intl;

class Formatter
{
    const FLAG_HTML = 1;
    const FLAG_INLINE = 2;

    /**
     * @var \Twig_Environment
     */
    private $twig;

    public function setTwig(\Twig_Environment $twig)
    {
        $this->twig = $twig;
    }

    /**
     * Formats an address
     *
     * @param AddressInterface $address
     * @param int              $flags
     *
     * @return string
     */
    public function format(AddressInterface $address, $flags = 0)
    {
        $this->twig->enableStrictVariables();

        try {
            $template = $this->twig->loadTemplate('@Padam87Address/' . strtoupper($address->getCountry()) . '.twig');
        } catch (\Twig_Error_Loader $e) {
            $template = $this->twig->loadTemplate('@Padam87Address/default.twig');
        }

        $context = array_merge(
            $address->__toArray(),
            [
                'countryName' => Intl::getRegionBundle()->getCountryName(strtoupper($address->getCountry())),
                'eol' => $this->isFlagged($flags, self::FLAG_INLINE)
                    ? ', '
                    : ($this->isFlagged($flags, self::FLAG_HTML) ? '<br>' : PHP_EOL)
            ]
        );

        $string = trim($template->render($context));

        // remove multiple line breaks
        while (strstr($string, $context['eol'] . $context['eol']) !== false) {
            $string = str_replace($context['eol'] . $context['eol'], $context['eol'], $string);
        }

        // remove multiple commas
        while (strstr($string, ",,") !== false) {
            $string = str_replace(",,", ",", $string);
        }

        return $string;
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
