<?php

namespace Padam87\AddressBundle\Entity\Embeddables;

use Doctrine\ORM\Mapping as ORM;
use Padam87\AddressBundle\Entity\Traits\RecipientTrait;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Embeddable()
 */
class ShippingAddress extends Address
{
    use RecipientTrait;
}
