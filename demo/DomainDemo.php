<?php
/**
 * 域名的接口逻辑处理的Demo
 * 
 * @author CLoudXNS <support@cloudxns.net>
 * @link https://www.cloudxns.net/
 * @copyright Copyright (c) 2015 Cloudxns.
 */
require_once 'Config.inc.php';
use Cloudxns\Api;

$api = new Api();
$api->setApiKey('XXX');
$api->setSecretKey('XXX');
$api->setProtocol(true);

//获取域名列表
$api->domain->domainList();


//添加域名
$arr = array("domain"=>"cloudxns.net");
$api->domain->domainAdd($arr);


//删除域名
$api->domain->domainDelete('/5568');





