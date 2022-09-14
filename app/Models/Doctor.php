<?php

namespace App\Models;

use App\Models\Gender;
use App\Models\Section;
use App\Models\Facultie;
use App\Models\Religion;
use App\Models\Classroom;
use App\Models\Notionlitie;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Doctor extends Model
{
    use HasFactory;
    use HasTranslations;
    protected $table = 'doctors';
    public $translatable =['name'];
    protected $guarded =[];

    public function faculties(){
       return $this->belongsTo(Facultie::class,'facultie_id');
    }

    public function classrooms(){
        return $this->belongsTo(Classroom::class,'classroom_id');

    }

    public function sections(){
        return $this->belongsTo(Section::class,'section_id');
    }

    public function notionlities(){
        return $this->belongsTo(Notionlitie::class,'notionlitie_id');
    }

    public function religions(){
        return $this->belongsTo(Religion::class,'religion_id');
    }

    public function genders(){
        return $this->belongsTo(Gender::class,'gender_id');
    }
}
