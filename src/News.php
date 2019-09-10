<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 12/29/18
 * Time: 11:37 PM
 */

namespace Cryptocompare;


class News extends CryptocompareApi
{
    /**
     * @param string $feeds
     * @param string $categories
     * @param string $excludeCategories
     * @param string $lTs
     * @param string $lang
     * @param string $sortOrder
     * @param bool $sign
     * @param int $limit
     * @return mixed
     * @throws InvalidRequest
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getDataExchangeHistohour($feeds = "cryptocompare,cryptoglobe", $categories = "Blockchain,ICO", $excludeCategories  = "NO_EXCLUDED_NEWS_CATEGORIES", $lTs = "1507469305", $lang = "EN", $sortOrder = "latest", $sign= false, $limit = 1440) {
        $extraParams = $this->appplicationName;

        $params = array(
            "feeds" => $feeds,
            "limit" => $limit,
            "extraParams" => $extraParams,
            "categories" => $categories,
            "excludeCategories" => $excludeCategories,
            "lang" => $lang,
            "lTs" => $lTs,
            "sortOrder" => $sortOrder,
            "sign" => $sign,
        );
        $r = $this->getRequest(CryptocompareApi::PUB, "/data/v2/news/", $params);
        return $r;
    }

    /**
     * @param bool $sign
     * @return mixed
     * @throws InvalidRequest
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getListNewsFeedsEndpoint( $sign= false ) {
        $extraParams = $this->appplicationName;
        $params = array(
            "extraParams" => $extraParams,
            "sign" => $sign,
        );
        $r = $this->getRequest(CryptocompareApi::PUB, "/data/news/feeds", $params);
        return $r;
    }

    /**
     * @param bool $sign
     * @return mixed
     * @throws InvalidRequest
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getNewsArticleCategoriesEndpoint( $sign= false ) {
        $extraParams = $this->appplicationName;
        $params = array(
            "extraParams" => $extraParams,
            "sign" => $sign,
        );
        $r = $this->getRequest(CryptocompareApi::PUB, "/data/news/categories", $params);
        return $r;
    }

    /**
     * @param bool $sign
     * @return mixed
     * @throws InvalidRequest
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getNewsFeedAndCategoriesEndpoint( $sign= false ) {
        $extraParams = $this->appplicationName;
        $params = array(
            "extraParams" => $extraParams,
            "sign" => $sign,
        );
        $r = $this->getRequest(CryptocompareApi::PUB, "/data/news/feedsandcategories", $params);
        return $r;
    }
}
