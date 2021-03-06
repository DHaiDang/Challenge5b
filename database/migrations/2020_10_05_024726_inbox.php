<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Inbox extends Migration
{
    public function up() {
        Schema::create('inbox', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('message');
            $table->integer('idSend');
            $table->integer('idReceive');
            $table->timestamps();
        });
    }
    public function down() {
        Schema::dropIfExists('inbox');
    }
}
