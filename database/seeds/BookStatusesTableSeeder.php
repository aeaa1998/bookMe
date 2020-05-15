<?php

use App\Models\BookStatus;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class BookStatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        BookStatus::truncate();
        BookStatus::insert([
            ['name' => 'Disponible'],
            ['name' => 'Alquilado'],
            ['name' => 'Comprado'],
            ['name' => 'Inhabilitado'],
        ]);
    }
}
