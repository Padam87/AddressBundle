<?php

namespace Padam87\AddressBundle\Test\Functional;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Padam87\AddressBundle\Entity\GeocodedAddress;
use Padam87\AddressBundle\Service\FormatterService;
use Padam87\AddressBundle\Service\GeocoderService;
use Geocoder\Geocoder;
use Geocoder\Provider\GoogleMapsProvider;
use Geocoder\HttpAdapter\CurlHttpAdapter;

class GeocoderTest extends \PHPUnit_Framework_TestCase
{
    protected $geocoder;

    public function setUp()
    {
        $this->geocoder = new GeocoderService(
            new Geocoder(new GoogleMapsProvider(new CurlHttpAdapter())),
            new FormatterService()
        );
    }

    public function testUS()
    {
        $address = new GeocodedAddress();
        $address->setCountry('US');
        $address->setStreet('300 BOYLSTON AVE E');
        $address->setCity('Seattle');
        $address->setState('WA');
        $address->setZipCode('98102');

        $this->geocoder->geocode($address);

        $this->assertEquals(47.6210785, $address->getLatitude());
        $this->assertEquals(-122.323045, $address->getLongitude());
    }

    public function testUK()
    {
        $address = new GeocodedAddress();
        $address->setCountry('GB');
        $address->setStreet('96 Euston Road');
        $address->setCity('London');
        $address->setZipCode('NW1 2DB');

        $this->geocoder->geocode($address);

        $this->assertEquals(51.5297852, $address->getLatitude());
        $this->assertEquals(-0.1273748, $address->getLongitude());
    }

    public function testHU()
    {
        $address = new GeocodedAddress();
        $address->setCountry('HU');
        $address->setStreet('Bajcsy-Zs. u. 65. 1/3');
        $address->setCity('Budapest');
        $address->setDistrict('II. kerület');
        $address->setZipCode('1065');

        $this->geocoder->geocode($address);

        $this->assertEquals(47.497912, $address->getLatitude());
        $this->assertEquals(19.040235, $address->getLongitude());
    }
}