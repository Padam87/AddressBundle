<?php

namespace Padam87\AddressBundle\Entity;

interface GeocodedAddressInterface
{
    /**
     * Set latitude
     *
     * @param integer $latitude
     * @return \Padam87\AddressBundle\Entity\AddressInterface
     */
    public function setLatitude($latitude);

    /**
     * Get latitude
     *
     * @return integer
     */
    public function getLatitude();

    /**
     * Set longitude
     *
     * @param integer $longitude
     * @return \Padam87\AddressBundle\Entity\AddressInterface
     */
    public function setLongitude($longitude);

    /**
     * Get longitude
     *
     * @return integer
     */
    public function getLongitude();
}
