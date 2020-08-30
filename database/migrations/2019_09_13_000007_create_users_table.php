<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
           

            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            //$table->string('mobile', 20);
            $table->string('phone', 20)->nullable();;
            $table->string('country')->nullable();
            $table->string('city')->nullable();
            $table->tinyInteger('role')->nullable();
            $table->unsignedBigInteger('company_id')->nullable();
            $table->foreign('company_id')->references('id')->on('companies');
            $table->tinyInteger('status')->default('1');
            $table->text('address')->nullable();
            $table->rememberToken();
            $table->timestamps();
           
      
        });
    }
}
