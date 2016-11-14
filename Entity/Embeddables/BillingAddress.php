<?php

namespace Padam87\AddressBundle\Entity\Embeddables;

use Doctrine\ORM\Mapping as ORM;
use Padam87\AddressBundle\Entity\Traits\RecipientTrait;
use Padam87\AddressBundle\Entity\Traits\VatinTrait;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Embeddable()
 */
class BillingAddress extends Address
{
    use RecipientTrait;
    use VatinTrait;
}
