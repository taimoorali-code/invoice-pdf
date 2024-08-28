<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientDetailsTable extends Migration
{
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('client_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id');
            $table->string('accept_language');
            $table->string('browser_ip');
            $table->string('user_agent');
            $table->timestamps();
            
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
        });
        Schema::enableForeignKeyConstraints();

    }


    public function down()
    {
        Schema::dropIfExists('client_details');
    }
}
