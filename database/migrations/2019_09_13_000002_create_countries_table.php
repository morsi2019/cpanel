<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCountriesTable extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('countries')) {
        Schema::create('countries', function (Blueprint $table)
        {
            $table->id();
            $table->string('country_name')->nullable();
            $table->string('country_code')->nullable();
            $table->timestamps();
        });
    }}
}
