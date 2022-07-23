<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSupportTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('supports')) 
        {
            Schema::create('support', function (Blueprint $table) {
                $table->increments('id');
                $table->string('image')->nullable();
                $table->string('user_id')->nullable();
                $table->string('name')->nullable();
                $table->string('mobile')->nullable();
                $table->string('report')->nullable();
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
        Schema::dropIfExists('support');
    }
}
