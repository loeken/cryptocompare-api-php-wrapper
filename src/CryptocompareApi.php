<?php
/**
 * Created by PhpStorm.
 * User: loeken
 * Date: 10/6/17
 * Time: 12:35 PM
 */
namespace Cryptocompare;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException as GuzzleExceptionAlias;

class CryptocompareApi
{

    const PUB = 'public';
    const PRIV = 'private';

    const PUBLIC_ENDPOINT = 'https://min-api.cryptocompare.com';
    const PRIVATE_ENDPOINT = 'https://www.cryptocompare.com/api/data';

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
     * @var string apiKey for your application from https://min-api.cryptocompare.com
     */
    private $apiKey;

    /**
     * @var
     */
    protected $httpClient;

    /**
     * CryptocompareApi constructor.
     *
     * @param string $apiKey
     * @param bool $debug
     */
    function __construct($apiKey,$debug = false)
    {
        $this->setApiKey($apiKey);
        $this->setDebug($debug);

        $this->httpClient = new Client(['verify' => false]);
    }

    /**
     * @param string $type
     * @param string $action
     * @param array $options
     *
     * @return mixed
     * @throws GuzzleExceptionAlias
     * @throws InvalidRequest
     */
    public function getRequest($type, $action, $options = [])
    {
        $apiEndpoint = $this->getApiEndpoint($type, $action);

        if ($apiEndpoint === null) {
            throw new \Exception('Invalid type');
        }

        $result = $this->httpClient->request('GET', $apiEndpoint, [
            "query" => $options,
            'headers' => [
                'authorization' => 'Apikey ' . $this->getApiKey()
            ]
        ]);

        $statusCode = $result->getStatusCode();

        if ($statusCode !== 200) {
            throw new InvalidRequest('Request is invalid', $statusCode);
        }

        $body = $result->getBody()->getContents();
        return json_decode($body);
    }

    /**
     * @param array $input - an array of strings ( currencies )
     * @return string - "EUR,USD,BTC"
     */
    public function arrayToCommaSeperatedString ($input = array() ) {
        $output = implode(",", $input);
        return $output;
    }

    /**
     * @return string
     */
    public function getApiKey() {
        return $this->apiKey;
    }

    /**
     * @param string $apiKey
     */
    public function setApiKey($apiKey) {
        $this->apiKey = $apiKey;
    }

    /**
     * @param $debug
     */
    public function setDebug($debug) {
        $this->debug = $debug;
    }

    /**
     * Generates the endpoint uri
     *
     * @param string $type
     * @param string $action
     *
     * @return string|null
     */
    protected function getApiEndpoint($type, $action)
    {
        if ($type === self::PUB) {
            return self::PUBLIC_ENDPOINT . $action;
        } else if ($type === self::PRIV) {
            return self::PRIVATE_ENDPOINT . $action;
        }

        return null;
    }

    /**
     * logs the message if debug is enabled
     *
     * @param string $message
     */
    protected function log($message)
    {
        if ($this->debug === true ) {
            echo $message;
        }
    }
}
