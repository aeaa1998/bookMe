<?php

use App\Models\Publisher;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class PublishersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Publisher::truncate();
        $faker = \Faker\Factory::create();
        $faker->addProvider(new \CompanyNameGenerator\FakerProvider($faker));
        $publishers = [];
        for ($i = 0; $i < 25; $i++) {
            $publisher = [
                'name' => $faker->companyName
            ];
            array_push($publishers, $publisher);
        }
        Publisher::insert($publishers);
    }
}
