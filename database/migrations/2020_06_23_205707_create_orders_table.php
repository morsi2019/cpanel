<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            Schema::create('orders', function (Blueprint $table) 
            {
                $table->id();
                $table->unsignedBigInteger('user_id')->nullable();;
                $table->foreign('user_id')->references('id')->on('users');
                $table->unsignedBigInteger('item_id')->nullable();;
                $table->foreign('item_id')->references('id')->on('items');
                $table->integer('qnty')->default(0)->nullable();
                $table->integer('status')->default(0);
                $table->timestamps();
            });
       //}
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
