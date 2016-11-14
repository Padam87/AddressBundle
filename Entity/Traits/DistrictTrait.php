<?php

namespace Padam87\AddressBundle\Entity\Traits;

use Doctrine\ORM\Mapping as ORM;

trait DistrictTrait
{
    /**
     * @var string
     *
     * @ORM\Column(nullable=true)
     */
    protected $district;

    /**
     * @return string
     */
    public function getDistrict()
    {
        return $this->district;
    }

    /**
     * @param string $district
     *
     * @return DistrictTrait
     */
    public function setDistrict($district)
    {
        $this->district = $district;

        return $this;
    }
}
