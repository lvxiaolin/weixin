<?php

/*
 * 验证来源
 */

function checkSignature() {
        $signature = $_GET["signature"];
        $timestamp = $_GET["timestamp"];
        $nonce = $_GET["nonce"];

        $token = '123';
        $tmpArr = array($token, $timestamp, $nonce);
        sort($tmpArr, SORT_STRING);
        $tmpStr = implode($tmpArr);
        $tmpStr = sha1($tmpStr);

        if ($tmpStr == $signature) {
                return true;
        } else {
                return false;
        }
}

/*
 * https get调用
 */
function getHTTPS($url) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_REFERER, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        $result = curl_exec($ch);
        curl_close($ch);
        return $result;
}

/*
 * https post调用
 */
function postHTTPS($url, $data = "") {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_REFERER, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        
        curl_setopt ( $ch, CURLOPT_POST, 1 );
        curl_setopt ( $ch, CURLOPT_POSTFIELDS, $data ); 
        
        $result = curl_exec($ch);
        curl_close($ch);
        return $result;
}

/*
 * 获取access token
 */

function access_token() {
        if (!S("access_token")) {
                $url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=" . C("appID") . "&secret=" . C("appsecret");
                $data = getHTTPS($url);
                $data = json_decode($data, true);
                S("access_token", $data['access_token'], $data['expires_in'] - 10);
                return $data['access_token'];
        } else {
                return S("access_token");
        }
}
