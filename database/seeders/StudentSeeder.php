<?php

namespace Database\Seeders;

use App\Models\Gender;
use App\Models\Section;
use App\Models\Student;
use App\Models\Facultie;
use App\Models\MyParent;
use App\Models\Religion;
use App\Models\Classroom;
use App\Models\Notionlitie;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('students')->delete();
        $students= new Student();
        $students->name='Ahmed Mahmoud';
        $students->email='Ahmed55@gmail.com';
        $students->birth_day='2015-10-08';
        $students->password= Hash::make('12345678');
        $students->facultie_id=Facultie::all()->unique()->random()->id;
        $students->gender_id=1;
        $students->notionlitie_id=64;
        $students->classroom_id=Classroom::all()->unique()->random()->id;
        $students->section_id=Section::all()->unique()->random()->id;
        $students->religion_id=1;
        $students->parent_id=MyParent::all()->unique()->random()->id;
        $students->academic_year='2022';
        $students->save();
    }
}
