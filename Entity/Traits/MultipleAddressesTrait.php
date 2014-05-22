<?php

namespace Padam87\AddressBundle\Entity\Traits;

use Padam87\AddressBundle\Entity\AddressInterface;

/**
 * Adds multiple addresses to the given Entity (many-to-many unidirectional)
 *
 * @author Adam Prager <prager.adam87@gmail.com>
 */
trait MultipleAddressesTrait
{
    /**
     * @var \Doctrine\Common\Collections\Collection[AddressInterface]
     *
     * @ORM\ManyToMany(targetEntity="Padam87\AddressBundle\Entity\Address")
     * @Assert\Valid()
     */
    protected $addresses;

    /**
     * @param AddressInterface $addresses
     *
     * @return $this
     */
    public function addAddress(AddressInterface $addresses)
    {
        $this->addresses[] = $addresses;

        return $this;
    }

    /**
     * @param AddressInterface $addresses
     */
    public function removeAddress(AddressInterface $addresses)
    {
        $this->addresses->removeElement($addresses);
    }

    /**
     * Get addresses
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAddresses()
    {
        return $this->addresses;
    }
}