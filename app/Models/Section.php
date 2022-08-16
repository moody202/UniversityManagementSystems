<?php

namespace App\Models;

use App\Models\Facultie;
use App\Models\Classroom;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Section extends Model
{
    use HasFactory;
    use HasTranslations;
    public $translatable = ['name'];
    protected $fillable = ['name','status','facultie_id','classroom_id'];

    public function classrooms(){
        return $this->belongsTo(Classroom::class,'classroom_id');
    }
    public function faculties(){
        return $this->belongsTo(Facultie::class,'facultie_id');
    }
}
