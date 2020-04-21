<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSaleBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sale_books', function (Blueprint $table) {
            $table->id();
            $table->double('price', 8, 2);
            $table->unsignedBigInteger('sale_status_id');
            $table->timestamps();
            $table->softDeletes('deleted_at', 0);

            /** Foreign keys */
            $table->foreign('sale_status_id')->references('id')->on('sale_statuses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sale_books');
    }
}
