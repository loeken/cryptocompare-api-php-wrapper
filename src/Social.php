<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 12/29/18
 * Time: 11:52 PM
 */

namespace Cryptocompare;


class Social extends CryptocompareApi
{
    /**
     * @param bool $coinId
     * @param int $aggregate
     * @param bool $aggregatePredictableTimePeriods
     * @param string $toTs
     * @param bool $sign
     * @param int $limit
     * @return mixed
     */
    public function getHistoricalDaySocialStats($coinId = false, $aggregate = 0, $aggregatePredictableTimePeriods = true, $toTs = "1507469305", $sign = false, $limit = 1440) {
        $extraParams = $this->appplicationName;

        $params = array(
            "coinId" => $coinId,
            "aggregate" => $aggregate,
            "limit" => $limit,
            "toTs" => $toTs,
            "aggregatePredictableTimePeriods" => $aggregatePredictableTimePeriods,
            "extraParams" => $extraParams,
            "sign" => $sign
        );
        $r = $this->getRequest("public", "/data/social/histo/day", $params);
        return $r;
    }

    /**
     * @param bool $coinId
     * @param int $aggregate
     * @param bool $aggregatePredictableTimePeriods
     * @param string $toTs
     * @param bool $sign
     * @param int $limit
     * @return mixed
     */
    public function getHistoricalHourSocialStats($coinId = false, $aggregate = 0, $aggregatePredictableTimePeriods = true, $toTs = "1507469305", $sign = false, $limit = 1440) {
        $extraParams = $this->appplicationName;

        $params = array(
            "coinId" => $coinId,
            "aggregate" => $aggregate,
            "limit" => $limit,
            "toTs" => $toTs,
            "aggregatePredictableTimePeriods" => $aggregatePredictableTimePeriods,
            "extraParams" => $extraParams,
            "sign" => $sign
        );
        $r = $this->getRequest("public", "/data/social/histo/day", $params);
        return $r;
    }

}