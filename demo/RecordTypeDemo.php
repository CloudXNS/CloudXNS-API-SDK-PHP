<?php
/**
 * 记录类型列表的接口逻辑处理的Demo
 * 
 * @author CLoudXNS <support@cloudxns.net>
 * @link https://www.cloudxns.net/
 * @copyright Copyright (c) 2015 Cloudxns.
 */
require_once 'Config.inc.php';
use Cloudxns\Api;

$api = new Api();
$api->setApiKey('xxxx');
$api->setSecretKey('xxxxx');
$api->setProtocol(true);

//记录类型列表
$api->recordType->typeList();