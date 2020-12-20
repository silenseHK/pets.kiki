<?php
/**
 * Created by PhpStorm.
 * User: 27989
 * Date: 2020/11/28
 * Time: 18:28
 */

namespace App\Http\Models\Common;


/**
 * App\Http\Models\Common\UserModel
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
class UserModel extends BaseModel
{

    protected $primaryKey = 'user_id';

    protected $table = 'user';

    protected $guarded = [];

}