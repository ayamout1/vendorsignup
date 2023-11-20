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
        Schema::create('insurances', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('vendor_id'); // assuming you have users who will be submitting the form
            // Vehicle Insurance Fields
            $table->string('vehicle_file')->nullable(); // Assuming this is a file path. Use nullable() if it can be optional.
            $table->date('vehicle_effective_date')->nullable();
            $table->date('vehicle_expiration_date')->nullable();

            // General Liability Insurance Fields
            $table->string('general_liability_file')->nullable();
            $table->date('general_effective_date')->nullable();
            $table->date('general_expiry_date')->nullable();

            // Worker Insurance Fields
            $table->string('worker_file')->nullable();
            $table->date('worker_effective_date')->nullable();
            $table->date('worker_expiry_date')->nullable();
            $table->foreign('vendor_id')->references('id')->on('vendors')->nullable(); // setting up a foreign key relationship with the vendors table

            $table->softDeletes(); // Correct method for soft deletes
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('insurances');
    }
};
