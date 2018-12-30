<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 10/6/17
 * Time: 6:46 PM
 */

namespace Cryptocompare;

class Price extends CryptocompareApi
{
    /**
     * @param string $tryConversion
     * @param string $fsym
     * @param array $tsyms
     * @param string $e
     * @param bool $sign
     * @return mixed
     */
    public function getSingleSymbolPriceEndpoint($tryConversion = "true", $fsym = "BTC", $tsyms = array("USD", "EUR"), $e = "CCCAGG", $sign = false)
    {
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
     * @param string $tryConversion
     * @param array $fsyms
     * @param array $tsyms
     * @param string $e
     * @param bool $sign
     * @return mixed
     */
    public function getMultipleSymbolsPriceEndpoint($tryConversion = "true", $fsyms = array("BTC", "ETH"), $tsyms = array("USD", "EUR"), $e = "CCCAGG", $sign = false)
    {
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
     * @param string $tryConversion
     * @param array $fsyms
     * @param array $tsyms
     * @param string $e
     * @param bool $sign
     * @return mixed
     */
    public function getMultipleSymbolsFullPriceEndpoint($tryConversion = "true", $fsyms = array("BTC", "ETH"), $tsyms = array("USD", "EUR"), $e = "CCCAGG", $sign = false)
    {
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
        $r = $this->getRequest("public", "/data/pricemultifull", $params);
        return $r;
    }

    /**
     * @param string $tryConversion
     * @param string $fsym
     * @param string $tsym
     * @param string $e
     * @param bool $sign
     * @return mixed
     */
    public function getGenerateAvg($tryConversion = "true", $fsym = "BTC", $tsym = "EUR", $e = "Coinbase,Kraken", $sign = false)
    {

        $extraParams = $this->appplicationName;;

        $params = array(
            "tryConversion" => $tryConversion,
            "fsym" => $fsym,
            "tsym" => $tsym,
            "e" => $e,
            "extraParams" => $extraParams,
            "sign" => $sign
        );
        $r = $this->getRequest("public", "/data/generateAvg", $params);
        return $r;
    }

    /**
     * @param string $tryConversion
     * @param array $fsyms
     * @param string $tsym
     * @param string $e
     * @param bool $sign
     * @return mixed
     */
    public function getSubsWatchlist($tryConversion = "true", $fsyms = array("BTC", "ETH"), $tsym = "EUR", $e = "CCCAGG", $sign = false)
    {

        $_fsyms = $this->arrayToCommaSeperatedString($fsyms);
        $extraParams = $this->appplicationName;;

        $params = array(
            "tryConversion" => $tryConversion,
            "fsyms" => $_fsyms,
            "tsym" => $tsym,
            "e" => $e,
            "extraParams" => $extraParams,
            "sign" => $sign
        );
        $r = $this->getRequest("public", "/data/subsWatchlist", $params);
        return $r;
    }

    /**
     * @param string $tryConversion
     * @param string $fsym
     * @param array $tsyms
     * @param string $e
     * @param bool $sign
     * @return mixed
     */
    public function getSubs($tryConversion = "true", $fsym = "BTC", $tsyms = array("USD", "EUR"), $e = "CCCAGG", $sign = false)
    {

        $_tsyms = $this->arrayToCommaSeperatedString($tsyms);
        $extraParams = $this->appplicationName;;

        $params = array(
            "tryConversion" => $tryConversion,
            "fsym" => $fsym,
            "tsyms" => $_tsyms,
            "e" => $e,
            "extraParams" => $extraParams,
            "sign" => $sign
        );
        $r = $this->getRequest("public", "/data/subs", $params);
        return $r;
    }
}