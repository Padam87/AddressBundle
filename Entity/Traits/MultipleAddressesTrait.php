<?php

namespace Padam87\AddressBundle\Entity\Traits;

/**
 * Adds multiple addresses to the given Entity (many-to-many unidirectional)
 *
 * @author Adam Prager <prager.adam87@gmail.com>
 */
trait MultipleAddressesTrait
{
    /**
     * @var Padam87\AddressBundle\Entity\Address
     *
     * @ORM\ManyToMany(targetEntity="Padam87\AddressBundle\Entity\Address")
     * @Assert\Valid()
     */
    private $addresses;

    /**
     * Add addresses
     *
     * @param \Padam87\AddressBundle\Entity\Address $addresses
     * @return User
     */
    public function addAddress(\Padam87\AddressBundle\Entity\Address $addresses)
    {
        $this->addresses[] = $addresses;

        return $this;
    }

    /**
     * Remove addresses
     *
     * @param \Padam87\AddressBundle\Entity\Address $addresses
     */
    public function removeAddress(\Padam87\AddressBundle\Entity\Address $addresses)
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