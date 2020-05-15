<?php

use App\Models\Course;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class CoursesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Course::truncate();
        $faker = Factory::create();
        $faker->addProvider(new \Bezhanov\Faker\Provider\Educator($faker));
        $courses = [];
        for ($i = 0; $i < 25; $i++) {
            $course = [
                'name' => $faker->course,
            ];
            array_push($courses, $course);
        }
        Course::insert($courses);
    }
}
