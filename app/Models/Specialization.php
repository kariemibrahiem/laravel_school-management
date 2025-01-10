<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Specialization extends Model
{
    protected $fillable = ['name'];


    public function teachers(){
        return $this->hasMany(Teacher::class);
    }
}
