<?php

namespace slavino\tplinkhs110;

class TPLinkHS110Command {
    
    const SWITCH_ON = '{"system":{"set_relay_state":{"state":1}}}';

    const SWITCH_OFF = '{"system":{"set_relay_state":{"state":0}}}';

    const SWITCH_LED_OFF = '{"system":{"set_led_off":{"off":1}}}';
    
    //more commands available here: https://github.com/softScheck/tplink-smartplug/blob/master/tplink-smarthome-commands.txt
    
}
