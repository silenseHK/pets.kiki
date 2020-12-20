<?php
/**
 * Created by PhpStorm.
 * User: 27989
 * Date: 2020/11/26
 * Time: 10:30
 */

namespace App\Libraries\rabbit;


class Consumer extends BaseRabbit
{

    public function __construct($exchange_name, $queue_name, $routing_key)
    {
        parent::__construct($exchange_name, $queue_name, $routing_key);
    }

}