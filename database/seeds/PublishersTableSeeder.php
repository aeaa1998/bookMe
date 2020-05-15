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
            $timeStamp = \Carbon\Carbon::now()->subDays(rand(0, 2000));
            $tArray = ["created_at" => $timeStamp, "updated_at" => $timeStamp];
            $publisher = [
                'name' => $faker->companyName
            ];
            array_push($publishers, array_merge($publisher, $tArray));
        }
        Publisher::insert($publishers);
    }
}
