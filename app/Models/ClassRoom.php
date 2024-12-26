<?php

namespace App\Models;

use App\Models\Grade;
use Illuminate\Database\Eloquent\Model;

class ClassRoom extends Model
{
    protected $fillable = ["className" , "grade_id"];
    

   
    public function grade()
    {
        return $this->belongsTo(Grade::class);
    }
}
