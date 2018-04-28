<?php
/**
 * Created by PhpStorm.
 * User: loeken
 * Date: 10/6/17
 * Time: 12:35 PM
 */
namespace Cryptocompare;

class CryptocompareApi
{
    // the following variables should be set by you

    /**
     * @var string - defines the name of your application - change this
     */
    public $appplicationName = "default_php_wrapper";

    /**
     * @var bool - if set to true will die() and print exception when http request fails -> not recommended in production enviroment
     */
    public $debug = false;


    // do not edit bellow unless you know what you are doing

    /**
     * @var string publicEndpoint applies to all requests that do not need a session key to work
     */
    public $publicEndpoint = "https://min-api.cryptocompare.com";

    /**
     * @var string privateEndpoint applies to all requests that do need a session key to work
     */
    public $privateEndpoint ="https://www.cryptocompare.com/api/data";

    /**
     * @var array contains strings with errors
     */
    public $errorMessages = array();

    /**
     * @var string - http status code from server
     */
    public $statusCode = "unset";

    /**
     * @var string - http response body
     */
    public $body = "";

    /**
     * retrieves an array of objects listing all available api endpoints
     */
    public function getAvailableCalls() {
        $calls = $this->getRequest("public","/");
        return $calls;
    }

    /**
     * @return bool|mixed - returns mining contracts
     */
    public function getMiningContracts() {
        $contracts = $this->getRequest("private","/miningcontracts");
        return $contracts;
    }

    /**
     * @return bool|mixed - returns mining equipment added on website
     */
    public function getMiningEquipment() {
        $equipment = $this->getRequest("private","/miningequipment");
        return $equipment;
    }

    /**
     * @return bool|mixed - returns mining equipment added on website
     */
    public function getNewsProviders($sign = false ) {
        $params = array(
            "sign" => $sign,
        );
        $equipment = $this->getRequest("public","/data/news/providers", $params);
        return $equipment;
    }

    /**
     * @return bool|mixed - returns mining equipment added on website
     */
    public function getNews($feeds = "ALL_NEWS_FEEDS", $lTs = false, $lang = "EN",$sign = false ) {
        $params = array(
            "feeds" => $feeds,
            "lTs" => $lTs,
            "lang" => $lang,
            "sign" => $sign,
        );
        $equipment = $this->getRequest("public","/data/news", $params);
        return $equipment;
    }

    /**
     * @param string $timespan - available options: hour / second
     * @return bool|mixed
     */
    public function getRateLimits($timespan = "hour" ) {
        if (($timespan == "hour" )) {
            $limits = $this->getRequest("public", "/stats/rate/hour/limit");
            return $limits;
        }elseif ($timespan == "second"){
            $limits = $this->getRequest("public", "/stats/rate/second/limit");
            return $limits;
        }elseif ($timespan == "minute"){
            $limits = $this->getRequest("public", "/stats/rate/minute/limit");
            return $limits;
        }elseif ($timespan == "all"){

            $limits = (object) array();

            $limits->minute = $this->getRequest("public", "/stats/rate/minute/limit");
            $limits->second = $this->getRequest("public", "/stats/rate/second/limit");
            $limits->hour = $this->getRequest("public", "/stats/rate/hour/limit");

            return $limits;
        }else {
            $this->errorMessages[] = "avaiable options for timespan are hour or minute or second";
            return false;
        }
    }

    /**
     * @return array returns array of strings with errors during the request
     */
    private function getErrorMessages() {
        return $this->errorMessages;
    }

    /**
     * @param string $type
     * @param string $action
     * @param array $options
     * @return bool|mixed
     * Description:
     * will send request to api endpoint
     */
    public function getRequest($type = "public", $action = "", $options = array()) {
        if ($action == "" ) {
            $this->errorMessages[] = "no action submitted";
            return false;
        }
        if ($type == "public" ) {
            $uri = $this->publicEndpoint . $action;
        }
        elseif ($type == "private" ) {
            $uri = $this->privateEndpoint . $action;
        }
        else {
            $this->errorMessages[] = "invalid type specified";
            return false;
        }
        try {
            if ($this->debug == true ) {
                echo "URI: " . $uri . "<br>";
            }
            $client = new \GuzzleHttp\Client(['verify' => false]);
            $res = $client->request('GET', $uri, array(
                "query" => $options
            ));
            $this->statusCode = $res->getStatusCode();
            $this->header = $res->getHeader('content-type');
            $this->body = $res->getBody()->getContents();
            return json_decode($this->body);
        }
        catch (\Exception $e) {
            if ($this->debug == true ) {
                echo "HTTP response code:" . $this->statusCode;
                print_r(json_decode($this->body));
                die();
            }
        }
    }

    /**
     * @param array $input - an array of strings ( currencies )
     * @return string - "EUR,USD,BTC"
     */
    public function arrayToCommaSeperatedString ($input = array() ) {
        $output = "";
        foreach ($input as $i => $t ) {
            if ($i == 0) {
                $output = $t;
            } else {
                $output = $output . "," . $t;
            }
        }
        return $output;
    }

    /**
     * CryptocompareApi constructor.
     * @param bool $debug
     */
    function __construct($debug = false)
    {
        $this->setDebug($debug);
    }

    /**
     * @param $debug
     */
    public function setDebug($debug) {
        $this->debug = $debug;
    }
}
