<?php

require_once __DIR__.'/vendor/autoload.php';

use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;
use PhpAmqpLib\Exchange\AMQPExchangeType;

##连接
$conn = new AMQPStreamConnection('127.0.0.1','5672','guest','guest');

##创建通道
$channel = $conn->channel();

$exchangeName = 'exchange_1';

##创建交换机
/**
 * exchange 交换机名
 * type 交换机类型
 * passive 如果设置true则存在返回OK,否则就报错;设置false存在返回OK,不存在则自动创建
 * durable true是持久化 设置false是存放在内存中,rabbitMQ重启后会丢失
 * auto_delete 是否自动删除,当最后一个消费者断开连接之后队列是否自动被删除
 */
$channel->exchange_declare($exchangeName,AMQPExchangeType::DIRECT,false,true,false);

$queueName = 'queue_1';

/**
 * queue 队列名
 * passive 如果设置true则存在返回OK,否则就报错;设置false存在返回OK,不存在则自动创建
 * durable true是持久化 设置false是存放在内存中,rabbitMQ重启后会丢失
 * exclusive 是否排他,指定该选项为true,则队列支队当前连接有效,连接断开后自动删除
 * auto_delete 是否自动删除,当最后一个消费者断开连接之后队列是否自动被删除
 */
##创建队列
$channel->queue_declare($queueName,false,true,false,false);

##路由键
$routingKey = 'routing_key_1';

##绑定交换机和队列
$channel->queue_bind($queueName, $exchangeName, $routingKey);

##推送成功
$channel->set_ack_handler(function(AMQPMessage $message){
    echo "Message acked with content " . $message->body . PHP_EOL;
});

##推送失败
$channel->set_nack_handler(function(AMQPMessage $message){
    echo "Message nacked with content " . $message->body . PHP_EOL;
});

print_r($argv);

##创建信息
$data = [
    'msg_id' => uniqid(),
    'create_time' => time(),
    'notify_url' => '127.0.0.1/shop/notify',
    'num' => $argv[1]
];
$message = new AMQPMessage(json_encode($data), ['delivery_mode'=>AMQPMessage::DELIVERY_MODE_NON_PERSISTENT]);

##发布消息
$channel->basic_publish($message, $exchangeName, $routingKey);