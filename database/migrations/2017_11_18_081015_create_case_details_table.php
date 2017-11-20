<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCaseDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('case_details', function (Blueprint $table) {
            $table->increments('case_detail_id');
            $table->integer('crime_detail_id')->unsigned();
            $table->integer('crime_location_id')->unsigned();
            $table->integer('crime_classification_id')->unsigned();
            $table->date('incedent_at');
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
        Schema::dropIfExists('case_details');
    }
}
