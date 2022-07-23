<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminNotificationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('admin_notification')) 
        {
            Schema::create('admin_notification', function (Blueprint $table) {
                $table->increments('id');
                $table->string('sender_id')->nullable();
                $table->string('receiver_id')->nullable();
                $table->string('title')->nullable();
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
        Schema::dropIfExists('admin_notification');
    }
}
