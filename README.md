[![Build Status](https://travis-ci.org/Padam87/AddressBundle.png?branch=master)](https://travis-ci.org/Padam87/AddressBundle)
[![Coverage Status](https://coveralls.io/repos/Padam87/AddressBundle/badge.png)](https://coveralls.io/r/Padam87/AddressBundle)
[![Scrutinizer Quality Score](https://scrutinizer-ci.com/g/Padam87/AddressBundle/badges/quality-score.png?s=0b5ffbc4452af27287b8d8a3dd20d666babe16d3)](https://scrutinizer-ci.com/g/Padam87/AddressBundle/)
[![SensioLabsInsight](https://insight.sensiolabs.com/projects/b360d86c-7095-4e57-8f4e-e626a1b50dc1/mini.png)](https://insight.sensiolabs.com/projects/b360d86c-7095-4e57-8f4e-e626a1b50dc1)
[![Latest Stable Version](https://poser.pugx.org/padam87/address-bundle/v/stable.png)](https://packagist.org/packages/padam87/address-bundle)
[![Total Downloads](https://poser.pugx.org/padam87/address-bundle/downloads.png)](https://packagist.org/packages/padam87/address-bundle)
[![Latest Unstable Version](https://poser.pugx.org/padam87/address-bundle/v/unstable.png)](https://packagist.org/packages/padam87/address-bundle) 
[![License](https://poser.pugx.org/padam87/address-bundle/license.png)](https://packagist.org/packages/padam87/address-bundle)

# 1, Installation #

## 1.1 Composer ##

	"require": {
		....
		"padam87/address-bundle": "~1.0"
	},

## 1.2 BazingaGeocoderBundle ##

Install [BazingaGeocoderBundle](https://github.com/willdurand/BazingaGeocoderBundle)

## 1.3 AppKernel ##

	// app/AppKernel.php
	public function registerBundles()
	{
	    return array(
	        // ...
	        new Padam87\AddressBundle\Padam87AddressBundle(),
	    );
	}

## 1.4 doctrine:schema:update ##

Update Your schema

# 2, Usage #

You can create a relation to one of the Entities, or you can use one of the traits.

## 2.1 Formatter ##

	$formatted = $this->get("padam87.address.formatter")->format($address);

### Flags ###

	use Padam87\AddressBundle\Service\FormatterService;

	...

	$formatted = $this->get("padam87.address.formatter")->format($address, FormatterService::FLAG_NOBR);

### Available flags ###

`FLAG_NOBR` No linebreak will be added

`FLAG_HTML` Outputs the address in html format

`FLAG_NOCASE` No case change will be applied

### 2.2 Twig extension ###

	{{ address|address()|raw }}

This will output the formatted address, with the `FLAG_HTML` added by default

### 2.3 Geocoding ###

	$address = new GeocodedAddress();

The listener will take care of the rest ;)
