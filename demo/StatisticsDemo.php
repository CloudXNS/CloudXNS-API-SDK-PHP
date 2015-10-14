<?php
/**
 * 解析统计的接口逻辑处理的Demo
 * 
 * @author CLoudXNS <support@cloudxns.net>
 * @link https://www.cloudxns.net/
 * @copyright Copyright (c) 2015 Cloudxns.
 */
require_once 'Config.inc.php';
use Cloudxns\Api;

$api = new Api();
$api->setApiKey('xxxxx');
$api->setSecretKey('xxxxxx');
$api->setProtocol(true);

//解析统计列表
$api->statistics->statisticsList("/5574?host=all&code=all&start_date='2015-1-1'&end_date='2015-10-1'");