<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 12/30/18
 * Time: 11:05 PM
 */

namespace Cryptocompare;


class Streaming extends CryptocompareApi
{

    /**
     * @param string $tsym
     * @param int $limit
     * @param int $page
     * @param string $sign
     * @return mixed
     */
    public function getAllMiningPoolsStaticInfoEndpoint($tsym = "USD", $limit = 10, $page = 0, $sign = "false") {
        $extraParams = $this->appplicationName;
        $params = array(
            "extraParams" => $extraParams,
            "sign" => $sign
        );
        $r = $this->getRequest("public", "/data/top/totalvol", $params);
        return $r;
    }
}