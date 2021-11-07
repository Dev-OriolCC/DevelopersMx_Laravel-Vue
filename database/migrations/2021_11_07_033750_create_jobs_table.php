<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->uuid('id')->primary();
            //
            $table->uuid('company_id'); // ? Foreign Key
            $table->uuid('type_id');    // ? Foreign Key
            $table->string('title');
            $table->text('description');
            $table->string('location');
            $table->string('level');
            $table->string('schedule');
            $table->boolean('benefit_flexible')->default(false);
            $table->boolean('benefit_dress')->default(false);
            $table->boolean('benefit_medical')->default(false);
            $table->boolean('benefit_vacation')->default(false);
            //
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
        Schema::dropIfExists('jobs');
    }
}
