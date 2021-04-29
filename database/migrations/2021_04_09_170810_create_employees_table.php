<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('name',35)->nullable();
            $table->string('phone',20)->nullable();
            $table->string('email',70)->nullable();
            $table->text('address')->nullable();
            $table->string('dob',30)->nullable();
            $table->string('blood_group',30)->nullable();
            $table->string('gender',30)->nullable();
            $table->string('nid',30)->nullable();
            $table->string('photo',50)->nullable();
            $table->string('employee_type',50)->nullable();
            $table->integer('status')->default(1);
            $table->integer('salary')->default(0);
            $table->string('position',40)->nullable();
            $table->text('details')->nullable();
            $table->string('join_date',30)->nullable();
            $table->string('resign_date',30)->nullable();
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
        Schema::dropIfExists('employees');
    }
}
