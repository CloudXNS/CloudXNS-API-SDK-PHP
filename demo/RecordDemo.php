<?php
/**
 * 解析记录的接口逻辑处理的Demo
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


//解析量的统计
$api->record->recordList("/5574?host_id=0&offset=0&row_num=30");

//新增解析记录
$arr = array(
    'domain_id' => 5574,
    'host' => 'mp3',
    'value' => '192.168.100.210',
    'type' => 'A',
    'mx' => 55,
    'ttl' => 600,
    'line_id' => 48
);
$api->record->recordAdd($arr);

//新增备记录
$arr1 = array(
    'domain_id' => 5574,
    'host_id' => 49565,
    'record_id' => 106943,
    'value' => '192.168.100.222'
);
$api->record->spareAdd($arr1);

//更新解析记录
$arr2 = array(
    'domain_id' => 5574,
    'host' => 'www',
    'value' => '192.168.100.210',
    'type' => 'A',
    'mx' => 55,
    'ttl' => 600,
    'line_id' => 48
);
$api->record->recordUpdate($arr2, "/106943");


//删除解析记录
$api->record->recordDelete("/106943/5574");


//批量删除解析记录，暂未开放
//$record = new Record('', "/5574?host_id=106943&type=A&line_id=1&recursion=true");
//$record->recordDelAll();
