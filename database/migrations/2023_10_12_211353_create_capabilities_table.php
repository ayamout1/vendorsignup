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
        Schema::create('capabilities', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('vendor_id'); // assuming you have users who will be submitting the form

            // Geographic Service Area
            $table->unsignedInteger('geographic_service_area_miles')->nullable(); // The service area in miles from the terminal

            // Area where mileage charges aren't assessed
            $table->unsignedInteger('no_mileage_charge_area_miles')->nullable();

            // Service Response Times
            $table->string('service_response_time_in_service_area')->nullable(); // Expected format: "3 hours", "1 day", etc.
            $table->string('service_response_time_in_no_charge_area')->nullable();

            // Warranty Limits
            $table->string('workmanship_warranty')->nullable(); // Expected format: "1 year", "6 months", etc.
            $table->string('supplies_materials_warranty')->nullable();

            // Standard Markup
            $table->decimal('standard_markup_percentage', 5, 2)->nullable(); // The percentage of the standard markup. Stored as a decimal.

            // Service Vehicles Equipment Info
            $table->boolean('vehicles_fully_equipped')->nullable(); // True if equipped, False if not, null if information isn't provided
            $table->foreign('vendor_id')->references('id')->on('vendors'); // setting up a foreign key relationship with the vendors table

            // Special Notes
            $table->text('special_notes')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('capabilities');
    }
};
