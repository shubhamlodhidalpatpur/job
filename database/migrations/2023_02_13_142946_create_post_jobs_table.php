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
        Schema::create('post_jobs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->date('start_date')->nullable(true);
            $table->date('end_date')->nullable(true);
            $table->bigInteger('category_id')->nullable(true)->unsigned();
            $table->bigInteger('state_id')->nullable(true)->unsigned();
            $table->bigInteger('department_id')->nullable(true)->unsigned();
            $table->bigInteger('min_age')->nullable(true)->unsigned();
            $table->bigInteger('max_age')->nullable(true)->unsigned();
            $table->string('eligibility');
            $table->string('notification_link')->nullable(true);
            $table->string('apply_link')->nullable(true);
            $table->bigInteger('no_of_vacancy')->nullable(true);
            $table->bigInteger('fee')->nullable(true);



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
        Schema::dropIfExists('post_jobs');
    }
};
