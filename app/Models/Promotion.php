<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    protected $fillable = [ "student_id",  "to_section" , "to_grade" , "to_class_room" , "from_section" , "from_grade" , "from_class_room"];
}
