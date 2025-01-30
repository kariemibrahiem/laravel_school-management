<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ParentAttachement extends Model
{
    protected $fillable = ["filename" , "parent_id"];
}
