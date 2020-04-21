<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRentBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('rent_books');
        Schema::create('rent_books', function (Blueprint $table) {
            $table->id();
            $table->double('week_fee', 8, 2);
            $table->double('month_fee', 8, 2);
            $table->unsignedBigInteger('rent_status_id');
            $table->timestamps();
            $table->softDeletes('deleted_at', 0);

            /** Foreign keys */
            $table->foreign('rent_status_id')->references('id')->on('rent_statuses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rent_books');
    }
}
