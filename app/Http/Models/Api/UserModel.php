<?php
/**
 * Created by PhpStorm.
 * User: 27989
 * Date: 2020/11/28
 * Time: 18:29
 */

namespace App\Http\Models\Api;

use App\Http\Models\Common\UserModel as UserModelCommon;

class UserModel extends UserModelCommon
{

    public function register($openid, $userInfo){
        $data = [
            'openid' => $openid,
            'nickname' => str_filter($userInfo['nickName']),
            'avatarUrl' => str_filter($userInfo['avatarUrl']),
            'province' => str_filter($userInfo['province']),
            'city' => str_filter($userInfo['city']),
            'gender' => intval($userInfo['gender']),
        ];
        return $this->create($data);
    }

    /**
     * 通过openid获取user
     * @param $openid
     * @return mixed
     */
    public function getUserByOpenid($openid){
        return $this->where(['openid'=>$openid])->first();
    }

}