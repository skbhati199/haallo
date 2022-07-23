<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableGroups extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('groups')) 
        {
            Schema::create('groups', function (Blueprint $table) {
                $table->increments('id');
                $table->string('group_name')->nullable();
                $table->string('image')->nullable();
                $table->string('created_by')->nullable();
                $table->string('group_admin')->nullable();
                $table->string('members',2550)->nullable();
                $table->string('group_subadmin')->nullable();
                $table->string('mobile',50)->nullable();
                $table->timestamp('created_at')->default(\DB::raw('CURRENT_TIMESTAMP'));
                $table->timestamp('updated_at')->default(\DB::raw('CURRENT_TIMESTAMP '));

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
        Schema::dropIfExists('groups');
    }
}
