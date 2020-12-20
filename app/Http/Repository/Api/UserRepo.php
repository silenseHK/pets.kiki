<?php
/**
 * Created by PhpStorm.
 * User: 27989
 * Date: 2020/11/28
 * Time: 15:28
 */

namespace App\Http\Repository\Api;


use App\Http\Repository\BaseRepo;
use App\Http\Validate\Api\UserValid;
use App\Libraries\user\Token;
use App\Libraries\wx\WxApp;
use App\Http\Models\Api\UserModel;
use function Sodium\compare;

class UserRepo extends BaseRepo
{

    /**
     * @var UserValid
     */
    protected $valid;

    public function __construct(UserValid $userValid)
    {
        $this->valid = $userValid;
    }

    public function login(){
        ##验证
        if(!$this->valid->check('login')){
            return $this->setError($this->valid->getError());
        }
        ##获取参数
        $code = str_filter(request()->post('code'));
        ##获取openId
        $wxApp = new WxApp();
        $session = $wxApp->code2Session($code);
        if(!$session)
            return $this->setError($wxApp->getError());
//        print_r($session);die;
        $openid = $session['openid'];
        ##判断用户是否已登录
        $model = new UserModel();
        $user = $model->getUserByOpenid($openid);
        if(!$user){ ##注册
            $userInfo = request()->post('userInfo');

            if(!$model->register($openid, $userInfo)){
                return $this->setError('用户注册失败');
            }
            $user = $model->getUserByOpenid($openid);
        }
        ##更新token
        $token = $this->setToken($openid, $user);
        return compact('token','user');
    }

    protected function setToken($openid, $userInfo){
        $tokenServer = new Token();
        $token = $tokenServer->setToken($openid, $userInfo);
        return $token;
    }

}