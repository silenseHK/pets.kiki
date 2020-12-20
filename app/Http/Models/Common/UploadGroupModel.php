<?php


namespace App\Http\Models\Common;


use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Http\Models\Common\UploadGroupModel
 *
 * @property int $group_id 分类id
 * @property string $group_type 文件类型
 * @property string $group_name 分类名称
 * @property int $sort 分类排序(数字越小越靠前)
 * @property \Illuminate\Support\Carbon|null $deleted_at 是否删除
 * @property \Illuminate\Support\Carbon $created_at 创建时间
 * @property \Illuminate\Support\Carbon $updated_at 更新时间
 * @method static \Illuminate\Database\Eloquent\Builder|UploadGroupModel newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UploadGroupModel newQuery()
 * @method static \Illuminate\Database\Query\Builder|UploadGroupModel onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|UploadGroupModel query()
 * @method static \Illuminate\Database\Eloquent\Builder|UploadGroupModel whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UploadGroupModel whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UploadGroupModel whereGroupId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UploadGroupModel whereGroupName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UploadGroupModel whereGroupType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UploadGroupModel whereSort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UploadGroupModel whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|UploadGroupModel withTrashed()
 * @method static \Illuminate\Database\Query\Builder|UploadGroupModel withoutTrashed()
 * @mixin \Eloquent
 */
class UploadGroupModel extends BaseModel
{

    protected $table = 'upload_group';

    protected $primaryKey = 'group_id';

    use SoftDeletes;

}
