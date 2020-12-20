<?php
/**
 * Created by PhpStorm.
 * User: 27989
 * Date: 2020/11/28
 * Time: 16:21
 */

namespace App\Libraries\wx;


class WxApp
{

    protected $error = '';

    protected function setError($error){
        $this->error = $error;
        return false;
    }

    public function getError(){
        return $this->error;
    }

    protected $config = [
        'appId' => 'wx8e21f2aa15d71e55',
        'appSecret' => '62d1eb6a3ae41c1db7803e2ceaadb4fb'
    ];

    /**
     * 获取openid
     * @param $code
     * @return bool|mixed
     */
    public function code2Session($code){
        $url = "https://api.weixin.qq.com/sns/jscode2session?appid={$this->config['appId']}&secret={$this->config['appSecret']}&js_code={$code}&grant_type=authorization_code";
        $result = curlGet($url);
        if(!$result)
            return $this->setError("openid获取失败");
        $session = json_decode($result,true);
        if(!isset($session['openid']))
            return $this->setError($session['errmsg']);
        return $session;
    }

}