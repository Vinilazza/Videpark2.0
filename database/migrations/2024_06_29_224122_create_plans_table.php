<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('plans', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->decimal('price', 8, 2)->default(0.00);
        $table->string('type')->default('');
        $table->timestamps();
    });
}

public function down()
{
    Schema::dropIfExists('plans');
}

};
