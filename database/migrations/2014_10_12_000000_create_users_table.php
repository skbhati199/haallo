<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('users')) 
        {
            Schema::create('users', function (Blueprint $table) {
                $table->increments('id');
                $table->string('email')->nullable();
                $table->string('user_name')->nullable();
                $table->string('password')->nullable();
                $table->string('image')->nullable();
                $table->string('country_code')->nullable();
                $table->string('gender',12)->nullable()->comment("'0=male','1=female','2=both'");
                $table->string('mobile')->nullable();
                $table->string('otp')->nullable();
                $table->string('address')->nullable();
                $table->string('device_type')->nullable();
                $table->string('verification_token')->nullable();
                $table->string('device_token')->nullable();
                $table->string('otp_verify_status')->nullable();
                $table->string('profile_status')->default(0);
                $table->string('access_token')->nullable();
                $table->string('remember_token')->nullable();
                $table->string('user_type')->nullable()->comment('0=android','1=ios');
                $table->string('isRegister')->nullable();
                $table->string('is_block')->nullable();
                $table->string('set_limit')->nullable();
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
        Schema::dropIfExists('users');
    }
}
