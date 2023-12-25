<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBreakingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('breakings', function (Blueprint $table) {
            $table->increments('id');
           $table->integer('work_id')->unsigned()->index();
            $table->time('start_time');
            $table->time('end_time')->nullable();
            $table->timestamps();

            $table->foreign('work_id')->references('id')->on('works');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('breakings');
    }
}
