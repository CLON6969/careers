<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('home', function (Blueprint $table) {
            $table->id();
            $table->string('background_picture'); // To store the background picture
            $table->string('title1');
            $table->text('title1_content');
            $table->string('title2');
            $table->text('title2_content');
            $table->string('button1_name'); // button1_name
            $table->string('button1_url'); // button1_url
            $table->string('title3'); // title3
            $table->text('title3_content'); // title3_content
            $table->string('background_picture2'); // For the image
            $table->string('button2_name'); // button1_name
            $table->string('button2_url'); // button1_url
            $table->timestamps(); // created_at and updated_at time
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('home');
    }
};
