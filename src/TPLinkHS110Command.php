<?php

namespace slavino\tplinkhs110;

class TPLinkHS110Command {
    
    const SWITCH_ON = '{"system":{"set_relay_state":{"state":1}}}';

    const SWITCH_OFF = '{"system":{"set_relay_state":{"state":0}}}';

}