##CloudXNS-API-SDK-PHP Package ##


##Requirements##

PHP >= 5.4.0

##Install##

If you do not have [Composer](https://getcomposer.org/), you may install it by following the instructions at [getcomposer.org](https://getcomposer.org/doc/00-intro.md#installation-nix).

###Install First###

Extract the archive file downloaded from [CloudXNS-API-SDK-PHP.zip](https://github.com/CloudXNS/CloudXNS-API-SDK-PHP/archive/master.zip) to your project.
You can then install using the following command:
```shell
composer install
```

###Install Second###
you can then install using the following command:
```shell
composer require "cloudxns/cloud-xns-api-sdk-php:*"
cd vendor/cloudxns/cloud-xns-api-sdk-php/
composer require "hightman/httpclient:*"
```

##Demo##
==================================================
```php
use Cloudxns\Api;

$api = new Api();
$api->setApiKey('xxxxx');
$api->setSecretKey('xxxx');
$api->setProtocol(true);

//获取域名列表
$api->domain->domainList();


//添加域名
$arr = array("domain"=>"cloudxns.net");
$api->domain->domainAdd($arr);


//删除域名
$api->domain->domainDelete('/5568');
```
