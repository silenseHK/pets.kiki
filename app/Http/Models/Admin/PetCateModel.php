<?php


namespace App\Http\Models\Admin;

use App\Http\Models\Common\PetCateModel as PetCateModelCommon;

/**
 * App\Http\Models\Admin\PetCateModel
 *
 * @property int $pet_cate_id 宠物分类id
 * @property string $name 分类名
 * @property int $image_id 分类图片
 * @property int $is_show 是否前端显示 10 显示 20不显示
 * @property int $pid 父级分类id
 * @property int $level 分类级别 1顶级 2二级
 * @property int $status 状态 10 可用 20 冻结
 * @property \Illuminate\Support\Carbon $created_at 创建时间
 * @property \Illuminate\Support\Carbon $updated_at 更新时间
 * @property \Illuminate\Support\Carbon|null $deleted_at 删除时间
 * @method static \Illuminate\Database\Eloquent\Builder|PetCateModel newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PetCateModel newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PetCateModel query()
 * @method static \Illuminate\Database\Eloquent\Builder|PetCateModel whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PetCateModel whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PetCateModel whereImageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PetCateModel whereIsShow($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PetCateModel whereLevel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PetCateModel whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PetCateModel wherePetCateId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PetCateModel wherePid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PetCateModel whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PetCateModel whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class PetCateModel extends PetCateModelCommon
{



}
