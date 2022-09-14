<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\GenderSeeder;
use Database\Seeders\ParentSeeder;
use Database\Seeders\SectionSeeder;
use Database\Seeders\StudentSeeder;
use Database\Seeders\FacultieSeeder;
use Database\Seeders\ReligionSeeder;
use Database\Seeders\ClassroomSeeder;
use Database\Seeders\NotionlitieSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
            UserSeeder::class,
            FacultieSeeder::class,
            ClassroomSeeder::class,
            SectionSeeder::class,
            NotionlitieSeeder::class,
            ReligionSeeder::class,
            GenderSeeder::class,
            ParentSeeder::class,
            StudentSeeder::class,

        ]);
    }
}
