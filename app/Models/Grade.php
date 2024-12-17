<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class Grade extends Model 
{
        use  HasTranslations;

    protected $table = 'grades';
    public $timestamps = true;
    protected $fillable = ["Notes" , "Name_en" , "Name"];

    use SoftDeletes;

    protected $dates = ['deleted_at'];

    public $translatable = ['name'];


}