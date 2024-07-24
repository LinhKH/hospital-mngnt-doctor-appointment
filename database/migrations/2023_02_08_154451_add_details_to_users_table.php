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
        Schema::table('users', function (Blueprint $table) {
            $table->integer('age')->nullable();
            $table->string('dob',100)->nullable();
            $table->string('gender',20)->nullable();
            $table->string('phone',20)->nullable();
            $table->boolean('is_ban')->default(0);
            $table->string('role_as')->default('user')->comment("Admin, Doctor, User");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('age');
            $table->dropColumn('dob');
            $table->dropColumn('gender');
            $table->dropColumn('phone');
            $table->dropColumn('is_ban');
            $table->dropColumn('role_as');
        });
    }
};
