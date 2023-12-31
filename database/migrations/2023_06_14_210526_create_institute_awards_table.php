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
        Schema::create('institute_awards', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('awards_id')->nullable();
            $table->unsignedBigInteger('institutions_id')->nullable();
            $table->string('description')->nullable();
            $table->foreign('awards_id')->references('id')
                    ->on('awards')->onDelete('cascade');
            $table->foreign('institutions_id')->references('id')
                    ->on('institutions')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('institute_awards');
    }
};
