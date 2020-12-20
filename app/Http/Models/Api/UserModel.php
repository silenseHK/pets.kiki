<?php
/**
 * Created by PhpStorm.
 * User: 27989
 * Date: 2020/11/28
 * Time: 18:29
 */

namespace App\Http\Models\Api;

use App\Http\Models\Common\UserModel as UserModelCommon;

/**
 * App\Http\Models\Api\UserModel
 *
 * @property int $user_id
 * @property string $nickName 昵称
 * @property string $avatarUrl 头像
 * @property string $openid openid
 * @property string $province 省
 * @property string $city 市
 * @property int $gender 性别 1男 2女 0未知
 * @property \Illuminate\Support\Carbon $created_at 创建时间
 * @property \Illuminate\Support\Carbon $updated_at 更新时间
 * @property int $status 状态 1正常 2冻结
 * @property string $mobile 手机号
 * @method static \Illuminate\Database\Eloquent\Builder|UserModel newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserModel newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserModel query()
 * @method static \Illuminate\Database\Eloquent\Builder|UserModel whereAvatarUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserModel whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserModel whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserModel whereGender($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserModel whereMobile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserModel whereNickName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserModel whereOpenid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserModel whereProvince($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserModel whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserModel whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserModel whereUserId($value)
 * @mixin \Eloquent
 */
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