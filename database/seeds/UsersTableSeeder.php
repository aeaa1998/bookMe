<?php

use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        $faker = Factory::create();
        $users = [];
        for ($i = 0; $i < 80; $i++) {
            $user = [
                'first_name' => $faker->name, //'Lucy Cechtelar'
                'last_name' => $faker->lastName, //'Jordy Lodge'
                'email' => "user${i}@email.com",
                'password' => Hash::make('123456'),
                'license_number' => $i + $i + 1,
                'phone_number' => $faker->unique()->phoneNumber,
            ];
            array_push($users, $user);
        }
        User::insert($users);
    }
}
