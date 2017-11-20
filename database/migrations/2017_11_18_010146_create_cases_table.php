<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cases', function (Blueprint $table) {
            $table->increments('case_id');
            $table->integer('case_victim_id')->unsigned();
            $table->integer('case_suspect_id')->unsigned();
            $table->integer('case_detail_id')->unsigned();
            $table->integer('case_blotter_id')->unsigned();
            $table->string('case_status');
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
        Schema::dropIfExists('cases');
    }
}
