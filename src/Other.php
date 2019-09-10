<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 12/30/18
 * Time: 10:52 PM
 */


namespace Cryptocompare;

class Other extends CryptocompareApi {
    /**
     * @return mixed
     * @throws InvalidRequest
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getRateLimitEndpoint() {

        $limits = $this->getRequest(CryptocompareApi::PUB, "/stats/rate/limit");
        return $limits;
    }


    /**
     * @param bool $sign
     * @return mixed
     * @throws InvalidRequest
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getAllExchangesV2Endpoint($sign = false ) {

        $params = array(
            "sign" => $sign,
        );
        $exchanges = $this->getRequest(CryptocompareApi::PUB, "/data/v2/all/exchanges", $params);
        return $exchanges;
    }

    /**
     * @param bool $sign
     * @return mixed
     * @throws InvalidRequest
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getIncludedexchanges($sign = false ) {

        $params = array(
            "sign" => $sign,
        );
        $exchanges = $this->getRequest(CryptocompareApi::PUB, "/data/all/includedexchanges", $params);
        return $exchanges;
    }

    /**
     * @param string $sign
     * @return mixed
     * @throws InvalidRequest
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getAllCoinsWithContentEndpoint($sign = "false") {
        $extraParams = $this->appplicationName;
        $params = array(
            "extraParams" => $extraParams,
            "sign" => $sign
        );
        $r = $this->getRequest(CryptocompareApi::PUB, "/data/all/coinlist", $params);
        return $r;
    }

    /**
     * @param string $sign
     * @return mixed
     * @throws InvalidRequest
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getAllExchangesStaticInfoEndpoint($sign = "false") {
        $extraParams = $this->appplicationName;
        $params = array(
            "extraParams" => $extraParams,
            "sign" => $sign
        );
        $r = $this->getRequest(CryptocompareApi::PUB, "/data/exchanges/general", $params);
        return $r;
    }

    /**
     * @param string $sign
     * @return mixed
     * @throws InvalidRequest
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getAllWalletsStaticInfoEndpoint($sign = "false") {
        $extraParams = $this->appplicationName;
        $params = array(
            "extraParams" => $extraParams,
            "sign" => $sign
        );
        $r = $this->getRequest(CryptocompareApi::PUB, "/data/exchanges/general", $params);
        return $r;
    }

    /**
     * @param string $sign
     * @return mixed
     * @throws InvalidRequest
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getAllCardsStaticInfoEndpoint($sign = "false") {
        $extraParams = $this->appplicationName;
        $params = array(
            "extraParams" => $extraParams,
            "sign" => $sign
        );
        $r = $this->getRequest(CryptocompareApi::PUB, "/data/cards/general", $params);
        return $r;
    }

    /**
     * @param string $sign
     * @return mixed
     * @throws InvalidRequest
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getAllMiningContractsStaticInfoEndpoint($sign = "false") {
        $extraParams = $this->appplicationName;
        $params = array(
            "extraParams" => $extraParams,
            "sign" => $sign
        );
        $r = $this->getRequest(CryptocompareApi::PUB, "/data/mining/contracts/general", $params);
        return $r;
    }

    /**
     * @param string $sign
     * @return mixed
     * @throws InvalidRequest
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getAllMiningEquipmentStaticInfoEndpoint($sign = "false") {
        $extraParams = $this->appplicationName;
        $params = array(
            "extraParams" => $extraParams,
            "sign" => $sign
        );
        $r = $this->getRequest(CryptocompareApi::PUB, "/data/mining/equipment/general", $params);
        return $r;
    }

    /**
     * @param string $sign
     * @return mixed
     * @throws InvalidRequest
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getAllMiningPoolsStaticInfoEndpoint($sign = "false") {
        $extraParams = $this->appplicationName;
        $params = array(
            "extraParams" => $extraParams,
            "sign" => $sign
        );
        $r = $this->getRequest(CryptocompareApi::PUB, "/data/mining/pools/general", $params);
        return $r;
    }
}