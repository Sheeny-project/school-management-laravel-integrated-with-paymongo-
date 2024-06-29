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
        Schema::create('section_tbl', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('slot');
            $table->integer('room_id');
            $table->time('time_in');
            $table->time('time_out');
            $table->integer('day_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('section_tbl');
    }
};
