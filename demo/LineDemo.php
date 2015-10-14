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
$api->setApiKey('xxxx');
$api->setSecretKey('xxxx');
$api->setProtocol(true);

//线路列表
$api->setProtocol(false);
$api->line->lineList();

//区域列表
$api->setProtocol(false);
$api->line->lineList('/region');

//ISP列表
$api->setProtocol(true);
$api->line->lineList('/isp');