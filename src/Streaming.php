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
     * @throws InvalidRequest
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getAllMiningPoolsStaticInfoEndpoint($tsym = "USD", $limit = 10, $page = 0, $sign = "false") {
        $extraParams = $this->appplicationName;
        $params = array(
            "extraParams" => $extraParams,
            "sign" => $sign
        );
        $r = $this->getRequest(CryptocompareApi::PUB, "/data/top/totalvol", $params);
        return $r;
    }
}