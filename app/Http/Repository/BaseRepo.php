<?php


namespace App\Http\Repository;


class BaseRepo
{

    protected $valid;

    protected $error = '';

    public function getError(){
        return $this->error;
    }

    public function setError($error){
        $this->error = $error;
        return false;
    }

}
