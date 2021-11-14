<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Factories\PeopleFactory;

class PeopleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PeopleFactory::times(100);
    }
}
