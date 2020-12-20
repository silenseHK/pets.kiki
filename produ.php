<?php
/**
 * Created by PhpStorm.
 * User: 27989
 * Date: 2020/11/25
 * Time: 15:00
 */

    $config = [
        'host' => '127.0.0.1',
        'vhost' => '/',
        'post' => 5672,
        'login' => 'guest',
        'password' => 'guest'
    ];

    $conn = new AMQPConnection($config);

    if(!$conn->connect()){
        echo "连接失败";
        exit();
    }

    $ch = new AMQPChannel($conn);

    $ex = new AMQPExchange($ch);

    $routing_key = "key_1";

    $exchange_name = "exchange_1";

    $ex->setName($exchange_name);

    $ex->setType(AMQP_EX_TYPE_DIRECT);

    $ex->setFlags(AMQP_DURABLE);

    $ex->declareExchange();

    $q = new AMQPQueue($ch);

    $q->setName("queue_hk");

    $q->bind($ex->getName(),$routing_key);

    function receive($envelope, $queue){
        echo $envelope->getBody()."\n";
    }

    $q->consume("receive");