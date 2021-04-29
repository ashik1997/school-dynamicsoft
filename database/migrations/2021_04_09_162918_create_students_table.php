<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('name',35)->nullable();
            $table->string('phone',16)->nullable();
            $table->string('email',70)->nullable();
            $table->string('address',150)->nullable();
            $table->string('dob',30)->nullable();
            $table->string('blood_group',30)->nullable();
            $table->string('gender',30)->nullable();
            $table->string('image',50)->nullable();
            $table->integer('status')->default(1);
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
        Schema::dropIfExists('students');
    }
}
