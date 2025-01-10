<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{

    Protected $fillable = ["address" , "joining_date" , "name" , "email" , "password" , "gander" , "specialization_id"];



    public function specialization()
    {
        return $this->belongsTo(Specialization::class);
    }

    public function genders()
    {
        return $this->belongsTo('App\Models\Gender', 'Gender_id');
    }

    public function Sections()
    {
        return $this->belongsToMany(Sections::class ,'section_teacher');
    }
}
