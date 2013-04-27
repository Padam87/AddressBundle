<?php

namespace Padam87\AddressBundle\Form;

use Symfony\Component\Form\FormBuilderInterface;
use Padam87\AddressBundle\Form\AddressType;

/**
 * Default form type for the GeocodedAddress entity
 *
 * @author Adam Prager <prager.adam87@gmail.com>
 */
class GeocodedAddressType extends AddressType
{
    public function getDefaultOptions(array $options)
    {
        return array(
            'data_class' => 'Padam87\AddressBundle\Entity\GeocodedAddress',
        );
    }
}
