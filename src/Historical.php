<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 12/29/18
 * Time: 11:22 PM
 */

namespace Cryptocompare;

/**
 * Class Historical
 * @package Cryptocompare
 */
class Historical extends CryptocompareApi
{
    /**
     * @param string $tryConversion
     * @param string $fsym
     * @param string $tsym
     * @param string $e
     * @param string $sign
     * @param int $aggregate
     * @param int $limit
     * @param null $toTs
     * @return mixed
     * @throws InvalidRequest
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getDataHistoday($tryConversion = "true", $fsym = "BTC", $tsym = "EUR", $e = "CCCAGG", $sign = "false", $aggregate = 1, $limit = 1440, $toTs = NULL) {
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
        $r = $this->getRequest(CryptocompareApi::PUB, "/data/histoday", $params);
        return $r;
    }

    /**
     * @param string $tryConversion
     * @param string $fsym
     * @param string $tsym
     * @param string $e
     * @param string $sign
     * @param int $aggregate
     * @param int $limit
     * @param null $toTs
     * @return mixed
     * @throws InvalidRequest
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getDataHistohour($tryConversion = "true", $fsym = "BTC", $tsym = "EUR", $e = "CCCAGG", $sign = "false", $aggregate = 1, $limit = 1440, $toTs = NULL) {
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
        $r = $this->getRequest(CryptocompareApi::PUB, "/data/histohour", $params);
        return $r;
    }

    /**
     * @param string $tryConversion
     * @param string $fsym
     * @param string $tsym
     * @param string $e
     * @param string $sign
     * @param int $aggregate
     * @param int $limit
     * @param null $toTs
     * @return mixed
     * @throws InvalidRequest
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getHistoMinute($tryConversion = "true", $fsym = "BTC", $tsym = "EUR", $e = "CCCAGG", $sign = "false", $aggregate = 1, $limit = 1440, $toTs = NULL) {
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
        $r = $this->getRequest(CryptocompareApi::PUB, "/data/histominute", $params);
        return $r;
    }

    /**
     * @param string $tryConversion
     * @param string $fsym
     * @param array $tsyms
     * @param string $ts
     * @param string $e
     * @param string $sign
     * @return mixed
     * @throws InvalidRequest
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getDataPriceHistorical($tryConversion = "true", $fsym = "BTC", $tsyms = array("USD","EUR"), $ts = "1507469305", $e = "CCCAGG", $sign = "false") {
        $_tsyms = "";
        $extraParams = $this->appplicationName;
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
            "sign" => $sign,
            "ts" => $ts,
        );
        $r = $this->getRequest(CryptocompareApi::PUB, "/data/pricehistorical", $params);
        return $r;
    }

    /**
     * @param string $tryConversion
     * @param string $fsym
     * @param string $tsym
     * @param string $e
     * @param string $avgType
     * @param int $UTCHourDiff
     * @param string $toTs
     * @param string $sign
     * @return mixed
     * @throws InvalidRequest
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getDataPriceHistoricalDayAvg($tryConversion = "true", $fsym = "BTC", $tsym = "EUR", $e = "CCCAGG", $avgType = "HourVWAP", $UTCHourDiff = 0, $toTs = "1487116800", $sign = "false") {

        $extraParams = $this->appplicationName;;

        $params = array(
            "tryConversion" => $tryConversion,
            "avgType" => $avgType,
            "UTCHourDiff" => $UTCHourDiff,
            "toTs" => $toTs,
            "fsym" => $fsym,
            "tsym" => $tsym,
            "e" => $e,
            "extraParams" => $extraParams,
            "sign" => $sign
        );
        $r = $this->getRequest(CryptocompareApi::PUB, "/data/dayAvg", $params);
        return $r;
    }

    /**
     * @param string $tsym
     * @param string $e
     * @param string $aggregate
     * @param string $aggregatePredictableTimePeriods
     * @param string $sign
     * @param int $limit
     * @param null $toTs
     * @return mixed
     * @throws InvalidRequest
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getDataExchangeHistoday($tsym = "EUR", $e = "CCCAGG", $aggregate = "1", $aggregatePredictableTimePeriods = "true", $sign = "false", $limit = 1440, $toTs = NULL) {
        $extraParams = $this->appplicationName;

        $params = array(
            "aggregatePredictableTimePeriods" => $aggregatePredictableTimePeriods,
            "tsym" => $tsym,
            "e" => $e,
            "extraParams" => $extraParams,
            "sign" => $sign,
            "aggregate" => $aggregate,
            "limit" => $limit,
            "toTs" => $toTs,
        );
        $r = $this->getRequest(CryptocompareApi::PUB, "/data/exchange/histoday", $params);
        return $r;
    }

    /**
     * @param string $tsym
     * @param string $e
     * @param int $aggregate
     * @param string $aggregatePredictableTimePeriods
     * @param string $sign
     * @param int $limit
     * @param null $toTs
     * @return mixed
     * @throws InvalidRequest
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getDataExchangeHistohour($tsym = "EUR", $e = "CCCAGG", $aggregate = 1, $aggregatePredictableTimePeriods = "true", $sign = "false", $limit = 1440, $toTs = NULL) {
        $extraParams = $this->appplicationName;

        $params = array(
            "aggregatePredictableTimePeriods" => $aggregatePredictableTimePeriods,
            "tsym" => $tsym,
            "e" => $e,
            "extraParams" => $extraParams,
            "sign" => $sign,
            "aggregate" => $aggregate,
            "limit" => $limit,
            "toTs" => $toTs,
        );
        $r = $this->getRequest(CryptocompareApi::PUB, "/data/exchange/histohour", $params);
        return $r;
    }
}