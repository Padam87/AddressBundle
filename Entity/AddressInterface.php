<?php

namespace Padam87\AddressBundle\Entity;

interface AddressInterface
{
    /**
     * return @string
     */
    function getCountry();

    /**
     * return @string
     */
    function getState();

    /**
     * return @string
     */
    function getCounty();

    /**
     * return @string
     */
    function getZipCode();

    /**
     * return @string
     */
    function getCity();

    /**
     * return @string
     */
    function getDistrict();

    /**
     * return @string
     */
    function getStreet();
}