<?php 

use Illuminate\Database\Capsule\Manager as Capsule;

require_once 'config.php';

Capsule::schema()->create('users', function ($table) {
    $table->increments('id');
    $table->string('name');
    $table->string('email')->unique();
    $table->string('password');
    $table->boolean('active');
    $table->date('email_verified_at')->nullable();
    $table->string('email_verification_token')->nullable();
    $table->timestamps();
});

Capsule::schema()->create('categories', function ($table) {
    $table->increments('id');
    $table->string('name');
    $table->string('slug')->unique();
    $table->boolean('active');
    $table->timestamps();
});

Capsule::schema()->create('products', function ($table) {
    $table->increments('id');
    $table->string('title');
    $table->integer('category_id');
    $table->string('slug')->unique();
    $table->text('description');
    $table->float('price');
    $table->float('sale_price');
    $table->string('image');
    $table->boolean('active');
    $table->boolean('active_on_slider');
    $table->timestamps();
});

Capsule::schema()->create('orders', function ($table) {
    $table->increments('id');
    $table->integer('user_id');
    $table->string('name');
    $table->string('email');
    $table->string('phone');
    $table->text('billing_address');
    $table->float('total_amount');
    $table->string('payment_status');
    $table->string('payment_details');
    $table->timestamps();
});

Capsule::schema()->create('order_products', function ($table) {
    $table->increments('id');
    $table->integer('order_id');
    $table->integer('product_id');
    $table->integer('quantity');
    $table->float('price');
    $table->timestamps();
});