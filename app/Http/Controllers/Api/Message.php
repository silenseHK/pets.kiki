<?php
/**
 * Created by PhpStorm.
 * User: 27989
 * Date: 2020/11/25
 * Time: 21:02
 */

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Libraries\rabbit\Producer;
use App\Libraries\redis\Engine;

class Message extends Controller
{

    public function test(){
        $producer = new Producer("exchange_2","queue_2","routing_key_2");
        $producer->publish(["name"=>"胡宽", "age"=>20]);
    }

    public function redis(){
        $conn = new Engine(1);
        $redis = $conn->render();
        $redis->setex("age",10,29);
    }

}