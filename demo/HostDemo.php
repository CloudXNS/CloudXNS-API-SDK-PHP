<?php
/**
 * 主机记录的接口逻辑处理的Demo
 * 
 * @author CLoudXNS <support@cloudxns.net>
 * @link https://www.cloudxns.net/
 * @copyright Copyright (c) 2015 Cloudxns.
 */
require_once 'Config.inc.php';
use Cloudxns\Api;

$api = new Api();
$api->setApiKey('xxxx');
$api->setSecretKey('xxx');
$api->setProtocol(true);

//主机记录列表
$api->host->hostList('/5574?offset=0&row_num=30');

//删除主机
$api->host->hostDelete('/49566');