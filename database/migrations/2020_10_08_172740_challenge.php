<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Challenge extends Migration
{
    public function up()
    {
        Schema::create('challenge', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('description');
            $table->string('result');
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('inbox');
    }
}
