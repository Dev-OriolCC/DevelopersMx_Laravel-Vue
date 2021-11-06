<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDevelopersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('developers', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('username');
            $table->string('profile_pic');
            $table->string('bio');
            $table->string('location');
            $table->text('description');
            $table->integer('experience');
            $table->string('social_github');
            $table->string('social_twitter');
            $table->uuid('type_id');



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
        Schema::dropIfExists('developers');
    }
}
