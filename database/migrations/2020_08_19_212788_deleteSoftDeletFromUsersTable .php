<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class deleteSoftDeletFromUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
   
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table("users", function ($table) 
        {
            $table->dropSoftDeletes();
            $table->dropColumn('deleted_at');
        });
    }
}
