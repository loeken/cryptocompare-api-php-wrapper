<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 10/6/17
 * Time: 6:46 PM
 */

namespace Cryptocompare;

class Coin extends CryptocompareApi
{
    /**
     * @return bool|mixed - returns general info for all the coins available on the website.
     */
    public function getList() {
        $extraParams = $this->appplicationName;;
        $params = array();
        $action = "/coinlist";
        $r = $this->getRequest("private", $action, $params);
        return $r;
    }
    /**
     * @return bool|mixed - returns general info for all the coins available on the website.
     */
    public function getListWithContent($sign = false) {
        $extraParams = $this->appplicationName;
        $params = array(
            "extraParams" => $extraParams,
            "sign" => $sign
        );
        $r = $this->getRequest("public", "/data/all/coinlist", $params);
        return $r;
    }

    /**
     * @param string $fsym
     * @param string $tsym
     * @return bool|mixed
     */
    public function getSnapshot($fsym = "BTC", $tsym = "EUR") {
        $params = array(
            "fsym" => $fsym,
            "tsym" => $tsym
        );
        $r = $this->getRequest("private", "/coinsnapshot", $params);
        return $r;
    }

    /**
     * @param int $id
     * @return bool|mixed
     */
    public function getSnapshotFullById($id = 0) {
        $params = array(
            "id" => $id,
        );
        $r = $this->getRequest("private", "/coinsnapshotfullbyid", $params);
        return $r;
    }

    /**
     * @param int $id
     * @return bool|mixed
     */
    public function getSocialStats($id = 0) {
        $params = array(
            "id" => $id,
        );
        $r = $this->getRequest("private", "/socialstats", $params);
        return $r;
    }

    /**
     * @param string $tryConversion
     * @param string $fsym
     * @param string $tsym
     * @param string $e
     * @param bool $sign
     * @param int $aggregate
     * @param int $limit
     * @param null $toTs
     * @return bool|mixed
     */
    public function getHistoMinute($tryConversion = "1", $fsym = "BTC", $tsym = "EUR", $e = "CCCAGG", $sign = false, $aggregate = 1, $limit = 1440, $toTs = NULL) {
        $extraParams = $this->appplicationName;

        $params = array(
            "tryConversion" => $tryConversion,
            "fsym" => $fsym,
            "tsym" => $tsym,
            "e" => $e,
            "extraParams" => $extraParams,
            "sign" => $sign,
            "aggregate" => $aggregate,
            "limit" => $limit,
            "toTs" => $toTs,
        );
        $r = $this->getRequest("public", "/data/histominute", $params);
        return $r;
    }

    /**
     * @param string $tryConversion
     * @param string $fsym
     * @param string $tsym
     * @param string $e
     * @param bool $sign
     * @param int $aggregate
     * @param int $limit
     * @param null $toTs
     * @return bool|mixed
     */
    public function getHistoHour($tryConversion = "1", $fsym = "BTC", $tsym = "EUR", $e = "CCCAGG", $sign = false, $aggregate = 1, $limit = 1440, $toTs = NULL) {
        $extraParams = $this->appplicationName;

        $params = array(
            "tryConversion" => $tryConversion,
            "fsym" => $fsym,
            "tsym" => $tsym,
            "e" => $e,
            "extraParams" => $extraParams,
            "sign" => $sign,
            "aggregate" => $aggregate,
            "limit" => $limit,
            "toTs" => $toTs,
        );
        $r = $this->getRequest("public", "/data/histohour", $params);
        return $r;
    }

    /**
     * @param string $tryConversion
     * @param string $fsym
     * @param string $tsym
     * @param string $e
     * @param bool $sign
     * @param int $aggregate
     * @param int $limit
     * @param null $toTs
     * @return bool|mixed
     */
    public function getHistoDay($tryConversion = "1", $fsym = "BTC", $tsym = "EUR", $e = "CCCAGG", $sign = false, $aggregate = 1, $limit = 1440, $toTs = NULL) {
        $extraParams = $this->appplicationName;

        $params = array(
            "tryConversion" => $tryConversion,
            "fsym" => $fsym,
            "tsym" => $tsym,
            "e" => $e,
            "extraParams" => $extraParams,
            "sign" => $sign,
            "aggregate" => $aggregate,
            "limit" => $limit,
            "toTs" => $toTs,
        );
        $r = $this->getRequest("public", "/data/histoday", $params);
        return $r;
    }
}