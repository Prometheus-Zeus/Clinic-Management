<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('P_firstName');
            $table->string('P_middleName');
            $table->string('P_lastName');
            $table->string('P_gender');
            $table->integer('P_age');
            $table->string('P_medHistory');
            $table->string('P_guardian');
            $table->dateTime('P_lastVisit');
            $table->string('P_status');
            $table->integer('P_contactNum');
            $table->string('P_location');
            $table->string('P_reasonVisit');
            
            $table->float('P_amountPaid');
            $table->string('P_visitDescription');
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
        Schema::dropIfExists('patient');
    }
}