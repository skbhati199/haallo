<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableFriends extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('friends')) 
        {
            Schema::create('friends', function (Blueprint $table) {
                $table->increments('id');
                $table->string('user_id',15)->nullable();
                $table->string('friend_id',15)->nullable();    
                $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
                $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP'));
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
        Schema::dropIfExists('friends');
    }
}
