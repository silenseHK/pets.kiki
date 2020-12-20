<?php


namespace App\Http\Models\Common;


use Illuminate\Database\Eloquent\Model;

/**
 * App\Http\Models\Common\BaseModel
 *
 * @method static \Illuminate\Database\Eloquent\Builder|BaseModel newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BaseModel newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BaseModel query()
 * @mixin \Eloquent
 */
class BaseModel extends Model
{

    protected $dateFormat = 'U';

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }

}
