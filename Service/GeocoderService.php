<?php

namespace Padam87\AddressBundle\Service;

use JMS\DiExtraBundle\Annotation as DI;
use Geocoder\Geocoder;
use Padam87\AddressBundle\Service\FormatterService;
use Padam87\AddressBundle\Entity\GeocodedAddress;

/**
 * @DI\Service("padam87.address.geocoder")
 */
class GeocoderService
{
    /**
     * @var Geocoder\Geocoder
     */
    protected $geocoder;

    /**
     * @var Padam87\AddressBundle\Service\FormatterService
     */
    protected $formatter;

    /**
     * @DI\InjectParams({
     *     "geocoder" = @DI\Inject("bazinga_geocoder.geocoder"),
     *     "formatter" = @DI\Inject("padam87.address.formatter")
     * })
     */
    public function __construct(Geocoder $geocoder, FormatterService $formatter)
    {
        $this->geocoder = $geocoder;
        $this->formatter = $formatter;
    }

    public function geocode(GeocodedAddress $address)
    {
        try {
            $coords = $this->geocoder->geocode($this->formatter->format($address, FormatterService::FLAG_NOBR));
        } catch (\Exception $e) {
            $coords = array(
                'latitude' => 0,
                'longitude' => 0,
            );
        }

        $address->setLatitude($coords['latitude']);
        $address->setLongitude($coords['longitude']);
    }
}
