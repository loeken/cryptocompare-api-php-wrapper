<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 12/29/18
 * Time: 11:37 PM
 */

namespace Cryptocompare;


class Toplists extends CryptocompareApi
{
    /**
     * @param string $tsym
     * @param int $page
     * @param bool $sign
     * @param int $limit
     * @return mixed
     * @throws InvalidRequest
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getDataExchangeHistohour($tsym = "EUR", $page = 0, $sign = false, $limit = 1440) {
        $extraParams = $this->appplicationName;
        $params = array(
            "page" => $page,
            "limit" => $limit,
            "extraParams" => $extraParams,
            "sign" => $sign,
            "tsym" => $tsym,
        );
        $r = $this->getRequest(CryptocompareApi::PUB, "/data/top/totalvolfull", $params);
        return $r;
    }

    /**
     * @param string $tsym
     * @param int $page
     * @param bool $sign
     * @param int $limit
     * @return mixed
     * @throws InvalidRequest
     * @throws \GuzzleHttp\Exception\GuzzleException
     */

     public function getTopTotalMktCapEndpointFull($tsym = "EUR", $page = 0, $sign = false, $limit = 1440) {
        $extraParams = $this->appplicationName;
        $params = array(
            "page" => $page,
            "limit" => $limit,
            "extraParams" => $extraParams,
            "sign" => $sign,
            "tsym" => $tsym,
        );
        $r = $this->getRequest(CryptocompareApi::PUB, "/data/top/mktcapfull", $params);
        return $r;
    }

    /**
     * @param string $fsym
     * @param string $tsym
     * @param int $page
     * @param bool $sign
     * @param int $limit
     * @return mixed
     * @throws InvalidRequest
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getTopExchangesEndpoint($fsym = "BTC", $tsym = "EUR", $page = 0, $sign = false, $limit = 1440) {
        $extraParams = $this->appplicationName;
        $params = array(
            "fsym" => $fsym,
            "tsym" => $tsym,
            "page" => $page,
            "limit" => $limit,
            "extraParams" => $extraParams,
            "sign" => $sign,
        );
        $r = $this->getRequest(CryptocompareApi::PUB, "/data/top/exchanges", $params);
        return $r;
    }

    /**
     * @param string $fsym
     * @param string $tsym
     * @param int $page
     * @param bool $sign
     * @param int $limit
     * @return mixed
     * @throws InvalidRequest
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getTopExchangesFullEndpoint($fsym = "BTC", $tsym = "EUR", $page = 0, $sign = false, $limit = 1440) {
        $extraParams = $this->appplicationName;
        $params = array(
            "fsym" => $fsym,
            "tsym" => $tsym,
            "page" => $page,
            "limit" => $limit,
            "extraParams" => $extraParams,
            "sign" => $sign
        );
        $r = $this->getRequest(CryptocompareApi::PUB, "/data/top/exchanges/full", $params);
        return $r;
    }

    /**
     * @param string $fsym
     * @param int $page
     * @param bool $sign
     * @param int $limit
     * @return mixed
     * @throws InvalidRequest
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getTopExchangesVolumes($fsym = "BTC", $page = 0, $sign = false, $limit = 1440) {
        $extraParams = $this->appplicationName;

        $params = array(
            "fsym" => $fsym,
            "page" => $page,
            "limit" => $limit,
            "extraParams" => $extraParams,
            "sign" => $sign
        );
        $r = $this->getRequest(CryptocompareApi::PUB, "/data/top/volumes", $params);
        return $r;
    }

    /**
     * @param string $fsym
     * @param int $page
     * @param bool $sign
     * @param int $limit
     * @return mixed
     * @throws InvalidRequest
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getTopPairsEndpoint($fsym = "BTC", $page = 0, $sign = false, $limit = 1440) {
        $extraParams = $this->appplicationName;

        $params = array(
            "fsym" => $fsym,
            "page" => $page,
            "limit" => $limit,
            "extraParams" => $extraParams,
            "sign" => $sign
        );
        $r = $this->getRequest(CryptocompareApi::PUB, "/data/top/volumes", $params);
        return $r;
    }
}