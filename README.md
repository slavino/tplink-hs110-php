PHP library to steer TP-Link HS-110 
=========

#### Usage example


```php

$config = ["ipAddr" => "192.168.1.41", "port" => "9999"];
$plug = new TPLinkHS110Device($config, "plug1");


```

## Additional information

Any issues, feedback, suggestions or questions please use issue tracker [here][link-issues].

## Credits

- [softScheck](https://github.com/softScheck/tplink-smartplug) (Who did the reverse engineering and provided the secrets on how to talk to the Smartplug.)
- [Jonathan Williamson](https://github.com/jonnywilliamson/tplinksmartplug)
- [Syed Irfaq R.](https://github.com/irazasyed) For the idea behind how to manage multiple devices.

## Disclaimer

This project and its author is neither associated, nor affiliated with [TP-LINK](http://www.tp-link.com/en/) in anyway.
See License section for more details.

## License

This project is released under the [MIT][link-license] License.

© 2017 [Jonathan Williamson][link-author], All rights reserved.