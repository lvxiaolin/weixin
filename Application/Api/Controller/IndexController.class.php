<?php

namespace Api\Controller;

use Think\Controller;

class IndexController extends Controller {
        
        //授权地址
        private $url;


        protected function _initialize(){
                $r_url = urlencode('http://wx.xigounet.com/');
                $this->url = 'https://open.weixin.qq.com/connect/oauth2/authorize?appid='.C("appID").'&redirect_uri='.$r_url.'&response_type=code&scope=snsapi_userinfo&state=STATE#wechat_redirect';
        }

        public function menu() {
                $data = '{
                                "button": [
                                    {
                                        "type": "view", 
                                        "name": "马上开启", 
                                        "url": "'.$this->url.'"
                                    }, 
                                    {
                                        "name": "菜单", 
                                        "sub_button": [
                                            {
                                                "type": "view", 
                                                "name": "搜索", 
                                                "url": "http://www.soso.com/"
                                            }, 
                                            {
                                                "type": "view", 
                                                "name": "视频", 
                                                "url": "http://v.qq.com/"
                                            }, 
                                            {
                                                "type": "click", 
                                                "name": "赞一下我们", 
                                                "key": "V1001_GOOD"
                                            }
                                        ]
                                    }
                                ]
                            }';
                echo postHTTPS("https://api.weixin.qq.com/cgi-bin/menu/create?access_token=".access_token(),$data);
        }
        public function menu_boy() {
                $data = '{
                                "button": [
                                    {
                                        "type": "view", 
                                        "name": "寻找MM", 
                                        "url": "'.$this->url.'"
                                    }, 
                                    {
                                        "name": "菜单", 
                                        "sub_button": [
                                            {
                                                "type": "view", 
                                                "name": "搜索", 
                                                "url": "http://www.soso.com/"
                                            }, 
                                            {
                                                "type": "view", 
                                                "name": "视频", 
                                                "url": "http://v.qq.com/"
                                            }, 
                                            {
                                                "type": "click", 
                                                "name": "赞一下我们", 
                                                "key": "V1001_GOOD"
                                            }
                                        ]
                                    }
                                ],
                                "matchrule":{
                                        "sex":"1",
                                        }
                            }';
                echo postHTTPS("https://api.weixin.qq.com/cgi-bin/menu/addconditional?access_token=".access_token(),$data);
        }
        
        public function menu_girl() {
                $data = '{
                                "button": [
                                    {
                                        "type": "view", 
                                        "name": "寻找GG", 
                                        "url": "'.$this->url.'"
                                    }, 
                                    {
                                        "name": "菜单", 
                                        "sub_button": [
                                            {
                                                "type": "view", 
                                                "name": "搜索", 
                                                "url": "http://www.soso.com/"
                                            }, 
                                            {
                                                "type": "view", 
                                                "name": "视频", 
                                                "url": "http://v.qq.com/"
                                            }, 
                                            {
                                                "type": "click", 
                                                "name": "赞一下我们", 
                                                "key": "V1001_GOOD"
                                            }
                                        ]
                                    }
                                ],
                                "matchrule":{
                                        "sex":"2",
                                        }
                            }';
                echo postHTTPS("https://api.weixin.qq.com/cgi-bin/menu/addconditional?access_token=".access_token(),$data);
        }

}
