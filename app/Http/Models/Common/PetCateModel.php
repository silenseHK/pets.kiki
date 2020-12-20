<?php


namespace App\Http\Models\Common;


use Illuminate\Database\Eloquent\SoftDeletes;

class PetCateModel extends BaseModel
{

    protected $table = 'pet_cate';

    protected $primaryKey = 'pet_cate_id';

    use SoftDeletes;

}
