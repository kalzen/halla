<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
<<<<<<< HEAD
            $table->integer('dayplan')->default(1500);
            $table->date('date');
            $table->integer('target')->default(1200);
=======
            $table->integer('dayplan');
            $table->date('day');
            $table->integer('target');
>>>>>>> 0be400494de6b3677e925c5080b2fd63275149e6
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schedules');
    }
};
