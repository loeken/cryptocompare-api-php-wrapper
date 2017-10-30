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
    public function getList($sign = false) {
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

}