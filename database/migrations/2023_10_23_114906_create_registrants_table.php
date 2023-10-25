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
        Schema::create('registrants', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->enum('gender', ['L', 'P']);
            $table->unsignedBigInteger('branch_id');
            $table->unsignedBigInteger('program_id');
            $table->string('transfer_evidence', 255);
            $table->timestamps();
        });

        Schema::table('registrants', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('branch_id')->references('id')->on('branches');
            $table->foreign('program_id')->references('id')->on('programs');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registrants');
    }
};
