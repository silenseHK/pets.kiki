<?php


namespace App\Http\Models\Common;


use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Http\Models\Common\UploadFileModel
 *
 * @property int $file_id 文件id
 * @property string $storage 存储方式
 * @property int $group_id 文件分组id
 * @property string $file_url 存储域名
 * @property string $file_name 文件路径
 * @property int $file_size 文件大小(字节)
 * @property string $file_type 文件类型
 * @property string $extension 文件扩展名
 * @property int $is_user 是否为c端用户上传
 * @property int $is_recycle 是否已回收
 * @property \Illuminate\Support\Carbon|null $deleted_at 软删除
 * @property \Illuminate\Support\Carbon $created_at 创建时间
 * @property-read string $file_path
 * @method static \Illuminate\Database\Eloquent\Builder|UploadFileModel newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UploadFileModel newQuery()
 * @method static \Illuminate\Database\Query\Builder|UploadFileModel onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|UploadFileModel query()
 * @method static \Illuminate\Database\Eloquent\Builder|UploadFileModel whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UploadFileModel whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UploadFileModel whereExtension($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UploadFileModel whereFileId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UploadFileModel whereFileName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UploadFileModel whereFileSize($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UploadFileModel whereFileType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UploadFileModel whereFileUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UploadFileModel whereGroupId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UploadFileModel whereIsRecycle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UploadFileModel whereIsUser($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UploadFileModel whereStorage($value)
 * @method static \Illuminate\Database\Query\Builder|UploadFileModel withTrashed()
 * @method static \Illuminate\Database\Query\Builder|UploadFileModel withoutTrashed()
 * @mixin \Eloquent
 */
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
