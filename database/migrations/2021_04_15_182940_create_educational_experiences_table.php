<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEducationalExperiencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('educational_experiences', function (Blueprint $table) {
            $table->id();
            $table->integer('employee_id');
            $table->string('exam_name')->nullable();
            $table->string('group_subject')->nullable();
            $table->string('institute')->nullable();
            $table->string('result')->nullable();
            $table->string('pass_year')->nullable();
            $table->string('duration')->nullable();
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
        Schema::dropIfExists('educational_experiences');
    }
}
