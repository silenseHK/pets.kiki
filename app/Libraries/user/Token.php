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

    protected $error = '';

    /**
     * @var string
     */
    protected $token = '';

    protected $salt = 'pets';

    protected $expire = 7 * 24 * 60 * 60;  //7天有效期

    public function getError(){
        return $this->error;
    }

    protected function setError($error){
        $this->error = $error;
        return false;
    }

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

    /**
     * 检查用户登录
     * @param bool $isForce
     * @return bool|null|string
     */
    public function getUser($isForce=true){
        $token = str_filter(request('token',''));
        if(!$token)
            return $this->setError("未传入参数token");
        $redis = (new Engine())->render();
        $user = $redis->get($token);
        if(!$user && $isForce)
            return $this->setError("请重新登录");
        return $user?json_decode($user, true):$user;
    }

}