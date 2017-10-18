PHP library to steer TP-Link HS-110 
=========

#### Usage example


```php

<?php

require ("vendor/autoload.php");

use \slavino\tplinkhs110\TPLinkHS110Device;

$config = [
              'plug 1' => [
                  'ipAddr'   => '192.168.1.42', //Or hostname eg: home.example.com
                  'port' => '9999'
              ],
              'plug 2' => [
                  'ipAddr'   => '192.168.1.41', //Or hostname eg: home.example.com
                  'port' => '9999'
              ],
              'plug 3' => [
                  'ipAddr'   => '192.168.1.43', //Or hostname eg: home.example.com
                  'port' => '9999'
              ]
          ];

$plug1 = new TPLinkHS110Device($config['plug 1'], 'plug 1');
$plug2 = new TPLinkHS110Device($config['plug 2'], 'plug 2');
$plug3 = new TPLinkHS110Device($config['plug 3'], 'plug 3');

usleep(500000);
echo $plug1->switchOn();
usleep(500000);
echo $plug2->switchOn();
usleep(500000);
echo $plug3->switchOn();
sleep(2);
echo $plug1->switchOff();
usleep(500000);
echo $plug2->switchOff();
usleep(500000);
echo $plug3->switchOff();


?>

```

## Additional information

Any issues, feedback, suggestions or questions please use issue tracker [here](https://github.com/slavino/tplink-hs110-php/issues).

## Credits

- [softScheck](https://github.com/softScheck/tplink-smartplug) (Who did the reverse engineering and provided the secrets on how to talk to the Smartplug.)
- [Jonathan Williamson](https://github.com/jonnywilliamson/tplinksmartplug)
- [Syed Irfaq R.](https://github.com/irazasyed) For the idea behind how to manage multiple devices.
- [Robert Shippey](https://github.com/RobertShippey/hs100-php-api/blob/master/utils.php)

## Disclaimer

This project and its author is neither associated, nor affiliated with [TP-LINK](http://www.tp-link.com/en/) in anyway.
See License section for more details.

## License

This project is released under the [MIT][link-license] License.

© 2017 [Slavomir Hustaty](https://www.linkedin.com/in/hustaty/), All rights reserved.
