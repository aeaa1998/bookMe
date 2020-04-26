<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('title', 35);
            $table->unsignedInteger('year');
            $table->integer('edition_number');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('course_id');
            $table->unsignedBigInteger('book_type_id');
            $table->unsignedBigInteger('publisher_id');
            $table->unsignedBigInteger('status_id');

            /** Foreign keys */
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('book_type_id')->references('id')->on('book_types');
            $table->foreign('status_id')->references('id')->on('book_statuses');
            $table->foreign('course_id')->references('id')->on('courses');
            $table->foreign('publisher_id')->references('id')->on('publishers');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }
}
