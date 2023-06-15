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
        Schema::create('scholars_institutes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('scholars_id')->nullable();
            $table->unsignedBigInteger('institutions_id')->nullable();
            $table->string('relation_title')->nullable();
            $table->string('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('scholars_institutes');
    }
};
