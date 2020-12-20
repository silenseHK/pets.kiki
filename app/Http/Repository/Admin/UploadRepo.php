<?php


namespace App\Http\Repository\Admin;


use App\Http\Models\Common\UploadFileModel;
use App\Http\Models\Common\UploadGroupModel;
use App\Http\Repository\BaseRepo;
use Illuminate\Support\Facades\Validator;

class UploadRepo extends BaseRepo
{

    public function uploadGroupList(){
        $list = UploadGroupModel::select(['group_id', 'group_type', 'group_name'])->orderBy('sort', 'asc')->get();
        return $list;
    }

    public function uploadLists(){
        $validator = Validator::make(request()->input(),[
            'group_id' => 'required|min:1',
        ]);
        if($validator->fails()){
            return $this->setError($validator->errors()->first());
        }
        $list = UploadFileModel::where([['group_id', '=', request()->input('group_id')]])->select(['file_id', 'group_id', 'file_url', 'file_name', 'storage'])->paginate(15);
        return $list;
    }

}
