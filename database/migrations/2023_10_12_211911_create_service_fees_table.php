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
        Schema::create('service_fees', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('vendor_id'); // assuming you have users who will be submitting the form
            // Fee Information
            $table->decimal('concrete_per_yard', 8, 2)->nullable(); // Fees are generally in decimal format to accommodate cents.
            $table->decimal('rebar', 8, 2)->nullable();
            $table->decimal('survey', 8, 2)->nullable();
            $table->decimal('permit_staff_per_hour', 8, 2)->nullable();
            $table->decimal('neon_per_unit_general', 8, 2)->nullable();
            $table->decimal('backhoe_minimum', 8, 2)->nullable();
            $table->decimal('auger_minimum', 8, 2)->nullable();
            $table->decimal('industrial_crane_minimum', 8, 2)->nullable();
            $table->decimal('high_risk_staging', 8, 2)->nullable();
            $table->decimal('truck_1_technician_per_hour', 8, 2)->nullable();
            $table->decimal('truck_2_technician_per_hour', 8, 2)->nullable();
            $table->softDeletes();
            $table->foreign('vendor_id')->references('id')->on('vendors')->nullable(); // setting up a foreign key relationship with the vendors table
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_fees');
    }
};
