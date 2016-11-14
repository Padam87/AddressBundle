<?php

namespace Padam87\AddressBundle\Entity\Traits;

trait ToArrayTrait
{
    /**
     * @return array
     */
    public function __toArray()
    {
        return get_object_vars($this);
    }
}
