<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('admins')) 
        {
            Schema::create('admins', function (Blueprint $table) {
                    $table->increments('id');
                    $table->string('email')->nullable();
                    $table->string('name')->nullable();
                    $table->string('password')->nullable();
                    $table->string('image')->nullable();
                    $table->string('country_code')->nullable();
                    $table->string('mobile')->nullable();
                    $table->string('description')->nullable();
                    $table->string('date_of_birth')->nullable();
                    $table->string('city')->nullable();
                    $table->string('type')->nullable();
                    $table->string('forget_token')->nullable();
                    $table->string('remember_token')->nullable();
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
        Schema::dropIfExists('admins');
    }
}
