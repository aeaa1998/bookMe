<?php

use App\Models\User;
use App\Models\UserReview;
use Faker\Factory;
use Illuminate\Database\Seeder;

class UserReviewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UserReview::truncate();
        $faker = Factory::create();
        $userReviews = [];
        $reviewStars = collect([0, 1, 2, 3, 4, 5]);
        $isAnonym = collect([0, 1]);
        $usersToReviewAndBeReviewed = User::all()->random(65);
        $faker = \Faker\Factory::create();
        $faker->addProvider(new \Faker\Provider\en_US\Text($faker));
        for ($i = 0; $i < 350; $i++) {
            $userReviewer = $usersToReviewAndBeReviewed->random();
            $userToBeReviewed = $usersToReviewAndBeReviewed->where('id', '!=', $userReviewer)->random();
            $userReview = [
                'user_id' => $userReviewer->id,
                'customer_id' => $userToBeReviewed->id,
                'isAnonymous' => $isAnonym->random(),
                'rating' => $reviewStars->random(),
                'comment' => $faker->realText(35),
            ];
            array_push($userReviews, $userReview);
        }
        UserReview::insert($userReviews);
    }
}
