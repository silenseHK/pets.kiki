<?php


namespace App\Http\Validate;


use Illuminate\Support\Facades\Validator;

class BaseValid extends Validator
{

    protected $rules = [];

    protected $scene = [];

    protected $error = '';

    public function check($scene){
        $rule = $this->makeRule($scene);
        if(!$rule)return false;
        $validator = Validator::make(request()->post(), $rule);
        if($validator->fails()){
            $this->error = $validator->errors()->first();
            return false;
        }
        return true;
    }

    protected function makeRule($scene){
        if(!$scene){
            return $this->setError('验证规则错误');
        }
        if(!isset($this->scene[$scene])){
            return $this->setError('scene 不存在');
        }
        $ruleNames = $this->scene[$scene];
        if(empty($ruleNames)){
            return $this->setError('scene 为空');
        }
        foreach($ruleNames as $name){
            if(!isset($this->rules[$name])){
                return $this->setError('验证规则错误');
            }
            $rule[$name] = $this->rules[$name];
        }
        return $rule;
    }

    protected function setError($error){
        $this->error = $error;
        return false;
    }

    public function getError(){
        return $this->error;
    }

}
