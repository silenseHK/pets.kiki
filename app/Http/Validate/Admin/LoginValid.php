<?php


namespace App\Http\Validate\Admin;


use App\Http\Validate\BaseValid;

class LoginValid extends BaseValid
{

    protected $rule = [
        'account' => 'required|min:5',
        'password' => 'required|min:6|max:30',
        'verify' => 'required|captcha'
    ];

    protected $scene = [
        'login' => ['account', 'password', 'verify']
    ];

}
