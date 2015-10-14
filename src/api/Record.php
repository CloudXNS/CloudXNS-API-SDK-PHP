<?php

/**
 * 解析记录的接口逻辑处理
 * 
 * @author CLoudXNS <support@cloudxns.net>
 * @link https://www.cloudxns.net/
 * @copyright Copyright (c) 2015 Cloudxns.
 */

namespace CloudXNS;

use CloudXNS\Api;

final class Record extends Api {
    
    public function __construct() {
        $this->setApiType("Record");
    }
    
    //解析记录列表
    public function recordList($urlExtend = '') {
        //设置URL扩展
        $this->setUrlExtend($urlExtend);
        
        //初始化参数
        $this->initParam();

        //设置请求的方法
        $this->request->setMethod('GET');

        //获取返回值
        $this->response();
    }

    //新增解析记录
    public function recordAdd($arr = array()) {
        //设置参数体
        $this->setData(json_encode($arr));
        
        //初始化参数
        $this->initParam();

        //设置请求的方法
        $this->request->setMethod('POST');

        //设置参数体 
        $this->request->setBody($this->data);

        //获取返回值
        $this->response();
    }

    //新增备记录
    public function spareAdd($arr = array()) {
        //设置参数体
        $this->setData(json_encode($arr));
        
        //初始化参数
        $this->initParam();

        //设置请求的方法
        $this->request->setMethod('POST');

        //设置参数体 
        $this->request->setBody($this->data);

        //获取返回值
        $this->response();
    }

    //更新解析记录
    public function recordUpdate($arr = array(), $urlExtend = '') {
        //设置参数体
        $this->setData(json_encode($arr));
        
        //设置URL扩展
        $this->setUrlExtend($urlExtend);
        
        //初始化参数
        $this->initParam();

        //设置请求的方法
        $this->request->setMethod('PUT');

        //设置参数体 
        $this->request->setBody($this->data);

        //获取返回值
        $this->response();
    }

    //删除解析记录
    public function recordDelete($urlExtend = '') {
        //设置URL扩展
        $this->setUrlExtend($urlExtend);
        
        //初始化参数
        $this->initParam();

        //设置请求的方法
        $this->request->setMethod('DELETE');

        //获取返回值
        $this->response();
    }

    //批量删除解析记录
    public function recordDelAll($urlExtend = '') {
        //设置URL扩展
        $this->setUrlExtend($urlExtend);
        
        //初始化参数
        $this->initParam();
        //设置请求的方法
        $this->request->setMethod('DELETE');

        //获取返回值
        $this->response();
    }

}
