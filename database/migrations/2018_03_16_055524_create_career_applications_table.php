<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCareerApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('career_applications', function (Blueprint $table) {
            $table->increments('id');
            
            $table->string('fname', 100)->nullable();
            $table->string('lname', 100)->nullable();
            $table->string('gender', 10)->nullable();
            $table->string('nationality', 100)->nullable();
            $table->string('email', 100)->nullable();
            $table->string('phone_code', 5)->nullable();
            $table->string('phone', 20)->nullable();
            $table->string('career_role', 100)->nullable();
            $table->string('interest', 50)->nullable();
            $table->string('location', 50)->nullable();
            $table->string('start_date', 30)->nullable();
            $table->string('end_date', 30)->nullable();
            $table->text('occupation')->nullable();
            $table->string('experience', 10)->nullable();
            $table->text('recent_education')->nullable();
            $table->string('high_education', 40)->nullable();
            $table->text('other_education')->nullable();
            $table->text('question1')->nullable();
            $table->text('question2')->nullable();
            $table->string('cv', 50)->nullable();
            $table->string('portfolio', 50)->nullable();
            $table->string('link')->nullable();

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
        Schema::dropIfExists('career_applications');
    }
}
