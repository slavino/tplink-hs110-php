<?php
namespace slavino\tplinkhs110;
use  slavino\tplinkhs110\TPLinkHS110Command;

class TPLinkHS110Device {

    private $config;
    private $deviceName;

    /**
     * TPLinkDevice constructor.
     *
     * @param array  $config
     * @param string $deviceName
     */
    public function __construct(array $config, $deviceName) {
        $this->config = $config;
        $this->deviceName = $deviceName;
    }

    /**
     * Switches ON the plug.
     * 
     * @return type string in JSON format
     */
    public function switchOn() {
        return $this->sendCommand(TPLinkHS110Command::SWITCH_ON);
    }

    /**
     * Switches OFF the plug.
     * 
     * @return type string in JSON format
     */
    public function switchOff() {
        return $this->sendCommand(TPLinkHS110Command::SWITCH_OFF);
    }

    /**
     * Gets system informations like the relay status
     * 
     * @return type string in JSON format
     */
    public function getSystemInfo() {
        return $this->sendCommand(TPLinkHS110Command::SYSTEM_INFO);
    }

    private function sendCommand($command) {
        $socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
        if ($socket === false) {
//            echo "socket_create() failed: reason: " . socket_strerror(socket_last_error()) . "\n";
        } else {
//            echo "OK.\n";
        }

//        echo "Attempting to connect to '$address' on port '$service_port'...";
        $result = socket_connect($socket, $this->config["ipAddr"], $this->config["port"]);
        if ($result === false) {
//            echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
        } else {
//            echo "OK.\n";
        }

        $in = self::tp_encrypt($command);
        $out = '';

//        echo "Sending HTTP HEAD request...";
        socket_write($socket, $in, strlen($in));
//        echo "OK.\n";
        $response = "";
//        echo "Reading response:\n\n";
        socket_recv($socket,$response,2048,MSG_PEEK);

//        echo "Closing socket...";
        socket_close($socket);
        return self::tp_decrypt($response);
//        echo "OK.\n\n";
    }

    /**
     * https://github.com/RobertShippey/hs100-php-api/blob/master/utils.php
     * 
     * @param type $cypher_text
     * @param type $first_key
     * @return type decrypted text
     */
    private static function tp_decrypt($cypher_text, $first_key = 0xAB) {
        $header = substr($cypher_text, 0, 4);
        $header_length = unpack('N*', $header)[1];
        $cypher_text = substr($cypher_text, 4);
        $buf = unpack('c*', $cypher_text);
        $key = $first_key;
        $nextKey;
        for ($i = 1; $i < count($buf) + 1; $i++) {
            $nextKey = $buf[$i];
            $buf[$i] = $buf[$i] ^ $key;
            $key = $nextKey;
        }
        $array_map = array_map('chr', $buf);
        $clear_text = implode('', $array_map);
        $cypher_length = strlen($clear_text);
        if ($header_length !== $cypher_length) {
            trigger_error("Length in header ({$header_length}) doesn't match actual message length ({$cypher_length}).");
        }
        return $clear_text;
    }

    /**
     * https://github.com/RobertShippey/hs100-php-api/blob/master/utils.php
     * 
     * @param type $clear_text
     * @param type $first_key
     * @return type encrypted message
     */
    private static function tp_encrypt($clear_text, $first_key = 0xAB) {
        $buf = unpack('c*', $clear_text);
        $key = $first_key;
        for ($i = 1; $i < count($buf) + 1; $i++) {
            $buf[$i] = $buf[$i] ^ $key;
            $key = $buf[$i];
        }
        $array_map = array_map('chr', $buf);
        $clear_text = implode('', $array_map);
        $length = strlen($clear_text);
        $header = pack('N*', $length);
        return $header . $clear_text;
    }

}
