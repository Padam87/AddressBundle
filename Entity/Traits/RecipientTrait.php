<?php

namespace Padam87\AddressBundle\Entity\Traits;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

trait RecipientTrait
{
    /**
     * @var string
     *
     * @Assert\NotBlank()
     * @ORM\Column()
     */
    protected $recipient;

    /**
     * @return string
     */
    public function getRecipient()
    {
        return $this->recipient;
    }

    /**
     * @param string $recipient
     *
     * @return $this
     */
    public function setRecipient($recipient)
    {
        $this->recipient = $recipient;

        return $this;
    }
}
