<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('text');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('test')->nullable();
            $table->string('image')->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('category_id')->on('categories')->references('id');
            $table->foreign('test')->on('articles')->references('id');
        });
    }

    public function down()
    {
        Schema::dropIfExists('articles');
    }
};
