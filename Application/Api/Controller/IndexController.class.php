<?php

namespace Api\Controller;

use Think\Controller;

class IndexController extends Controller {
        


        protected function _initialize(){
            
        }

        public function menu() {
                $data = '{
                                "button": [
                                    {
                                        "type": "view", 
                                        "name": "马上开启", 
                                        "url": "http://wx.xigounet.com/"
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
                                        "url": "http://wx.xigounet.com/"
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
                                        "url": "http://wx.xigounet.com/"
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
