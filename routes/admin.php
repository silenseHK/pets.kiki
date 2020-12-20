<?php
/**
 * Created by PhpStorm.
 * User: 27989
 * Date: 2020/11/28
 * Time: 11:59
 */

Route::prefix('store')->namespace('Admin')->group(function(){
    Route::get('index','Store@index');
});