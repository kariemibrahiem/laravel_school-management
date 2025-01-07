<?php

namespace App\Models;

use App\Models\ClassRoom;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;
use App\Models\Sections;
class Grade extends Model 
{
    //     use  HasTranslations;

    // protected $table = 'grades';
    // public $timestamps = true;
    // protected $fillable = ["Notes" , "Name_en" , "Name"];

    // use SoftDeletes;

    // protected $dates = ['deleted_at'];

    // public $translatable = ['name'];

    // public function classes(){
    //     return $this->hasMany('App\Models\ClassRoom', 'id');
    // }
    // public function Sections()
    // {
    //     return $this->hasMany('App\Models\Sections', 'Grade_id');
    // }

    
    use HasTranslations;
    public $translatable = ['Name'];

    protected $fillable=['Name','Notes'];
    protected $table = 'Grades';
    public $timestamps = true;

    // علاقة المراحل الدراسية لجلب الاقسام المتعلقة بكل مرحلة

    public function Sections()
    {
        return $this->hasMany('App\Models\Sections', 'Grade_id');
    }

    public function classes(){
        return $this->hasMany(ClassRoom::class);
    }
}