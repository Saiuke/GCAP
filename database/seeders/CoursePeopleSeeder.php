<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\People;
use App\Models\CoursePeople;
use Illuminate\Database\Seeder;

class CoursePeopleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $people = People::paginate(100);

        foreach ($people as $person) {
            CoursePeople::firstOrCreate([
                'person_id' => $person->id,
                'course_id' => rand(1,10),
            ]);
        }
    }
}
