<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Factories\CourseFactory;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CourseFactory::times(10);
    }
}
