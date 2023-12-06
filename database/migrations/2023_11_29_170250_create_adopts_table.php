<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adopts', function (Blueprint $table) {
            $table->id();
            $table->string("title")-> nullable();
            $table->string("type")-> nullable();
            $table->string("breed")-> nullable();
            $table->string("color")-> nullable();
            $table->string('age')-> nullable();
            $table->string("gender")-> nullable();
            $table->string("personality")-> nullable();
            $table->string("image")-> nullable();
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
        Schema::dropIfExists('adopts');
    }
};
