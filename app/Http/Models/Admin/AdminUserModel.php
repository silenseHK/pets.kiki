<?php


namespace App\Http\Models\Admin;

use App\Http\Models\Common\AdminUserModel as AdminUserModelCommon;

/**
 * App\Http\Models\Admin\AdminUserModel
 *
 * @property int $admin_user_id 主键id
 * @property string $user_name 用户名
 * @property string $password 登录密码
 * @property int $create_time 创建时间
 * @property int $update_time 更新时间
 * @method static \Illuminate\Database\Eloquent\Builder|AdminUserModel newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AdminUserModel newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AdminUserModel query()
 * @method static \Illuminate\Database\Eloquent\Builder|AdminUserModel whereAdminUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminUserModel whereCreateTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminUserModel wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminUserModel whereUpdateTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminUserModel whereUserName($value)
 * @mixin \Eloquent
 */
class AdminUserModel extends AdminUserModelCommon
{


}
