<?php


namespace App\Http\Repository\Admin;


use App\Http\Models\Admin\AdminUserModel;
use App\Http\Repository\BaseRepo;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class LoginRepo extends BaseRepo
{

    public function login(){
        $validator = Validator::make(request()->input(),[
            'account' => 'required|min:5',
            'password' => 'required|min:6',
            'verify' => 'required|captcha'
        ]);
        if($validator->fails()){
            return $this->setError($validator->errors()->first());
        }
        ##参数
        $account = str_filter(request()->input('account',''));
        $password = str_filter(request()->input('password',''));
        ##判断登录
        $admin = AdminUserModel::where(['user_name'=>$account])->first();
        if(!$admin)
            return $this->setError('账号或密码错误');
        if(!Hash::check($password, $admin['password']))
            return $this->setError('账号或密码错误2');
        ##设置session
        session(['admin_info'=>$admin]);
        return true;
    }

}
