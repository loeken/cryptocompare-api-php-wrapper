<?php
use PHPUnit\Framework\TestCase;

class coinTest extends TestCase
{
    public function testGetDataExchangeHistoday() {

        $historical = new \Cryptocompare\Historical();
        $data = $historical->getDataExchangeHistoday();

        $c = count((array) $data->Data);
        $this->assertGreaterThan(
            1,
            $c,
            "Found more then 1 items returned"
        );
    }

    public function testGetDataExchangeHistohour() {

        $historical = new \Cryptocompare\Historical();
        $data = $historical->getDataExchangeHistohour();

        $c = count((array) $data->Data);
        $this->assertGreaterThan(
            1,
            $c,
            "Found more then 1 items returned"
        );
    }
    public function testGetDataHistoday() {

        $historical = new \Cryptocompare\Historical();
        $data = $historical->getDataHistoday();

        $c = count((array) $data->Data);
        $this->assertGreaterThan(
            1,
            $c,
            "Found more then 1 items returned"
        );
    }

    public function testGetDataHistohour() {

        $historical = new \Cryptocompare\Historical();
        $data = $historical->getDataHistohour();

        $c = count((array) $data->Data);
        $this->assertGreaterThan(
            1,
            $c,
            "Found more then 1 items returned"
        );
    }
    public function testGetDataPriceHistorical() {

        $historical = new \Cryptocompare\Historical();
        $data = $historical->getDataPriceHistorical();

        $c = count((array) $data);
        $this->assertGreaterThan(
            1,
            $c,
            "Found more then 1 items returned"
        );
    }

    public function testGetDataPriceHistoricalDayAvg() {

        $historical = new \Cryptocompare\Historical();
        $data = $historical->getDataPriceHistoricalDayAvg("true", "BTC", "EUR");


        $c = $data->EUR;
        $this->assertGreaterThan(
            1,
            $c,
            "Found more then 1 items returned"
        );
    }
    public function testGetHistoMinute() {

        $historical = new \Cryptocompare\Historical();
        $data = $historical->getHistoMinute();

        $c = count((array) $data->Data);
        $this->assertGreaterThan(
            1,
            $c,
            "Found more then 1 items returned"
        );
    }

}