<?php

namespace App\Models;

use App\Models\Section;
use App\Models\Student;
use App\Models\Facultie;
use App\Models\Classroom;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Promotion extends Model
{
    use HasFactory;
    protected $guarded =[];

    public function students(){
        return $this->belongsTo(Student::class,'student_id');
    }
    public function f_faculties(){
        return $this->belongsTo(Facultie::class,'from_facultie_id');
     }

     public function f_classrooms(){
         return $this->belongsTo(Classroom::class,'from_classroom_id');

     }

     public function f_sections(){
         return $this->belongsTo(Section::class,'from_section_id');
     }
    public function t_faculties(){
        return $this->belongsTo(Facultie::class,'to_facultie_id');
     }

     public function t_classrooms(){
         return $this->belongsTo(Classroom::class,'to_classroom_id');

     }

     public function t_sections(){
         return $this->belongsTo(Section::class,'to_section_id');
     }
}
