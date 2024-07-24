<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('doctor_id')->nullable();
            $table->string('appointment_number');
            $table->string('appointment_date');
            $table->string('appointment_time');
            $table->string('name');
            $table->string('email')->nullable();
            $table->string('phone');
            $table->string('consulation_fees')->nullable();
            $table->string('consulation_fees_status')->nullable();
            $table->string('user_comment')->nullable();
            $table->string('doctor_comment')->nullable();
            $table->string('status')->nullable()->default('booked')->comment('Booked, Completed, Cancel, Patient Not Available');
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
        Schema::dropIfExists('appointments');
    }
};
