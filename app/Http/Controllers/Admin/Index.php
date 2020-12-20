<?php


namespace App\Http\Controllers\Admin;

use App\Http\Models\Admin\AdminUserModel;
use chillerlan\QRCode\QRCode;
use Illuminate\Support\Facades\DB;

class Index extends Base
{

    public function index(){
        return view('admin.index.index');
    }

    public function home(){
        $url = route('admin.index');
        echo $url;
    }

    public function button(){
        $data = DB::table('admin_user')->groupBy('user_name')->select(DB::raw('count(*) as count'))->toSql();
        print_r($data);die;
        return view('admin.index.button');
        $res = DB::table('admin')->orderBy('id','desc')->select()->get();
    }

    public function boot(){
        return view('admin.index.qrcode');
    }

}
