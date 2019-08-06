<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReviewTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //if (Schema::hasTable('review')) {
            Schema::create('review', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->string('title');
                $table->string('review');
                $table->string('nick');
                $table->string('location');
                $table->string('email');
                $table->timestamp('email_verified_at')->nullable();
                $table->integer('vote');
                $table->integer('quality_vote');
                $table->integer('performance_vote');
                $table->integer('features_vote');
                $table->integer('status');
                $table->timestamps();
            });
       // }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('review');
    }
}
