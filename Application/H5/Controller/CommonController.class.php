<?php

namespace H5\Controller;

use Think\Controller;

class CommonController extends Controller {

    protected function _initialize() {
        if (method_exists($this, '_init')) {
            $this->_init();
        }
        if (!session("user_id")) {
            $this->get_auth();
        }
    }
    
    //重定向到微信授权
    private function get_auth() {
        //当前url
        $the_url = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : ''; //判断地址后面部分
        $the_url = urlencode($the_url);
        
        $r_url = 'http://wx.xigounet.com/Auth/redirect';
        
        $url = 'https://open.weixin.qq.com/connect/oauth2/authorize?'
                . 'appid='.C("appID").'&redirect_uri='.$r_url.'&response_type=code&scope=snsapi_userinfo&state='.$the_url.'#wechat_redirect';
        header('HTTP/1.1 301 Moved Permanently'); //发出301头部 
        header('Location:' . $url);
        exit;
    }

    

}
