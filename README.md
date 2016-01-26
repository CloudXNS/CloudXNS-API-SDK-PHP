#CloudXNS-API-SDK-PHP 使用说明 #


#环境版本要求#

PHP >= 5.4.0

#安装步骤#
##安装Composer##
如果您还没有安装[Composer](https://getcomposer.org/),您可以通过[getcomposer.org](https://getcomposer.org/doc/00-intro.md#installation-nix)进行安装.

##安装运行CloudXNS PHP版SDK 示例##
###1.下载SDK源代码并安装###
您可以从[CloudXNS-API-SDK-PHP.zip](https://github.com/CloudXNS/CloudXNS-API-SDK-PHP/archive/master.zip) 下载zip包，解压后执行下边命令：
```shell
composer install
```
###2.修改API KEY###
修改demo文件夹下的php文件或者html目录下的demo.php文件中的API KEY：
```php
$api->setApiKey('xxxxxxxxxx');//修改成自己API KEY
$api->setSecretKey('xxxxxxxxxx');//修改成自己的SECERET KEY
$api->setProtocol(true);//设置true是https、false使用http
```
###3.执行demo下的php文件或者访问html下的html文件###
##项目中使用CloudXNS PHP版SD##
###1.使用composer安装源文件###
切换到要存放SDK源代码的目录，执行以下命令
```shell
composer require "cloudxns/cloud-xns-api-sdk-php:*"
composer require "guzzlehttp/guzzle: ~5.0"
```
###2.程序中使用SDK示例，更多详见demo文件夹###
```php
require_once '../vendor/autoload.php';//仅供参考，具体以项目中路径为准
$api = new \CloudXNS\Api();
$api->setApiKey('xxxxxxxxxx');//修改成自己API KEY
$api->setSecretKey('xxxxxxxxxx');//修改成自己的SECERET KEY
$api->setProtocol(true);//设置true使用https、false使用http
//获取域名列表
$api->domain->domainList();


//添加域名
$arr = array("domain"=>"cloudxns.net");
$api->domain->domainAdd($arr);


//删除域名
$api->domain->domainDelete('/5568');
```

###如何运行SDK示例###
修改demo文件夹下的php文件、html目录下的demo.php文件中require_once '../vendor/autoload.php'为autoload.php的真实相对路径即可