<?php


namespace App\Http\Models\Common;


use Illuminate\Database\Eloquent\SoftDeletes;

class UploadFileModel extends BaseModel
{

    protected $table = 'upload_file';

    protected $primaryKey = 'file_id';

    protected $appends = ['file_path'];

    use SoftDeletes;

    /**
     * 获取图片完整路径
     * @param $value
     * @param $data
     * @return string
     */
    public function getFilePathAttribute($value, $data)
    {
        if ($data['storage'] === 'local') {
            return url()->previous() . 'uploads/' . $data['file_name'];
        }
        return $data['file_url'] . '/' . $data['file_name'];
    }

}
