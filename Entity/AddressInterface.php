<?php

namespace Padam87\AddressBundle\Entity;

interface AddressInterface
{
    /**
     * @return string
     */
    public function getCountry();

    /**
     * @return string
     */
    public function getState();

    /**
     * @return string
     */
    public function getCounty();

    /**
     * @return string
     */
    public function getZipCode();

    /**
     * @return string
     */
    public function getCity();

    /**
     * @return string
     */
    public function getDistrict();

    /**
     * @return string
     */
    public function getStreet();
}