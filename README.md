# 1 ,Installation #

## 1.1 BazingaGeocoderBundle ##

Install [BazingaGeocoderBundle](https://github.com/willdurand/BazingaGeocoderBundle)

## 1.2 AppKernel ##

	// app/AppKernel.php
	public function registerBundles()
	{
	    return array(
	        // ...
	        new Padam87\AddressBundle\Padam87AddressBundle(),
	    );
	}

## 1.3 config.yml ##

Add the bundle to jms_di_extra if all_bundles is false

	jms_di_extra:
	    locations:
	        all_bundles: false
	        bundles: [Padam87AddressBundle]

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

#### Available flags ####
	
	`FLAG_NOBR` No linebreak will be added
	`FLAG_HTML` Outputs the address in html format

### 2.2 Twig extension ###

	{{ address|address()|raw }} will output the formatted address, with the `FLAG_HTML` added by default

### 2.3 Geocoding ###

	$address = new GeocodedAddress();

The listener will take care of the rest ;)

