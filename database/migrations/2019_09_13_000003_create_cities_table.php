<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCitiesTable extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('cities')) {
        Schema::create('cities', function (Blueprint $table)
        {
            $table->id();
            $table->string('city_name')->nullable()->nullable();
            $table->unsignedBigInteger('country_id')->nullable();
            $table->foreign('country_id')->references('id')->on('countries')->onDelete('cascade');
            $table->timestamps();
        });
    }}

    public function down()
    {
        Schema::dropIfExists('cities');
    }

}
