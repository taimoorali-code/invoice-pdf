<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShippingAddressesTable extends Migration
{
    public function up()
    {
        Schema::create('shipping_addresses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('address1');
            $table->string('address2')->nullable();
            $table->string('city');
            $table->string('province')->nullable();
            $table->string('zip');
            $table->string('country');
            $table->string('phone');
            $table->timestamps();
            
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('shipping_addresses');
    }
}
