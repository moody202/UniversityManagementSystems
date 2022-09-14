<?php

namespace Database\Seeders;

use App\Models\Gender;
use App\Models\MyParent;
use App\Models\Religion;
use App\Models\Notionlitie;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ParentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('my_parents')->delete();
        $my_parents = new MyParent();
        $my_parents->email = 'ayoub@gmail.com';
        $my_parents->password = Hash::make('12345678');
        $my_parents->name_father = ['en' => 'Abdelhakam', 'ar' => 'عبدالحكم'];
        $my_parents->nat_id_father = '1234567810';
        $my_parents->passport_father = '1234567810';
        $my_parents->phone_father = '1234567810';
        $my_parents->job_father = ['en' => 'programmer', 'ar' => 'مبرمج'];
        $my_parents->notionlitie_father_id = Notionlitie::all()->unique()->random()->id;
        $my_parents->religion_father_id =Religion::all()->unique()->random()->id;
        $my_parents->gender_father_id = Gender::all()->unique()->random()->id;
        $my_parents->addres_father ='القاهرة';
        $my_parents->name_mather = ['en' => 'SS', 'ar' => 'سس'];
        $my_parents->nat_id_mather = '1234567810';
        $my_parents->passport_mather = '1234567810';
        $my_parents->phone_mather = '1234567810';
        $my_parents->job_mather = ['en' => 'Teacher', 'ar' => 'معلمة'];
        $my_parents->notionlitie_mather_id = Notionlitie::all()->unique()->random()->id;
        $my_parents->religion_mather_id =Religion::all()->unique()->random()->id;
        $my_parents->gender_mather_id = Gender::all()->unique()->random()->id;
        $my_parents->addres_mather ='القاهرة';
        $my_parents->save();
    }
}
