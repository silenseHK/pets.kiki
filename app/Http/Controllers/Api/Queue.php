<?php
/**
 * Created by PhpStorm.
 * User: 27989
 * Date: 2020/11/26
 * Time: 10:46
 */

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use App\Jobs\Queue as JobsQueue;

class Queue extends Controller
{

    public function index(){
        Log::info('Start: ' . date('Y-m-d H:i:s', time()));
        $arr = [
            'time' => time(),
            'id' => rand(100,999)
        ];
        sleep(2);
        $this->dispatch(new JobsQueue($arr));
        Log::info('End: ' . date('Y-m-d H:i:s', time()));
        return 'success';
    }

}