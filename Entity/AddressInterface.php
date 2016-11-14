<?php

namespace Padam87\AddressBundle\Entity;

interface AddressInterface
{
    /**
     * @return array
     */
    public function __toArray();

    /**
     * @return string
     */
    public function getCountry();
}
