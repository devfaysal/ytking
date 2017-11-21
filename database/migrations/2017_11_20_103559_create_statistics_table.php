<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStatisticsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('statistics', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('channel_id');//relationship with channels table
            $table->bigInteger('viewCount');
            $table->integer('todaysView')->nullable();
            $table->integer('subscriberCount');
            $table->integer('todaysSubscriber')->nullable();;
            $table->integer('videoCount');
            $table->integer('todaysVideo')->nullable();;
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
        Schema::dropIfExists('statistics');
    }
}
