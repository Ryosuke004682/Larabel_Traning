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
        //MVCでの、Mに当たるところ。
        //どんなカラムを作成すんのかを定義
        
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('title'); //表題
            $table->string('author'); //著者名
            $table->date('published_on'); //発行日
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
        Schema::dropIfExists('books');
    }
};
