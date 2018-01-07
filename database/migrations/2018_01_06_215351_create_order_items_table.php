<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_items', function (Blueprint $table) {
            $table->integer('order_id')->unsigned();
            $table->integer('item_id')->unsigned();
            $table->integer('quantity')->unsigned();

            $table->foreign('order_id')->references('id')->on('orders');
            $table->foreign('item_id')->references('id')->on('items');
            
            $table->primary(array('order_id', 'item_id'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_items');
    }
}
