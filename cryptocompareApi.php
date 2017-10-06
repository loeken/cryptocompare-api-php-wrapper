<?php
/**
 * Created by PhpStorm.
 * User: loeken
 * Date: 10/6/17
 * Time: 12:35 PM
 */

class CryptocompareApi
{
    /**
     * @var string publicEndpoint applies to all requests that do not need a session key to work
     */
    public $publicEndpoint = "https://min-api.cryptocompare.com";

    /**
     * @var string privateEndpoint applies to all requests that do need a session key to work
     */
    public $privateEndpoint ="https://min-api.cryptocompare.com/api/data";

    /**
     * @var array contains strings with errors
     */
    public $errorMessages = array();

    /**
     * retrieves an array of objects listing all available api endpoints
     */
    public function availableCalls() {
        return $this->getRequest("private","/");
    }
    private function getErrorMessages() {

    }
    /**
     * will send request to api endpoint
     */
    private function getRequest($type = "public", $action = "") {
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

            $client = new \GuzzleHttp\Client(['verify' => false]);

            $res = $client->request('GET', $uri);
            $this->statusCode = $res->getStatusCode();
            print_r($this->statusCode);
            // "200"
            $this->header = $res->getHeader('content-type');
            // 'application/json; charset=utf8'
            $this->body = $res->getBody()->getContents();
            print_r($this->body);

            return json_decode($this->body);
        }
        catch (\Exception $e) {
            return json_decode($this->body);
            //echo 'Exception abgefangen: ', $e->getMessage(), "\n";
        }
    }
}
