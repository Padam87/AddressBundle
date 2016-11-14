<?php

namespace Padam87\AddressBundle\Test\Functional;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ServicesTest extends WebTestCase
{
    /**
     * @var \Symfony\Component\DependencyInjection\ContainerInterface
     */
    private $container;

    public function setUp()
    {
        self::createClient();

        $this->container = self::$kernel->getContainer();
    }

    public function testFormatter()
    {
        $service = $this->container->get('padam87.address.formatter');
        $className = $this->container->getParameter('padam87.address.formatter.class');

        $this->assertInstanceOf($className, $service);
    }

    public function testTwigExtension()
    {
        $service = $this->container->get('padam87.address.twig_extension');
        $className = $this->container->getParameter('padam87.address.twig_extension.class');

        $this->assertInstanceOf($className, $service);
    }
}
