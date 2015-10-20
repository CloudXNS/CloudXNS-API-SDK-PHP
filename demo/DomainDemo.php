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
$api->setApiKey('479b49046b9a9616bc09ca02f9b95fc5');
$api->setSecretKey('03c57ce31d374d41');
$api->setProtocol(true);

/**
 * 域名列表 
 * 
 * @return string
 */
$api->domain->domainList();


/**
 * 域名的添加
 * 
 * @param string $domain 域名的名称
 * @return string
 */
$api->domain->domainAdd('xcbeyond.com');


/**
 * 域名的删除
 * 
 * @param integer $id 域名ID
 * @return string
 */
$api->domain->domainDelete(32221);





