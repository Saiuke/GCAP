<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PeopleCategories;

class PeopleCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PeopleCategories::create(['label' => 'Teacher']);
        PeopleCategories::create(['label' => 'Student']);
    }
}
