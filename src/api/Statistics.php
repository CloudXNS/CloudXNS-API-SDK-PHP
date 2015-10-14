<?php

/**
 * 解析统计的接口逻辑处理
 * 
 * @author CLoudXNS <support@cloudxns.net>
 * @link https://www.cloudxns.net/
 * @copyright Copyright (c) 2015 Cloudxns.
 */
namespace CloudXNS;

use CloudXNS\Api;

final class Statistics extends Api {
    
    public function __construct() {
        $this->setApiType("Statistics");
    }
    
    //解析统计列表
    public function statisticsList($urlExtend = '') {
        //设置URL扩展
        $this->setUrlExtend($urlExtend);
        
        //初始化参数
        $this->initParam();
        
        //设置请求的方法
        $this->request->setMethod('GET');

        //获取返回值
        $this->response();
    }

}

