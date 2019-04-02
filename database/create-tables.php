<?php 

use Illuminate\Database\Capsule\Manager as Capsule;

require_once 'database.php';

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