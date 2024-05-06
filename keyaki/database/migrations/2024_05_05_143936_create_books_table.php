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
        Schema::create('books', function (Blueprint $table) {
            $table->id();

            //user_idカラムは、usersテーブルのidカラムの外部キー
            $table->bigInteger('user_id')->unsigned()->index();
            $table->string('title', 100);
            $table->string('author', 100)->nullable();
            $table->string('publisher', 100)->nullable();
            $table->text('review')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            
            //foreign    : カラムに外部キー制約を追加
            //references : カラムが参照する外部キーの対象となるカラムを指定
            //on         : 外部キー制約が参照するテーブルを指定
            /*onDelete   : 参照先のレコードが削除された場合の動作を指定。
                           cascade を指定すると、参照されているレコードが削除された際に、このテーブルの関連する行も一緒に削除*/
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
