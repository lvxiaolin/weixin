<?php

namespace H5\Controller;

use Think\Controller;

class AuthController extends Controller {


    public function redirect() {
        //print_r(I("get."));
        //获取openid access_token
        $data = getHTTPS("https://api.weixin.qq.com/sns/oauth2/access_token?appid=" . C("appID") . "&secret=" . C("appsecret") . "&code=" . I("code") . "&grant_type=authorization_code");
        $data = json_decode($data, true);
        //print_r($data);
        if(!$data['access_token'])
            die($data);
        //如果没有存过用户信息
        if (!$user_info) {
            //获取用户微信资料
            $user_info = getHTTPS("https://api.weixin.qq.com/sns/userinfo?access_token=" . $data['access_token'] . "&openid=" . $data['openid'] . "&lang=zh_CN");
        }
        $user_info = json_decode($user_info, TRUE);
        
        session('nickname',$user_info['nickname']);
        session('openid',$user_info['openid']);
        
        $state = I("get.state");
        $state = urldecode($state);
        $url = 'http://wx.xigounet.com/'.$state;
        header('HTTP/1.1 301 Moved Permanently'); //发出301头部 
        header('Location:' . $url);
    }

}
