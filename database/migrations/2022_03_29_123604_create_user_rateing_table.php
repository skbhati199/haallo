<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserRateingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('user_rateing')) 
        {
            Schema::create('user_rateing', function (Blueprint $table) {
                $table->increments('id');
                $table->string('user_id')->nullable();
                $table->string('rateing_id')->nullable();
                $table->string('rateing')->nullable();
                $table->string('description')->nullable();
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_rateing');
    }
}
