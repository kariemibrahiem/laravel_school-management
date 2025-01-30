<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $guarded = [];

    public function Grade(){
        return $this->belongsTo("App\Models\Grade" , "Grade_id");
    }

    public function classroom(){
        return $this->belongsTo("App\Models\ClassRoom" , "Classroom_id");
    }

    public function section(){
        return $this->belongsTo("App\Models\Sections" , "section_id");
    }
    public function parent(){
        return $this->belongsTo("App\Models\Myparent" , "parent_id ");
    }
    public function nationality(){
        return $this->belongsTo("App\Models\Nationalities" , "nationalitie_id");
    }

    public function blood(){
        return $this->belongsTo("App\Models\Blood_type" , "blood_id");
    }

    public function images(){
        return $this->morphMany('App\Models\Image', 'imagable');
    }

}
