<?php
/**
 * Created by PhpStorm.
 * User: 27989
 * Date: 2020/11/28
 * Time: 18:06
 */

namespace App\Libraries\user;


use App\Libraries\redis\Engine;

class Token
{

    protected $openid = '';

    /**
     * @var string
     */
    protected $token = '';

    protected $salt = 'pets';

    protected $expire = 7 * 24 * 60 * 60;  //7天有效期

    /**
     * 设置token
     * @param $openId
     * @param $userInfo
     * @return string
     */
    public function setToken($openid, $userInfo){
        $this->openid = $openid;
        $redis = (new Engine())->render();
        $this->makeToken();
        $redis->setex($this->token, $this->expire, $userInfo);
        return $this->token;
    }

    /**
     * 生成token
     */
    protected function makeToken(){
        $this->token = sha1(md5($this->openid . $this->salt) . $this->salt);
    }

}