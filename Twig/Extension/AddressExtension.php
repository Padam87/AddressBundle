<?php

namespace Padam87\AddressBundle\Twig\Extension;

use JMS\DiExtraBundle\Annotation as DI;
use Padam87\AddressBundle\Entity\Address as AddressEntity;
use Padam87\AddressBundle\Service\FormatterService;

/**
 * @DI\Service("padam87.address.twig_extension")
 * @DI\Tag("twig.extension")
 */
class AddressExtension extends \Twig_Extension
{
    public $formatter;

    /**
     * @DI\InjectParams({
     *     "formatter" = @DI\Inject("padam87.address.formatter")
     * })
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

    public function address(AddressEntity $address, $flags = 0)
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
