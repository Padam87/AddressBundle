<?php

namespace Padam87\AddressBundle\Form;

/**
 * Default form type for the GeocodedAddress entity
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
