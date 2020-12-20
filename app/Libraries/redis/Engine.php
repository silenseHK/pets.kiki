<?php
/**
 * Created by PhpStorm.
 * User: 27989
 * Date: 2020/11/25
 * Time: 22:51
 */

namespace App\Libraries\redis;


use Predis\Client;

class Engine
{

    protected $config = [
        'scheme' => 'tcp',
        'host' => '127.0.0.1',
        'port' => 6379,
        'pwd' => 'wangjiweilai666'
    ];

    protected $redis;

    /**
     * Engine constructor.
     * @param int $db
     */
    public function __construct($db=0)
    {
        $this->redis = new Client([
            'scheme' => $this->config['scheme'],
            'host'   => $this->config['host'],
            'port'   => $this->config['port']
        ]);
        $this->redis->auth($this->config['pwd']);
        $this->redis->select($db);
    }

    /**
     * @return Client
     */
    public function render(){
        return $this->redis;
    }

}