<?php

namespace Padam87\AddressBundle\Entity\Traits;

use Padam87\AddressBundle\Entity\AddressInterface;

/**
 * Adds a single address to the given Entity (one-to-one unidiretional)
 *
 * @author Adam Prager <prager.adam87@gmail.com>
 */
trait SingleAddressTrait
{
    /**
     * @var AddressInterface
     *
     * @ORM\OneToOne(targetEntity="Padam87\AddressBundle\Entity\Address", cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="address_id", referencedColumnName="id")
     * @Assert\Valid()
     */
    protected $address;

    /**
     * @param AddressInterface $address
     *
     * @return $this
     */
    public function setAddress(AddressInterface $address = null)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * @return AddressInterface
     */
    public function getAddress()
    {
        return $this->address;
    }
}