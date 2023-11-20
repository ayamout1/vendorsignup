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
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('vendor_id'); // assuming you have users who will be submitting the form
            $table->string('address')->nullable();
            $table->string('address2')->nullable(); // The second address line is often optional.
            $table->string('city')->nullable();
            $table->string('state')->nullable(); // Consider using enum or a dedicated table if there's a fixed list of states.
            $table->string('postal')->nullable();
            $table->string('country')->nullable(); // Consider using a dedicated table if handling multiple countries.
            $table->string('address_type')->nullable(); // For instance: 'billing', 'shipping', etc. Consider using enum if there's a fixed list.
            $table->foreign('vendor_id')->references('id')->on('vendors')->nullable(); // setting up a foreign key relationship with the vendors table

            $table->softDeletes(); // This is the correct method for soft deletes.
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('addresses');
    }
};
