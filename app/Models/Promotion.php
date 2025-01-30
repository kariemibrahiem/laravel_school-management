<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    protected $fillable = [ "student_id",  "to_section" , "to_grade" , "to_class_room" , "from_section" , "from_grade" , "from_class_room"];

    public function student()
    {
        return $this->belongsTo("App\Models\Student" , "student_id");
    }
    public function f_grade()
    {
        return $this->belongsTo("App\Models\grade" , "from_grade");
    }



   public function f_classroom()
   {
       return $this->belongsTo("App\Models\ClassRoom" , "from_class_room");
   }

    // علاقة بين الترقيات الاقسام الدراسية لجلب اسم القسم  في جدول الترقيات

    public function f_section()
    {
        return $this->belongsTo('App\Models\Sections', 'from_section');
    }


    public function t_grade()
    {
        return $this->belongsTo('App\Models\grade', 'to_grade');
    }


    // علاقة بين الترقيات الصفوف الدراسية لجلب اسم الصف في جدول الترقيات

    public function t_classroom()
    {
        return $this->belongsTo('App\Models\ClassRoom', 'to_class_room');
    }

    // علاقة بين الترقيات الاقسام الدراسية لجلب اسم القسم  في جدول الترقيات

    public function t_section()
    {
        return $this->belongsTo('App\Models\Sections', 'to_section');
    }



}
