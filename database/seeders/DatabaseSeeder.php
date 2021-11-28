<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\People;
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

        \App\Models\Course::factory(15)->hasAttached(People::factory()->count(rand(8,34)))->create();
    }
}
