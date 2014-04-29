<?php

namespace Padam87\AddressBundle\Twig\Extension;

use Padam87\AddressBundle\Service\FormatterService;

class AddressExtension extends \Twig_Extension
{
    public $formatter;

    /**
     * @param FormatterService $formatter
     */
    public function __construct(FormatterService $formatter)
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

    public function address($address, $flags = 0)
    {
        return $this->formatter->format($address, $flags | FormatterService::FLAG_HTML);
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
