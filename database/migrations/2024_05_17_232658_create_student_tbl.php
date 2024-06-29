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
        Schema::create('student_tbl', function (Blueprint $table) {
            $table->id();
            $table->string('student_id');
            $table->string('mother_name');
            $table->integer('mother_contact');
            $table->integer('mother_age');
            $table->string('father_name');
            $table->integer('father_contact');
            $table->integer('father_age');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_tbl');
    }
};
