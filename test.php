<?php
require_once('vendor/autoload.php');

$apiKey = "";
if ($apiKey == "" ) {
    echo "I will change my api key above";
    die();
}
$cryptocomparePrice = new Cryptocompare\Price($apiKey);
try {
    $example1 = $cryptocomparePrice->getSingleSymbolPriceEndpoint("true", "BTC", "USD", "CCCAGG", "false");

    print_r($example1);
} catch (Exception $exception ) {
    print_r($exception->getTraceAsString());
}
?>
