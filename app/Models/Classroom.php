<?php

namespace App\Models;

use App\Models\Facultie;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Classroom extends Model
{
    use HasFactory;
    use HasTranslations;

    public $translatable = ['name'];

    protected $fillable=[
        'name','facultie_id'
    ];

    public function faculties(){
        return $this->belongsTo(Facultie::class,'facultie_id');
    }
}
