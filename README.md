# cryptocompare-api-php-wrapper


# 0.) untested
I just started rewriting it to match the documentation that can be found on

https://min-api.cryptocompare.com/documentation


There are some new endpoints available, some will get deprecated soon. I cleaned this up. Did not test yet.
Added base for phpunit based unit tests.

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


### full working code example
```php
<?php
require_once('vendor/autoload.php');


$cryptocomparePrice = new Cryptocompare\Price();
$example1 = $cryptocomparePrice->getSingleSymbolPriceEndpoint("1","BTC","USD","CCCAGG","false");
print_r($example1);

?>