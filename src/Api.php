<?php

/**
 * 配置文件
 *
 * @author CLoudXNS <support@cloudxns.net>
 * @link https://www.cloudxns.net/
 * @copyright Copyright (c) 2015 Cloudxns.
 */

namespace CloudXNS;

/**
 * 请用Composer安装依赖包，并在根目录下执行:
 * php composer.phar require "hightman/httpclient:*"命令。
 * 参考地址：https://github.com/hightman/httpclient
 */
require_once '../vendor/autoload.php';

use hightman\http\Client;
use hightman\http\Request;
use hightman\http\Response;
use CloudXNS\CloudXNSException;

class Api {
    protected $apiKey = '';
    protected $secretKey = '';
    protected $protocol = '';
    protected $url = '';
    protected $urlExtend = '';
    protected $data = '';
    protected $date = '';
    protected $hash = '';
    protected $host = 'www.cloudxns.net/api2';
    protected $client;
    protected $request;
    protected $apiType;
    protected $flag;
    
    public function __get($property){
        $this->module = ucfirst($property);

        require_once "api/{$this->module}.php";
        $className = "\\CloudXNS\\{$this->module}";

        //实例化类
        $domain = new $className();
        
        $domain->setApiKey($this->apiKey);
        $domain->setSecretKey($this->secretKey);
        $domain->setProtocol($this->flag);
        $domain->setUrlExtend($this->urlExtend);
        $domain->setData($this->data);
        return $domain;
    }
    /**
     * 构造函数
     * 
     * @param string $type //接口的类型
     * @param string $data //参数体
     * @param string $url_extend url的扩展
     * @param string $http 协议类型，默认为https
     */
    public function initParam() {
        $this->url = $this->urlParam($this->apiType) . $this->urlExtend;
        $this->date = date('r', time());
        //计算hash值
        $this->hash = $this->doHash($this->apiKey, $this->url, $this->data, $this->date, $this->secretKey);
        $this->client = new Client();

        $this->request = new Request($this->url);

        //设置参数的头部
        $this->setHeader();
    }

    /**
     * 根据不同的类型,返回不同的URL
     * 
     * @param string $type
     * @return string
     */
    public function urlParam() {
        $a_url = array(
            'Domain' => $this->protocol . '://' . $this->host . '/domain', //域名
            'RecordType' => $this->protocol . '://' . $this->host . '/type', //记录类型
            'Line' => $this->protocol . '://' . $this->host . '/line', //线路
            'Host' => $this->protocol . '://' . $this->host . '/host', //主机记录
            'Record' => $this->protocol . '://' . $this->host . '/record', //解析记录
            'Statistics' => $this->protocol . '://' . $this->host . '/domain_stat', //解析量统计
            'Ns' => $this->protocol . '://' . $this->host . '/ns_server'          //NS服务器
        );
        $type = $this->apiType;

        return $a_url[$type];
    }

    /**
     * hash值的计算规则
     * 
     * @param string $apiKey
     * @param string $url
     * @param string $data
     * @param string $date
     * @param string $secretKey
     * @return string
     */
    public function doHash($apiKey = '', $url = '', $data = '', $date = '', $secretKey = '') {
        return md5($apiKey . $url . $data . $date . $secretKey);
    }

    /**
     * 设置请求的header
     */
    public function setHeader() {
        //设置请求的头部
        $this->request->setHeader('API-KEY', $this->apiKey);
        $this->request->setHeader('API-REQUEST-DATE', $this->date);
        $this->request->setHeader('API-HMAC', $this->hash);
        $this->request->setHeader('API-FORMAT', 'json');
    }

    /**
     * 将返回的结果，输出呈现
     */
    public function response() {
        $response = $this->client->exec($this->request);

        if ($response->hasError()) {
            require_once "api/CloudXNSException.php";
            throw new CloudXNSException("response.error: {$response->error} {PHP_EOL}");

        } else {
            echo $response->body . '<br/>';
        }
    }

    /**
     * 设置apiKey
     * 
     * @param string $apiKey
     */
    public function setApiKey($apiKey) {
        $this->apiKey = $apiKey;
    }

    /**
     * 获取apiKey
     * 
     * @return string
     */
    public function getApiKey() {
        return $this->apiKey;
    }

    /**
     * 设置secretKey
     * 
     * @param string $secretKey
     */
    public function setSecretKey($secretKey) {
        $this->secretKey = $secretKey;
    }

    /**
     * 获取SecretKey
     * 
     * @return string
     */
    public function getSecretKey() {
        return $this->secretKey;
    }

    /**
     * 设置protocol
     * 
     * @param string $protocol
     */
    public function setProtocol($flag = true) {
        $this->flag = $flag;
        if($flag){
            $this->protocol = 'https';
        }else{
            $this->protocol = 'http';
        }
    }

    /**
     * 获取protocol
     * 
     * @return string
     */
    public function getProtocol() {
        return $this->protocol;
    }

    /**
     * 设置data
     * 
     * @param string $data
     */
    public function setData($data) {
        $this->data = $data;
    }

    /**
     * 获取data
     * 
     * @return string
     */
    public function getData() {
        return $this->data;
    }

    /**
     * 设置apiType
     * 
     * @param string $apiType
     */
    public function setApiType($apiType) {
        $this->apiType = ucfirst($apiType);
    }

    /**
     * 获取apiType
     * 
     * @return string
     */
    public function getApiType() {
        return $this->apiType;
    }

    /**
     * 设置urlExtend
     * 
     * @param string $urlExtend
     */
    public function setUrlExtend($urlExtend) {
        $this->urlExtend = $urlExtend;
    }

    /**
     * 获取urlExtend
     * 
     * @return string
     */
    public function getUrlExtend() {
        return $this->urlExtend;
    }

    /**
     * 设置请求的类文件
     * 
     * @param string $module
     */
    public function setModule($module) {
        
    }

    /**
     * 返回请求的类文件
     * 
     * @return string
     */
    public function getModule() {
        return $this->module;
    }

}
