<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('father_name')->nullable();
            $table->string('mother_name')->nullable();
            $table->string('phone')->nullable();
            $table->string('designation')->nullable();
            $table->string('date_of_birth')->nullable();
            $table->string('gender')->nullable();
            $table->text('present_address')->nullable();
            $table->text('permanent_address')->nullable();
            $table->string('nationality')->nullable();
            $table->string('nationalid')->nullable();
            $table->string('maritial_status')->nullable();
            $table->string('bank')->nullable();
            $table->string('bank_ac')->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('linkdin')->nullable();
            $table->string('github')->nullable();
            $table->string('website')->nullable();
            $table->string('image')->nullable();
            $table->string('cv')->nullable();
            $table->string('status')->default(2)->comment('1=Admin 2=employee');
            $table->rememberToken();
            $table->timestamps();
        });
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
};
