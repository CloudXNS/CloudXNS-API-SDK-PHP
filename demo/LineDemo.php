<?php

/**
 * 线路&区域&ISP列表的接口逻辑处理的Demo
 * 
 * @author CLoudXNS <support@cloudxns.net>
 * @link https://www.cloudxns.net/
 * @copyright Copyright (c) 2015 Cloudxns.
 */
require_once 'Config.inc.php';

use Cloudxns\Api;

$api = new Api();
$api->setApiKey('xxxxx');
$api->setSecretKey('xxxxx');
$api->setProtocol(true);

$api->setProtocol(false);
/**
 * 线路的列表
 * 
 * @return string
 */
$api->line->lineList();


$api->setProtocol(false);
/**
 * 区域列表
 * 
 * @return string
 */
$api->line->regionList();


$api->setProtocol(true);
/**
 * ISP的列表
 * 
 * @return string
 */
$api->line->ispList();
