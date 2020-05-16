<?php

use App\Models\Book;
use App\Models\BookStatus;
use App\Models\Course;
use App\Models\Publisher;
use App\Models\User;
use Illuminate\Database\Seeder;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Book::truncate();
        $users = User::all();
        $courses = Course::all();
        $publishers = Publisher::all();
        $bookStatuses = BookStatus::all();
        $faker = \Faker\Factory::create();
        $faker->addProvider(new \Faker\Provider\en_US\Text($faker));
        $faker->addProvider(new \Faker\Provider\Lorem($faker));
        $faker->addProvider(new \Faker\Provider\DateTime($faker));
        $faker->addProvider(new \Faker\Provider\Base($faker));
        $books = [];
        for ($i = 0; $i < 600; $i++) {
            $timeStamp = \Carbon\Carbon::now()->subDays(rand(0, 2000));
            $tArray = ["created_at" => $timeStamp, "updated_at" => $timeStamp];
            $saleDetail = ["price" => $faker->numberBetween(130, 562)];
            $rentDetail = ["price" => $faker->numberBetween(30, 80)];

            $paymentDetail = [];
            if ($i < 200) {
                $paymentDetail['sale'] = $saleDetail;
            } else if ($i < 400) {
                $paymentDetail['rent'] = $rentDetail;
            } else {
                $paymentDetail['sale'] = $saleDetail;
                $paymentDetail['rent'] = $rentDetail;
            }
            $title = $faker->text(15);
            $book = [
                'title' =>  $faker->text(15),
                'year' => $faker->year,
                'edition_number' => $faker->numberBetween(1, 32),
                'payment_detail' => json_encode($paymentDetail),
                'book_cover' => "https://picsum.photos/seed/{$title}/600/800",
                'user_id' => $users->random()->id,
                'course_id' => $courses->random()->id,
                'publisher_id' => $publishers->random()->id,
                'is_on_sale' => rand(0, 1),
                'is_on_rent' => rand(0, 1),
                'status_id' => 1,
            ];
            array_push($books, array_merge($book, $tArray));
        }
        Book::insert($books);
    }
}
