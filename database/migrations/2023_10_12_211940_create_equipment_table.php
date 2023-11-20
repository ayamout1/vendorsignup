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
        Schema::create('equipment', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('vendor_id'); // assuming you have users who will be submitting the form
            $table->string('equipment_type')->nullable();
            $table->string('make_and_model')->nullable();
            $table->string('reach')->nullable(); // Assuming reach could be a string like '20 feet' or '5 meters'
            $table->integer('quantity')->nullable();
            $table->text('notes')->nullable(); // Using text to allow for longer notes, but it can be string if shorter notes are expected.

            $table->foreign('vendor_id')->references('id')->on('vendors')->nullable(); // setting up a foreign key relationship with the vendors table
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('equipment');
    }
};
