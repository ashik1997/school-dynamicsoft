<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGuardiansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guardians', function (Blueprint $table) {
            $table->id();
            $table->integer('student_id');
            $table->string('mother_name',35)->nullable();
            $table->string('mother_phone',14)->nullable();
            $table->string('mother_email',70)->nullable();
            $table->string('mother_address',150)->nullable();
            $table->string('mother_occupation',50)->nullable();
            $table->string('father_name',35)->nullable();
            $table->string('father_phone',14)->nullable();
            $table->string('father_email',70)->nullable();
            $table->string('father_address',150)->nullable();
            $table->string('father_occupation',50)->nullable();
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
        Schema::dropIfExists('guardians');
    }
}
