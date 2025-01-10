<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Sections extends Model
{
    // use HasTranslations;
    // public $translatable = ['Name_Section'];
    // protected $fillable=['Name_Section','Grade_id','Class_id'];


    // public function class()
    // {
    //     return $this->belongsTo('App\Models\ClassRoom', 'id');
    // }

    // public function My_classs()
    // {
    //     return $this->belongsTo('App\Models\Classroom', 'Class_id');
    // }

    // public function grade(){
    //     return $this->belongsTo(Grade::class);
    // }
    use HasTranslations;
    public $translatable = ['Name_Section'];
    protected $fillable=['Name_Section','Grade_id','Class_id'];

    protected $table = 'sections';
    public $timestamps = true;


    // علاقة بين الاقسام والصفوف لجلب اسم الصف في جدول الاقسام

    public function class()
    {
        return $this->belongsTo(ClassRoom::class);
    }

    public function Teachers()
    {
        return $this->belongsToMany(Teacher::class , "section_teacher");

    }
}
