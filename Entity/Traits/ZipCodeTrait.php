<?php

namespace Padam87\AddressBundle\Entity\Traits;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

trait ZipCodeTrait
{
    /**
     * @var string
     *
     * @Assert\NotBlank()
     * @ORM\Column()
     */
    protected $zipCode;

    /**
     * @return string
     */
    public function getZipCode()
    {
        return $this->zipCode;
    }

    /**
     * @param string $zipCode
     *
     * @return $this
     */
    public function setZipCode($zipCode)
    {
        $this->zipCode = $zipCode;

        return $this;
    }
}
