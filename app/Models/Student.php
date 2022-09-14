<?php

namespace App\Models;

use App\Models\Image;
use App\Models\Doctor;
use App\Models\MyParent;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $table = 'students';
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
     public function my_parents(){
         return $this->belongsTo(MyParent::class,'parent_id');
     }

     public function images()
     {
         return $this->morphMany(Image::class, 'imageable');
     }

 }


