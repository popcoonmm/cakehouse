<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_lists', function (Blueprint $table) {
            $table->increments('id');
            $table->string('back_number');
            $table->integer('product_number')->nullable();//商品の処理番号
            $table->integer('users_number')->nullable(); //お客様番号
            $table->integer('quantity')->nullable(); //個数
            $table->integer('menu_id')->unsigned(); //商品番号
            $table->foreign('menu_id')->references('id')->on('menus')->onDelete('cascade');//heroku
            $table->integer('user_id')->unsigned(); //購入者
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');//heroku
            $table->integer('price')->nullable();
            $table->string('description')->nullable();
            
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
        Schema::dropIfExists('order_lists');
    }
}
