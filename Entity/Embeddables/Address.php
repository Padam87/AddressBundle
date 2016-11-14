<?php

namespace Padam87\AddressBundle\Entity\Embeddables;

use Doctrine\ORM\Mapping as ORM;
use Padam87\AddressBundle\Entity\AddressInterface;
use Padam87\AddressBundle\Entity\Traits\AddressTrait;
use Padam87\AddressBundle\Entity\Traits\CityTrait;
use Padam87\AddressBundle\Entity\Traits\CountryTrait;
use Padam87\AddressBundle\Entity\Traits\ToArrayTrait;
use Padam87\AddressBundle\Entity\Traits\ZipCodeTrait;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Embeddable()
 */
class Address implements AddressInterface
{
    use CountryTrait;
    use CityTrait;
    use ZipCodeTrait;
    use AddressTrait;
    use ToArrayTrait;
}
