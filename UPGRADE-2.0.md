While Version 1 aimed (and failed) to create entities and provide an out of the box solution, V2 relies on composition.

The Bundle provides Traits and Embeddables, but no Entites.

I recommend using the embeddables, but feel free to create your own embeddable or entity.

# Changes
- Geocoding features have been completely removed
- Formatter's feature is still the same, but now it relies on Twig templates internally
- Address formats became much more flexible thanks to that

# Upgrading
While there is no exact upgrade guide, you can:
- Use geocoding features using [BazingaGeocoderBundle](https://github.com/geocoder-php/BazingaGeocoderBundle)
- Create an address entity to replace the one witch the bundle used to provide, implementing the new AddressInterface
- Use the Formatter the same way
