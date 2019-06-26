<?php
use PHPUnit\Framework\TestCase;

class coinTest extends TestCase
{
    /**
     * This is a key i made?! can totaly be switched...
     *
     *
     * @var string
     */
    private $testingApiKey = '23c7cfde8b4a26680142856ea4da10d5cf204b12196a00e4428c31b8435aa33b';


    public function testGetDataExchangeHistoday() {

        $historical = new \Cryptocompare\Historical($this->testingApiKey);
        $data = $historical->getDataExchangeHistoday();

        $c = count((array) $data->Data);
        $this->assertGreaterThan(
            1,
            $c,
            "Found more then 1 items returned"
        );
    }

    public function testGetDataExchangeHistohour() {

        $historical = new \Cryptocompare\Historical($this->testingApiKey);
        $data = $historical->getDataExchangeHistohour();

        $c = count((array) $data->Data);
        $this->assertGreaterThan(
            1,
            $c,
            "Found more then 1 items returned"
        );
    }
    public function testGetDataHistoday() {

        $historical = new \Cryptocompare\Historical($this->testingApiKey);
        $data = $historical->getDataHistoday();

        $c = count((array) $data->Data);
        $this->assertGreaterThan(
            1,
            $c,
            "Found more then 1 items returned"
        );
    }

    public function testGetDataHistohour() {

        $historical = new \Cryptocompare\Historical($this->testingApiKey);
        $data = $historical->getDataHistohour();

        $c = count((array) $data->Data);
        $this->assertGreaterThan(
            1,
            $c,
            "Found more then 1 items returned"
        );
    }
    public function testGetDataPriceHistorical() {

        $historical = new \Cryptocompare\Historical($this->testingApiKey);
        $data = $historical->getDataPriceHistorical();
        
        $c = count((array) $data);
        $this->assertGreaterThan(
            1,
            $c,
            "Found more then 1 items returned"
        );
    }

    public function testGetDataPriceHistoricalDayAvg() {

        $historical = new \Cryptocompare\Historical($this->testingApiKey);
        $data = $historical->getDataPriceHistoricalDayAvg("true", "BTC", "EUR");


        $c = $data->EUR;
        $this->assertGreaterThan(
            1,
            $c,
            "Found more then 1 items returned"
        );
    }
    public function testGetHistoMinute() {

        $historical = new \Cryptocompare\Historical($this->testingApiKey);
        $data = $historical->getHistoMinute();

        $c = count((array) $data->Data);
        $this->assertGreaterThan(
            1,
            $c,
            "Found more then 1 items returned"
        );
    }

}