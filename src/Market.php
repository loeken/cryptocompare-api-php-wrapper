<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 10/6/17
 * Time: 6:46 PM
 */

namespace Cryptocompare;

class Market extends CryptocompareApi
{
    /**
     * @param string $fsym
     * @param string $tsym
     * @param int $limit
     * @param bool $sign
     * @return bool|mixed
     */
    public function getTopPairs($fsym = "BTC", $limit = 5, $sign = false ) {
        $params = array(
            "fsym" => $fsym,
            "limit" => $limit,
            "sign" => $sign,
        );
        $pairs = $this->getRequest("public","/data/top/pairs", $params);
        return $pairs;
    }
    /**
     * @param string $fsym - base currency to convert from
     * @param string $tsym - currency to convert to
     * @param int $limit - limit of results
     * @param bool $sign - server sided signing of request
     * @return mixed
     */
    public function getTopExchanges($fsym = "BTC", $tsym = "EUR", $limit = 5, $sign = false) {

        $extraParams = $this->appplicationName;;

        $params = array(
            "limit" => $limit,
            "fsym" => $fsym,
            "tsym" => $tsym,
            "extraParams" => $extraParams,
            "sign" => $sign
        );
        $r = $this->getRequest("public", "/data/top/exchanges", $params);
        return $r;
    }
    /**
     * @param string $tsym - currency to convert to
     * @param bool $sign - server sided signing of request
     * @return mixed
     */
    public function getTopVolumes($tsym = "EUR", $limit = 20, $sign = false) {

        $extraParams = $this->appplicationName;;

        $params = array(
            "limit" => $limit,
            "tsym" => $tsym,
            "extraParams" => $extraParams,
            "sign" => $sign
        );
        $r = $this->getRequest("public", "/data/top/volumes", $params);
        return $r;
    }

    /**
     * @param bool $sign - server sided signing of request
     * @return mixed
     */
    public function getList($sign = false) {

        $extraParams = $this->appplicationName;;

        $params = array(
            "extraParams" => $extraParams,
            "sign" => $sign
        );
        $r = $this->getRequest("public", "/data/all/exchanges", $params);
        return $r;
    }


}