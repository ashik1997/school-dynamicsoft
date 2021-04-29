<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSocialMediaTable extends Migration
{
    public function up()
    {
        Schema::create('social_media', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->text('url')->nullable();
            $table->text('icon')->nullable();
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('social_media');
    }
}
