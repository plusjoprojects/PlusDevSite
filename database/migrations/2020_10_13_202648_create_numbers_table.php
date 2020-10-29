<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNumbersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('numbers', function (Blueprint $table) {
            $table->id();
            $table->integer('categories_id');
            $table->integer('countries_id');
            $table->string('name');
            $table->integer('phone');
            $table->integer('udid')->nullable()->default(0);
            $table->integer('synced_to_phone')->nullable()->default(0);
            $table->integer('delete_from_phone')->nullable()->default(0);
            $table->integer('active')->default(1);
            $table->integer('user_id')->nullable()->default(0);
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
        Schema::dropIfExists('numbers');
    }
}
