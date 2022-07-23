<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHelpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('helps')) 
        {
            Schema::create('helps', function (Blueprint $table) {
                $table->increments('id');
                $table->text('help_text')->nullable();
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
        Schema::dropIfExists('helps');
    }
}
