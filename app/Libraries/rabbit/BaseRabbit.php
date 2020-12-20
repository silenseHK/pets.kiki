<?php
/**
 * Created by PhpStorm.
 * User: 27989
 * Date: 2020/11/25
 * Time: 20:53
 */

namespace App\Libraries\rabbit;

require_once __ROOT__.'/vendor/autoload.php';

use PhpAmqpLib\Channel\AMQPChannel;
use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Exchange\AMQPExchangeType;


class BaseRabbit
{

    protected $config = [
        'host' => '127.0.0.1',
        'port' => 5672,
        'user' => 'guest',
        'password' => 'guest'
    ];

    /**
     * @var AMQPStreamConnection
     */
    protected $conn;  //连接

    /**
     * @var AMQPChannel
     */
    protected $chan;  //通道

    protected $exchange_name;

    protected $queue_name;

    protected $routing_key;

    public function __construct($exchange_name, $queue_name, $routing_key)
    {
        $this->exchange_name = $exchange_name;
        $this->queue_name = $queue_name;
        $this->routing_key = $routing_key;

        $this->render();
    }

    public function producer(){

    }

    protected function render(){
##连接
        $this->conn = new AMQPStreamConnection($this->config['host'], $this->config['port'], $this->config['user'], $this->config['password']);
        ##创建通道
        $this->channel();
        ##声明交换机
        $this->exchangeDeclare();
        ##声明队列
        $this->queueDeclare();
        ##通道绑定队列
        $this->channelBindQueue();
        ##设置ack
        $this->ackHandle();
    }

    protected function channel(){
        $this->chan = $this->conn->channel();
    }

    /**
     * exchange 交换机名
     * type 交换机类型
     * passive 如果设置true则存在返回OK,否则就报错;设置false存在返回OK,不存在则自动创建
     * durable true是持久化 设置false是存放在内存中,rabbitMQ重启后会丢失
     * auto_delete 是否自动删除,当最后一个消费者断开连接之后队列是否自动被删除
     */
    protected function exchangeDeclare(){
        $this->chan->exchange_declare($this->exchange_name, AMQPExchangeType::DIRECT, false, true, false);
    }

    /**
     * queue 队列名
     * passive 如果设置true则存在返回OK,否则就报错;设置false存在返回OK,不存在则自动创建
     * durable true是持久化 设置false是存放在内存中,rabbitMQ重启后会丢失
     * exclusive 是否排他,指定该选项为true,则队列支队当前连接有效,连接断开后自动删除
     * auto_delete 是否自动删除,当最后一个消费者断开连接之后队列是否自动被删除
     */
    protected function queueDeclare(){
        $this->chan->queue_declare($this->queue_name, false, true, false, false);
    }

    protected function channelBindQueue(){
        $this->chan->queue_bind($this->queue_name, $this->exchange_name, $this->routing_key);
    }


}