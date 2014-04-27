<?php

namespace Padam87\AddressBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Padam87\AddressBundle\Entity\Traits\GeocodedAddressTrait;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 */
class GeocodedAddress extends Address implements GeocodedAddressInterface
{
    use GeocodedAddressTrait;
}