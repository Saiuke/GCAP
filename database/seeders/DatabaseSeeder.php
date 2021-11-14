<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            CoursePeopleSeeder::class,
            PeopleCategorySeeder::class
        ]);

        \App\Models\People::factory(100)->create();
        \App\Models\Course::factory(10)->create();
    }
}
