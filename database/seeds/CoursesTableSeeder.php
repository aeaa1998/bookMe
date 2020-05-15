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
            $timeStamp = \Carbon\Carbon::now()->subDays(rand(0, 2000));
            $tArray = ["created_at" => $timeStamp, "updated_at" => $timeStamp];
            $course = [
                'name' => $faker->course,
            ];
            array_push($courses, array_merge($course, $tArray));
        }
        Course::insert($courses);
    }
}
