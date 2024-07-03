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
            Schema::create('parking_usages', function (Blueprint $table) {
                $table->id();
                $table->foreignId('user_id')->constrained();
                $table->foreignId('parking_spot_id')->constrained();
                $table->foreignId('plan_id')->constrained();
                $table->timestamp('entry_time');
                $table->timestamp('exit_time')->nullable(); // Campo para registrar a hora de saída
                $table->timestamps();
            });
        
    }

    public function down()
    {
        Schema::dropIfExists('parking_usages');
    }   
    
};
