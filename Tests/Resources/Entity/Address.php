<?php

namespace Padam87\AddressBundle\Tests\Resources\Entity;

use Padam87\AddressBundle\Entity\Traits\RecipientTrait;
use Padam87\AddressBundle\Entity\Traits\StateTrait;
use Padam87\AddressBundle\Entity\Traits\VatinTrait;

class Address extends \Padam87\AddressBundle\Entity\Embeddables\Address
{
    use RecipientTrait;
    use VatinTrait;
    use StateTrait;
}
