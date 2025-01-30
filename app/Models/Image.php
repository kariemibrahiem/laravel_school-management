<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{

    protected $fillable = ["imagable_type" , "imagable_id" , "filename"];
//      protected $guarded = [];
    public function Imagable(){
        return $this->morphTo();
    }
}
