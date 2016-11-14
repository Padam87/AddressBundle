<?php

namespace Padam87\AddressBundle\Tests\Service;

use Padam87\AddressBundle\Service\Formatter;
use Padam87\AddressBundle\Tests\Resources\Entity\Address;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class FormatterTest extends KernelTestCase
{
    protected $formatter;

    public function setUp()
    {
        self::bootKernel();

        /** @var Formatter formatter */
        $this->formatter = self::$kernel->getContainer()->get('padam87.address.formatter');
    }

    public function testUS()
    {
        $address = new Address();
        $address->setCountry('us');
        $address->setAddress('300 BOYLSTON AVE E');
        $address->setCity('Seattle');
        $address->setState('WA');
        $address->setZipCode('98102');

        $text = <<<ADDRESS
300 BOYLSTON AVE E
SEATTLE, WA 98102
UNITED STATES
ADDRESS;

        $this->assertEquals($text, $this->formatter->format($address));
    }

    public function testUK()
    {
        $address = new Address();
        $address->setCountry('GB');
        $address->setAddress('96 Euston Road');
        $address->setCity('London');
        $address->setZipCode('NW1 2DB');

        $text = <<<ADDRESS
96 Euston Road
LONDON
NW1 2DB
UNITED KINGDOM
ADDRESS;

        $this->assertEquals($text, $this->formatter->format($address));
    }

    public function testHU()
    {
        $address = new Address();
        $address->setCountry('HU');
        $address->setAddress('Bajcsy-Zs. u. 65. 1/3');
        $address->setCity('Budapest');
        $address->setZipCode('1065');

        $text = <<<ADDRESS
Budapest
Bajcsy-Zs. u. 65. 1/3
1065
Hungary
ADDRESS;

        $this->assertEquals($text, $this->formatter->format($address));
    }

    public function testHTML()
    {
        $address = new Address();
        $address->setCountry('HU');
        $address->setAddress('Bajcsy-Zs. u. 65. 1/3');
        $address->setCity('Budapest');
        $address->setZipCode('1065');

        $text = 'Budapest<br>Bajcsy-Zs. u. 65. 1/3<br>1065<br>Hungary';

        $this->assertEquals($text, $this->formatter->format($address, Formatter::FLAG_HTML));
    }

    public function testInline()
    {
        $address = new Address();
        $address->setCountry('HU');
        $address->setAddress('Bajcsy-Zs. u. 65. 1/3');
        $address->setCity('Budapest');
        $address->setZipCode('1065');

        $text = 'Budapest, Bajcsy-Zs. u. 65. 1/3, 1065, Hungary';

        $this->assertEquals($text, $this->formatter->format($address, Formatter::FLAG_INLINE));
    }
}
