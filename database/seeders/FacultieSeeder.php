<?php

namespace Database\Seeders;

use App\Models\Facultie;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class FacultieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('faculties')->delete();
        $faculties=[
            ['en'=>'Faculty Of Education', 'ar'=>'كلية التربية '],
            ['en'=>'Faculty of Computer and Information','ar'=>'كلية حاسبات ومعلومات'],
            ['en'=>'faculty Of Medicine','ar'=>'كلية الطب'],
            ['en'=>'Faculty of Engineering','ar'=>'كلية الهندسة'],
            ['en'=>'Faculty of Literature','ar'=>'كلية الأداب '],
            ['en'=>'Faculty of Science','ar'=>'كلية العلوم'],
            ['en'=>'Faculty of Archaeology','ar'=>'كلية الاثار']
        ];

        foreach($faculties as $facultie){
            Facultie::create(['name'=>$facultie]);
        }
    }
}
