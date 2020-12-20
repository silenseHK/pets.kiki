<?php

function str_filter($str){
    return addslashes(strip_tags(trim($str)));
}

function returnSuccess($data=[], $msg='', $url=''){
    $code = 200;
    return response()->json(compact('code','data','msg','url'));
}

function returnError($code=100, $msg='', $url='', $data=[]){
    return response()->json(compact('code','msg','url','data'));
}

function returnFail(Exception $e){
    \Illuminate\Support\Facades\Log::error("系统内部错误",[
        'file' => $e->getFile(),
        'line' => $e->getLine(),
        'err'  => $e->getMessage()
    ]);
    return request()->json(['code'=>0, 'msg'=>'系统内部错误']);
}

function curlPost($url, $data=[]){
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL, $url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_TIMEOUT, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    $res =curl_exec($ch);
    curl_close($ch);
    return $res;
}

function curlGet($url){
    $header = array(
        'Accept: application/json',
    );
    $curl = curl_init();
    //设置抓取的url
    curl_setopt($curl, CURLOPT_URL, $url);
    //设置头文件的信息作为数据流输出
    curl_setopt($curl, CURLOPT_HEADER, 0);
    // 超时设置,以秒为单位
    curl_setopt($curl, CURLOPT_TIMEOUT, 1);

    // 超时设置，以毫秒为单位
    // curl_setopt($curl, CURLOPT_TIMEOUT_MS, 500);

    // 设置请求头
    curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
    //设置获取的信息以文件流的形式返回，而不是直接输出。
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
    //执行命令
    $data = curl_exec($curl);

    // 显示错误信息
    if (curl_error($curl)) {
        return false;
    } else {
        // 打印返回的内容
        curl_close($curl);
        return $data;
    }
}