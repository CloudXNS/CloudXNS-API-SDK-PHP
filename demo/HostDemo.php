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
$api->setApiKey('xxxxx');
$api->setSecretKey('xxxxx');
$api->setProtocol(true);

/**
 * 主机列表的获取
 * 
 * @param integer $domainId  域名ID
 * @param integer $offset 记录开始的偏移,第一条记录为 0
 * @param integer $rowNum 要获取的记录的数量,最大可取 2000条
 * @return string
 */
$api->host->hostList(2125, 0, 30);

/**
 * 主机记录的删除
 * 
 * @param integer $hostId 主机记录 id
 * @return string
 */
$api->host->hostDelete(48088);
