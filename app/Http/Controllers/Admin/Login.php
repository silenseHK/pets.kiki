<?php


namespace App\Http\Controllers\Admin;


use App\Http\Repository\Admin\LoginRepo;

class Login extends Base
{

    public function index(){
        return view('admin.login.login');
    }

    public function login(){
        try{
            $repo = new LoginRepo();
            if(!$repo->login()){
                return returnError(101,$repo->getError());
            }
            return returnSuccess();
        }catch(\Exception $e){
            return returnError(100,$e->getMessage());
        }
    }

    public function logout(){
        try{
            session()->forget('admin_info');
            return returnSuccess('','退出登陆成功');
        }catch(\Exception $e){
            return returnError(100,$e->getMessage());
        }
    }

}
