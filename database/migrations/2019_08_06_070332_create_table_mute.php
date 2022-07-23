<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableMute extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('mutes')) 
        {
            Schema::create('mutes', function (Blueprint $table) {
                $table->increments('id');
                $table->string('hours')->nullable();
                $table->string('days')->nullable();
                $table->string('weeks')->nullable();
                $table->string('months')->nullable();
                $table->string('years')->nullable();
                $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
                $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP'));
                $table->timestamp('deleted_at')->nullable();
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
        Schema::dropIfExists('mutes');
    }
}
