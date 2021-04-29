<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGetPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('get_payments', function (Blueprint $table) {
            $table->id();
            $table->integer('set_payment_id');
            $table->integer('student_id');
            $table->integer('registration_id')->nullable();
            $table->float('paid_amount')->default(0);
            $table->float('waiver_amount')->default(0);
            $table->string('get_date',30)->nullable();
            $table->string('note')->nullable();
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
        Schema::dropIfExists('get_payments');
    }
}
