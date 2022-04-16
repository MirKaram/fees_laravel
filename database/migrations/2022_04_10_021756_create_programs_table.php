<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgramsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('programs', function (Blueprint $table) {
            $table->id();
            $table->string("name",255);
            $table->integer("semester_fee");
            $table->integer("admission_fee");
            $table->integer("Lab_fee");
            $table->integer("late_fee");
            $table->integer("total_semesters");
            $table->date("initial_date_fall_semester");
            $table->date("initial_date_spring_semester");
            $table->date("end_date_fall_semester");
            $table->date("end_date_spring_semester");
            $table->integer("number_of_days_late");
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
        Schema::dropIfExists('programs');
    }
}
