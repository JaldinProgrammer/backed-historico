<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnrolledsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enrolleds', function (Blueprint $table) {
            $table->id();
            $table->integer('year');
            $table->float('grade');
            $table->foreignId('subject_id')->constrained('subjects');
            $table->foreignId('semester_id')->constrained('semesters');
            $table->foreignId('user_id')->constrained('users');
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
        Schema::dropIfExists('enrolleds');
    }
}
