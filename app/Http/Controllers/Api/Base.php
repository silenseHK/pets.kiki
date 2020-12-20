<?php
/**
 * Created by PhpStorm.
 * User: 27989
 * Date: 2020/11/29
 * Time: 11:10
 */

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Libraries\user\Token;

class Base extends Controller
{

    public function getUser($isForce=true){
        $tokenEngine = new Token();
        return $tokenEngine->getUser($isForce);
    }

}