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
        Schema::create('education_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('scholars_id')->nullable();
            $table->unsignedBigInteger('institutions_id')->nullable();
            $table->unsignedBigInteger('educations_catagories_id')->nullable();
            $table->string('detail_description')->nullable();
            $table->date('years_start')->nullable();
            $table->data('years_end')->nullable();
            $table->foreign('scholars_id')->references('id')
                   ->on('scholars')
                   ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('education_details');
    }
};
