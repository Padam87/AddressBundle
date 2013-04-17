<?php

namespace Padam87\AddressBundle\Listener;

use JMS\DiExtraBundle\Annotation as DI;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Padam87\AddressBundle\Service\GeocoderService;
use Padam87\AddressBundle\Entity\GeocodedAddress;

/**
 * @DI\Service("padam87.address.geocode_listener")
 * @DI\Tag("doctrine.event_listener", attributes = {"event" = "prePersist"})
 */
class GeocodeListener
{
    private $geocoder;

    /**
     * @DI\InjectParams({
     *     "geocoder" = @DI\Inject("padam87.address.geocoder")
     * })
     */
    public function __construct(GeocoderService $geocoder)
    {
        $this->geocoder = $geocoder;
    }

    public function prePersist(LifecycleEventArgs $eventArgs)
    {
        $entity = $eventArgs->getEntity();

        if ($entity instanceof GeocodedAddress) {
            $this->geocoder->geocode($entity);
        }
    }
}
