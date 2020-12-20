<?php
/**
 * Created by PhpStorm.
 * User: 27989
 * Date: 2020/11/28
 * Time: 18:28
 */

namespace App\Http\Models\Common;


class UserModel extends BaseModel
{

    protected $primaryKey = 'user_id';

    protected $table = 'user';

    protected $guarded = [];

}