<?php
/**
 * Created by PhpStorm.
 * User: 27989
 * Date: 2020/11/27
 * Time: 10:03
 */

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;

class Test extends Controller
{

    public function index(){
        Log::info("Time: " . time());
    }

}