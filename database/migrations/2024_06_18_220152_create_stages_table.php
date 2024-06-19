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
        Schema::create('stages', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('schedule_id');
<<<<<<< HEAD
            $table->integer('input')->default(0);
            $table->integer('defect')->default(0);
            $table->integer('status')->default(1);
=======
            $table->integer('input');
            $table->integer('defect');
>>>>>>> 0be400494de6b3677e925c5080b2fd63275149e6
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stages');
    }
};
