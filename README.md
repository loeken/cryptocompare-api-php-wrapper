# cryptocompare-api-php-wrapper

# 1.) Installation
the easiest way to get started is to use composer to retrieve the files.

### prepare composer inside your project folder
The following commands will download the pre compiled composer.phar, which will download the project for us.
```bash
cd ~/Projectfolder
wget https://getcomposer.org/composer.phar
```

### create composer.json or add to your existing composer.json
#### minimal composer.json
```composer
{
  "require": {
    "loeken/cryptocompare-api-php-wrapper": "dev-master"
  }
}
```
#### single line to add composer.json
```composer
    "loeken/cryptocompare-api-php-wrapper": "dev-master",
```
### make composer update from github/packagist
```bash
php composer.phar update
```

### short explanation of composer
composer retrieves the last version of the code from github and downloads it to the vendor/* folder inside your project. It will also generate a autoload.php which you can then load inside your php code, this will then load all classes included in this project. This is also usefull if you want to update our api wrapper to the last version, simply run the composer update command again.

### including our classes in your files
if your .php script file is in the same folder as the vendor folder, use the following line, else adjust the path.
```
<?php
require_once('vendor/autoload.php');
```
### create object of class
There are currently 3 available classes under the namespaces
\Cryptocompare\CryptocompareApi, \Cryptocompare\Price and \Cryptocompare\Coin.

The first can be used to get info about the api, the second one will display info about crypto prices/conversions.
```php
$cryptocompareApi = new Cryptocompare\CryptocompareApi();

$cryptocomparePrice = new Cryptocompare\Price();

$cryptocompareCoin = new Cryptocompare\Coin();

$cryptocompareMarket = new Cryptocompare\Market();
```

## Cryptocompare\CryptocompareApi
#### get all available calls
```php
$example1 = $cryptocompareApi->getAvailableCalls();
```
#### get rate limits for your IP
```php
$example2 = $cryptocompareApi->getRateLimits();
```
#### get mining contracts
```php
$example3 = $cryptocompareApi->getMiningContracts();
```
#### get mining equipment
```php
$example4 = $cryptocompareApi->getMiningEquipment();
```
#### get news providers
```php
$example5 = $cryptocompareApi->getNewsProviders();
```
#### get news
```php
$example6 = $cryptocompareApi->getNews();
```


## Cryptocompare\Price
#### convert a currency to an array of other currencies
```php
$example1 = $cryptocomparePrice->getSinglePrice("1","BTC","USD","CCCAGG","false");
```
#### convert an array of currencies to another array of currencies
```php
$example2 = $cryptocomparePrice->getMultiPrice("1",array("BTC","ETH"),array("USD","EUR","ETH"),"CCCAGG","false");
```
#### convert an array of currencies to another array of currencies
```php
$example3 = $cryptocomparePrice->getHistoricalPrice("1", "BTC", array("USD","EUR"), "1507469305", "CCCAGG", false);
```
#### get trading information for currencies
```php
$example4 = $cryptocomparePrice->getMultiPriceFull("1", array("BTC","ETH"), array("USD","EUR"),"CCCAGG", false);
```
#### get trading information for currencies
```php
$example5 = $cryptocomparePrice->getGenerateAvg("1", "BTC", "EUR", "Coinbase,Kraken",false);
```
#### get trading information for currencies
```php
$example6 = $cryptocomparePrice->getDayAvg("1", "BTC", "EUR", "CCCAGG", "HourVWAP", 0, "1487116800", false);
```
#### get trading information for currencies
```php
$example7 = $cryptocomparePrice->getSubsWatchlist("1", array("BTC", "ETH"), "EUR", "CCCAGG",false);
```
#### get all streamer subscription channels for the requested pair
```php
$example8 = $cryptocomparePrice->getSubs("1", "BTC", array("USD", "EUR"), "CCCAGG", false);
```

## Cryptocompare\Coin
#### get all coins
```php
$example1 = $cryptocompareCoin->getList();
```
#### get top pairs
```php
$example2 = $cryptocompareCoin->getTopPairs("BTC", "EUR", 5, false);
```
#### get all historical data for minute
```php
$example3 = $cryptocompareCoin->getHistoMinute(1,"BTC", "EUR","CCCAGG", false, 1, 1440, NULL);
```
#### get all historical data for minute
```php
$example4 = $cryptocompareCoin->getHistoHour(1,"BTC", "EUR","CCCAGG", false, 1, 1440, NULL);
```
#### get all historical data for minute
```php
$example5 = $cryptocompareCoin->getHistoDay(1,"BTC", "EUR","CCCAGG", false, 1, 1440, NULL);
```
#### get snapshot
```php
$example6 = $cryptocompareCoin->getSnapshot("BTC", "EUR");
```
#### get snapshot by coin id ( get id from ->getList() )
```php
$example7 = $cryptocompareCoin->getSnapshotFullById(1182);
```
#### get social stats by coin id ( get id from ->getList() )
```php
$example8 = $cryptocompareCoin->getSocialStats(1182);
```

## Cryptocompare\Market
#### get top pairs
```php
$example1 = $cryptocompareMarket->getTopPairs("BTC","EUR", 5,false );

```
#### get top exchanges
```php
$example1 = $cryptocompareMarket->getTopExchanges("BTC", "EUR", 5, false);

```
#### get top volumes
```php
$example1 = $cryptocompareMarket->getTopVolumes("EUR", 20, false);

```
#### get all markets
```php
$example1 = $cryptocompareMarket->getList(false);

```

### full working code example
```php
<?php
require_once('vendor/autoload.php');

$cryptocompareApi = new Cryptocompare\CryptocompareApi();
$example1 = $cryptocompareApi->getAvailableCalls();
print_r($example1);

$cryptocomparePrice = new Cryptocompare\Price();
$example2 = $cryptocomparePrice->getSinglePrice("1","BTC","USD","CCCAGG","false");
print_r($example2);


$cryptocompareCoin = new Cryptocompare\Coin();
$example3 = $cryptocompareCoin->getList();
print_r($example3);

?>