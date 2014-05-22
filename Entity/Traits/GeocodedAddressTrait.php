<?php

namespace Padam87\AddressBundle\Entity\Traits;

trait GeocodedAddressTrait
{
    /**
     * @var string
     *
     * @ORM\Column(type="float", nullable=true)
     */
    protected $latitude;

    /**
     * @var string
     *
     * @ORM\Column(type="float", nullable=true)
     */
    protected $longitude;

    /**
     * Set latitude
     *
     * @param integer $latitude
     * @return Address
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;

        return $this;
    }

    /**
     * Get latitude
     *
     * @return integer
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * Set longitude
     *
     * @param integer $longitude
     * @return Address
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;

        return $this;
    }

    /**
     * Get longitude
     *
     * @return integer
     */
    public function getLongitude()
    {
        return $this->longitude;
    }
}
