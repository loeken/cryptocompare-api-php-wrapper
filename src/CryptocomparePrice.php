<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 10/6/17
 * Time: 6:46 PM
 */

namespace Cryptocompare;


class CryptocomparePrice extends CryptocompareApi
{
    /**
     * @param string $tryConversion - type of currency to convert from - default: BTC
     * @param string $fsym - base currency to convert from
     * @param string $tsyms - currency to convert to
     * @param string $e - the exchange
     * @param string $extraParams - extra parameters
     * @param bool $sign - server sided signing of request
     * @return mixed
     */
    public function getSinglePrice($tryConversion = "1", $fsym = "BTC", $tsyms = "USD", $e = "CCCAGG", $sign = false) {
        $extraParams = $this->appplicationName;;
        $params = array(
            "tryConversion" => $tryConversion,
            "fsym" => $fsym,
            "tsyms" => $tsyms,
            "e" => $e,
            "extraParams" => $extraParams,
            "sign" => $sign
        );
        $r = $this->getRequest("public", "/data/price", $params);
        return $r;
    }

    /**
     * @param string $tryConversion - type of currency to convert from - default: BTC
     * @param array $fsym - base currencies to convert from
     * @param array $tsyms - currencies to convert to
     * @param string $e - the exchange
     * @param string $extraParams - extra parameters
     * @param bool $sign - server sided signing of request
     * @return mixed
     */
    public function getMultiPrice($tryConversion = "1", $fsyms = array("BTC","ETH"), $tsyms = array("USD","EUR"), $e = "CCCAGG", $sign = false) {
        $_tsyms = $this->arrayToCommaSeperatedString($tsyms);
        $_fsyms = $this->arrayToCommaSeperatedString($fsyms);
        $extraParams = $this->appplicationName;;

        $params = array(
            "tryConversion" => $tryConversion,
            "fsyms" => $_fsyms,
            "tsyms" => $_tsyms,
            "e" => $e,
            "extraParams" => $extraParams,
            "sign" => $sign
        );
        $r = $this->getRequest("public", "/data/pricemulti", $params);
        return $r;
    }

    /**
     * @param string $tryConversion - type of currency to convert from - default: BTC
     * @param array $fsym - base currencies to convert from
     * @param array $tsyms - currencies to convert to
     * @param string $e - the exchange
     * @param bool $sign - server sided signing of request
     * @return mixed
     */
    public function getHistoricalPrice($tryConversion = "1", $fsym = "BTC", $tsyms = array("USD","EUR"), $e = "CCCAGG", $sign = false) {
        $_tsyms = "";
        $extraParams = $this->appplicationName;;
        foreach ($tsyms as $i => $tsym ) {
            if ($i == 0 ) {
                $_tsyms = $tsym;
            } else {
                $_tsyms = $_tsyms . "," . $tsym;
            }
        }
        $params = array(
            "tryConversion" => $tryConversion,
            "fsym" => $fsym,
            "tsyms" => $_tsyms,
            "e" => $e,
            "extraParams" => $extraParams,
            "sign" => $sign
        );
        $r = $this->getRequest("public", "/data/price", $params);
        return $r;
    }
}