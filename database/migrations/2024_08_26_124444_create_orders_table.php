<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('admin_graphql_api_id');
            $table->unsignedBigInteger('app_id');
            $table->string('browser_ip')->nullable();
            $table->boolean('buyer_accepts_marketing');
            $table->string('cancel_reason')->nullable();
            $table->timestamp('cancelled_at')->nullable();
            $table->string('cart_token');
            $table->unsignedBigInteger('checkout_id');
            $table->string('checkout_token');
            $table->string('confirmation_number');
            $table->boolean('confirmed');
            $table->string('contact_email');
            // $table->timestamp('created_at')->nullable();
            $table->string('currency');
            $table->decimal('current_subtotal_price', 10, 2);
            $table->decimal('current_total_discounts', 10, 2);
            $table->decimal('current_total_price', 10, 2);
            $table->decimal('current_total_tax', 10, 2);
            $table->string('customer_locale');
            $table->timestamps();
        });
        Schema::enableForeignKeyConstraints();

    }

    public function down()
    {
        Schema::dropIfExists('orders');
    }
}

