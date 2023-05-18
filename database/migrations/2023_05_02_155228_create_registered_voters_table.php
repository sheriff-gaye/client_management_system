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
        Schema::create('registered_voters', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('username');
            $table->string('sex');
            $table->string('email');
            $table->integer('student_id');
            $table->string('profile');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registered_voters');
    }
};
