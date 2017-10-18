PHP library to steer TP-Link HS-110 
=========

#### Usage example


```php

use \slavino\tplinkhs110\TPLinkHS110Device;

$config = ["ipAddr" => "192.168.1.41", "port" => "9999"];
$plug = new TPLinkHS110Device($config, "plug1");
$plug->switchOn();

```

## Additional information

Any issues, feedback, suggestions or questions please use issue tracker [here](https://github.com/slavino/tplink-hs110-php/issues).

## Credits

- [softScheck](https://github.com/softScheck/tplink-smartplug) (Who did the reverse engineering and provided the secrets on how to talk to the Smartplug.)
- [Jonathan Williamson](https://github.com/jonnywilliamson/tplinksmartplug)
- [Syed Irfaq R.](https://github.com/irazasyed) For the idea behind how to manage multiple devices.

## Disclaimer

This project and its author is neither associated, nor affiliated with [TP-LINK](http://www.tp-link.com/en/) in anyway.
See License section for more details.

## License

This project is released under the [MIT][link-license] License.

© 2017 [Slavomir Hustaty](https://www.linkedin.com/in/hustaty/), All rights reserved.
