<?php

namespace Padam87\AddressBundle\Service;

use Geocoder\GeocoderInterface;
use Padam87\AddressBundle\Entity\GeocodedAddressInterface;

class GeocoderService
{
    /**
     * @var GeocoderInterface
     */
    protected $geocoder;

    /**
     * @var FormatterService
     */
    protected $formatter;

    /**
     * @param GeocoderInterface $geocoder
     * @param FormatterService  $formatter
     */
    public function __construct(GeocoderInterface $geocoder, FormatterService $formatter)
    {
        $this->geocoder = $geocoder;
        $this->formatter = $formatter;
    }

    /**
     * @param GeocodedAddressInterface $address
     */
    public function geocode(GeocodedAddressInterface $address)
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
