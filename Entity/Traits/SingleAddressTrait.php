<?php

namespace Padam87\AddressBundle\Entity\Traits;

/**
 * Adds a single address to the given Entity (one-to-one unidiretional)
 *
 * @author Adam Prager <prager.adam87@gmail.com>
 */
trait SingleAddressTrait
{
    /**
     * @var Padam87\AddressBundle\Entity\Address
     *
     * @ORM\OneToOne(targetEntity="Padam87\AddressBundle\Entity\Address", cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="address_id", referencedColumnName="id")
     * @Assert\Valid()
     */
    private $address;

    /**
     * Set address
     *
     * @param \Padam87\AddressBundle\Entity\Address $address
     * @return User
     */
    public function setAddress(\Padam87\AddressBundle\Entity\Address $address = null)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return \HRM\UserBundle\Entity\Address
     */
    public function getAddress()
    {
        return $this->address;
    }
}