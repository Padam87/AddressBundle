<?php

namespace Padam87\AddressBundle\Entity\Traits;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

trait VatinTrait
{
    /**
     * VAT identification number
     *
     * @var string
     *
     * @ORM\Column(nullable=true)
     */
    protected $vatin;

    /**
     * @return string
     */
    public function getVatin()
    {
        return $this->vatin;
    }

    /**
     * @param string $vatin
     *
     * @return $this
     */
    public function setVatin($vatin)
    {
        $this->vatin = $vatin;

        return $this;
    }
}
