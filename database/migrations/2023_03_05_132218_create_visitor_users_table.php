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
        Schema::create('visitor_users', function (Blueprint $table) {
            $table->id();
            $table->string('fname');
            $table->bigInteger('state')->nullable(true)->unsigned();
            $table->bigInteger('age')->nullable(true)->unsigned();
            $table->bigInteger('mobile_number')->nullable(true)->unsigned();
            $table->date('date_of_birth')->nullable(true);  
            $table->string('category');
            $table->string('password');
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
        Schema::dropIfExists('visitor_users');
    }
};
