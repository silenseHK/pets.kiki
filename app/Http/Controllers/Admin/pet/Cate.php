<?php


namespace App\Http\Controllers\Admin\pet;


use App\Http\Controllers\Admin\Base;

class Cate extends Base
{

    public function index(){
        return view('admin.pet.cate.index');
    }

}
