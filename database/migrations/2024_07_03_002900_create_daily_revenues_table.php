<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDailyRevenuesTable extends Migration
{
    public function up()
    {
        Schema::create('daily_revenues', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->decimal('revenue', 10, 2); // Altere se necessário para o tipo correto
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('daily_revenues');
    }
}
