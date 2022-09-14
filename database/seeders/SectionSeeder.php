<?php

namespace Database\Seeders;

use App\Models\Section;
use App\Models\Facultie;
use App\Models\Classroom;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sections')->delete();
        $sections=[
           [ 'en'=>'ar','ar'=>'عربي']
        ];
        foreach($sections as $section){
            Section::create([
                'facultie_id'=>Facultie::all()->random()->id,
                'classroom_id'=>Classroom::all()->random()->id,
                'name'=>$section,
                'status'=>1
            ]);
        }
    }
}
