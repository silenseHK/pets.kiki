<?php


namespace App\Http\Models\Common;


use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{

    protected $dateFormat = 'U';

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }

}
