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
    //����ץȡ��url
    curl_setopt($curl, CURLOPT_URL, $url);
    //����ͷ�ļ�����Ϣ��Ϊ���������
    curl_setopt($curl, CURLOPT_HEADER, 0);
    // ��ʱ����,����Ϊ��λ
    curl_setopt($curl, CURLOPT_TIMEOUT, 1);

    // ��ʱ���ã��Ժ���Ϊ��λ
    // curl_setopt($curl, CURLOPT_TIMEOUT_MS, 500);

    // ��������ͷ
    curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
    //���û�ȡ����Ϣ���ļ�������ʽ���أ�������ֱ�������
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
    //ִ������
    $data = curl_exec($curl);

    // ��ʾ������Ϣ
    if (curl_error($curl)) {
        return false;
    } else {
        // ��ӡ���ص�����
        curl_close($curl);
        return $data;
    }
}