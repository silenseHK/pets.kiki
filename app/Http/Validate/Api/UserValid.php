<?php
/**
 * Created by PhpStorm.
 * User: 27989
 * Date: 2020/11/28
 * Time: 15:32
 */

namespace App\Http\Validate\Api;


use App\Http\Validate\BaseValid;
use Illuminate\Support\Facades\Validator;

class UserValid extends BaseValid
{

    protected $rules = [
        'code' => 'required',
        'userInfo' => 'required'
    ];


    protected $scene = [
        'login' => ['code', 'userInfo']
    ];

}