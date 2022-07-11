<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Doctorspecializationtable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        schema::create('doctor_specialization', function (Blueprint $table) {
            $table->id();
            $table->foreignId('doctor_id')->constrained()->OnDelete('cascade');
            $table->foreignId('specialization_id')->constrained()->OnDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
