<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MyParent extends Model
{
    use HasFactory;
    use HasTranslations;

    public $translatable = ['name_father','job_father','name_mather','job_mather'];
    protected $table = 'my_parents';
    protected $guarded=[];
}
