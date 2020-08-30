<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    public function up()
    {
        Schema::create('items', function (Blueprint $table) 
        {
            $table->id();
            $table->unsignedBigInteger('item_category_id');
            $table->foreign('item_category_id')->references('id')->on('item_categories');
            $table->string('item_name');
            $table->string('item_description');
            $table->date('item_issu_date');
            $table->date('item_exp_date');
            $table->tinyInteger('status')->default('1');
            $table->timestamps();
            
      
        });
    }
}
