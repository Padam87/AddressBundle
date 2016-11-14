<?php

namespace Padam87\AddressBundle\Twig\Extension;

use Padam87\AddressBundle\Entity\AddressInterface;
use Padam87\AddressBundle\Service\Formatter;

class AddressExtension extends \Twig_Extension
{
    public $formatter;

    /**
     * @param Formatter $formatter
     */
    public function setFormatter(Formatter $formatter)
    {
        $this->formatter = $formatter;
    }

    /**
     * {@inheritdoc}
     */
    public function getFilters()
    {
        return array(
            'address' => new \Twig_Filter_Method($this, 'address')
        );
    }

    public function address(AddressInterface $address, $flags = 0)
    {
        return $this->formatter->format($address, $flags | Formatter::FLAG_HTML);
    }

    /**
     * Name of this extension
     *
     * @return string
     */
    public function getName()
    {
        return 'address';
    }
}
