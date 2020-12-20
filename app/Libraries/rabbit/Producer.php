<?php
/**
 * Created by PhpStorm.
 * User: 27989
 * Date: 2020/11/25
 * Time: 20:53
 */

namespace App\Libraries\rabbit;



use PhpAmqpLib\Message\AMQPMessage;

class Producer extends BaseRabbit
{

    protected $message;

    public function __construct($exchange_name, $queue_name, $routing_key)
    {
        parent::__construct($exchange_name, $queue_name, $routing_key);
        $this->ackHandle();
    }

    protected function ackHandle(){
        $this->chan->set_ack_handler(function(AMQPMessage $message){
            echo "Message acked with content " . $message->body . PHP_EOL;
        });

        $this->chan->set_nack_handler(function(AMQPMessage $message){
            echo "Message nacked with content " . $message->body . PHP_EOL;
        });
    }

    public function publish($data){
        $this->message = new AMQPMessage(json_encode($data), ['delivery_mode'=>AMQPMessage::DELIVERY_MODE_NON_PERSISTENT]);
        $this->chan->basic_publish($this->message, $this->exchange_name, $this->routing_key);
    }

}