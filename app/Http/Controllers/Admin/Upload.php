<?php


namespace App\Http\Controllers\Admin;


use App\Http\Repository\Admin\UploadRepo;

class Upload extends Base
{

    public function index(){
        return view('admin.upload');
    }

    public function uploadGroupList(){
        try{
            $repo = new UploadRepo();
            $list = $repo->uploadGroupList();
            return returnSuccess($list);
        }catch(\Exception $e){
            return returnError(100,$e->getMessage());
        }
    }

    public function uploadLists(){
        try{
            $repo = new UploadRepo();
            $list = $repo->uploadLists();
            return returnSuccess($list);
        }catch(\Exception $e){
            return returnError(100,$e->getMessage());
        }
    }

}
