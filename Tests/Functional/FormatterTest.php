<?php

namespace Padam87\AddressBundle\Test\Functional;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Padam87\AddressBundle\Entity\Address;
use Padam87\AddressBundle\Service\FormatterService;

class FormatterTest extends WebTestCase
{
    protected $formatter;

    public function setUp()
    {
        $this->formatter = new FormatterService();
    }

    public function testUS()
    {
        $address = new Address();
        $address->setCountry('us');
        $address->setStreet('300 BOYLSTON AVE E');
        $address->setCity('Seattle');
        $address->setState('WA');
        $address->setZipCode('98102');

        $this->assertEquals(file_get_contents(__DIR__ . '/../Resources/fixtures/address_US.txt'), $this->formatter->format($address));
    }

    public function testUK()
    {
        $address = new Address();
        $address->setCountry('GB');
        $address->setStreet('49 Featherstone Street');
        $address->setCity('Aylesbury');
        $address->setCounty('Buckinghamshire');
        $address->setZipCode('HP19 3EQ');

        $this->assertEquals(file_get_contents(__DIR__ . '/../Resources/fixtures/address_UK.txt'), $this->formatter->format($address));
    }

    public function testHU()
    {
        $address = new Address();
        $address->setCountry('HU');
        $address->setStreet('Bajcsy-Zs. u. 65. 1/3');
        $address->setCity('Budapest');
        $address->setDistrict('II. kerület');
        $address->setZipCode('1065');

        $this->assertEquals(file_get_contents(__DIR__ . '/../Resources/fixtures/address_HU.txt'), $this->formatter->format($address));
    }
}