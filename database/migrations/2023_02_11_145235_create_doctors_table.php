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
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('department_id');
            $table->string('name');
            $table->string('slug');
            $table->string('gender');
            $table->string('phone');
            $table->string('designation');
            $table->string('qualification')->nullable();
            $table->string('experience')->nullable();
            $table->string('specialization',1000)->nullable();
            $table->string('bio',1000)->nullable();
            $table->string('consulation_fees')->nullable();
            $table->string('address',500)->nullable();
            $table->string('image',50)->nullable();
            $table->boolean('is_active')->default(1);
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
        Schema::dropIfExists('doctors');
    }
};
