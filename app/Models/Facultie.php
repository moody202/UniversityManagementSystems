<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Facultie extends Model
{
    use HasFactory;
    use HasTranslations;
    public $translatable = ['Name'];

    protected $fillable=[
        'name','note'
    ];
}
