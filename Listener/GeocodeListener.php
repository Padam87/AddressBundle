<?php

namespace Padam87\AddressBundle\Listener;

use Doctrine\ORM\Event\LifecycleEventArgs;
use Padam87\AddressBundle\Entity\GeocodedAddressInterface;
use Padam87\AddressBundle\Service\GeocoderService;

class GeocodeListener
{
    /**
     * @var GeocoderService
     */
    private $geocoder;

    /**
     * @param GeocoderService $geocoder
     */
    public function __construct(GeocoderService $geocoder)
    {
        $this->geocoder = $geocoder;
    }

    /**
     * @param LifecycleEventArgs $eventArgs
     */
    public function prePersist(LifecycleEventArgs $eventArgs)
    {
        $this->geocode($eventArgs);
    }

    /**
     * @param LifecycleEventArgs $eventArgs
     */
    public function preUpdate(LifecycleEventArgs $eventArgs)
    {
        $this->geocode($eventArgs);
    }

    /**
     * @param LifecycleEventArgs $eventArgs
     */
    protected  function geocode(LifecycleEventArgs $eventArgs)
    {
        $entity = $eventArgs->getEntity();

        if ($entity instanceof GeocodedAddressInterface) {
            $this->geocoder->geocode($entity);
        }
    }
}
