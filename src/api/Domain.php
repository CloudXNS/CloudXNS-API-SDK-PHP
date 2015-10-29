<?php

/**
 * 域名的接口逻辑处理
 * 
 * @author CLoudXNS <support@cloudxns.net>
 * @link https://www.cloudxns.net/
 * @copyright Copyright (c) 2015 Cloudxns.
 */

namespace CloudXNS;

use CloudXNS\Api;

final class Domain extends Api {

    public function __construct() {
        $this->setApiType("Domain");
    }

    /**
     * 域名列表 
     * 
     * @return string
     */
    public function domainList() {
        //初始化参数
        $this->initParam();

        //设置请求的方法
        $this->request->setMethod('GET');

        //获取返回值
        return $this->response();
    }

    /**
     * 域名的添加
     * 
     * @param string $domain 域名的名称
     * @return string
     */
    public function domainAdd($domain = '') {
        $arr = array("domain" => $domain);
        //设置参数体
        $this->setData(json_encode($arr));

        //初始化参数
        $this->initParam();

        //设置请求的方法
        $this->request->setMethod('POST');

        //设置参数体
        $this->request->setBody($this->data);

        //获取返回值
        return $this->response();
    }

    /**
     * 域名的删除
     * 
     * @param integer $id 域名ID
     * @return string
     */
    public function domainDelete($id = 0) {
        //设置URL扩展
        $this->setUrlExtend("/$id");

        //初始化参数
        $this->initParam();

        //设置请求的方法
        $this->request->setMethod('DELETE');

        //获取返回值
        return $this->response();
    }

}
