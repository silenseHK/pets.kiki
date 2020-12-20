<?php


namespace App\Http\Models\Common;


use Illuminate\Database\Eloquent\SoftDeletes;

class UploadGroupModel extends BaseModel
{

    protected $table = 'upload_group';

    protected $primaryKey = 'group_id';

    use SoftDeletes;

}
