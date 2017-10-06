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

```php
$cryptocompareApi = new Cryptocompare\CryptocompareApi();
```

### use methods to return your data

#### get all available calls
```php
$example1 = $cryptocompareApi->getAvailableCalls();
```
#### get rate limits for your IP
```php
$example1 = $cryptocompareApi->getRateLimits();
```
#### convert a currency to an array of other currencies
```php
$example3 = $cryptocompareApi->getSinglePrice("1","BTC","USD","CCCAGG","false");
```
#### convert an array of currencies to another array of currencies
```php
$example4 = $cryptocompareApi->getMultiPrice("1",array("BTC","ETH"),array("USD","EUR","ETH"),"CCCAGG","false");
```
#### get all historical pricing data
```php
$example5 = $cryptocompareApi->getHistoricalPrice("1","BTC",array("USD","EUR","ETH"),"CCCAGG","false");
```


### full working code example
```php
<?php
require_once('vendor/autoload.php');

$cryptocompareApi = new Cryptocompare\CryptocompareApi();
$example1 = $cryptocompareApi->getAvailableCalls();

print_r($example1);
?>
