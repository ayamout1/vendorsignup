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
        Schema::create('vendors', function (Blueprint $table) {
            $table->id();
            $table->string('vendor_name');
            $table->unsignedBigInteger('user_id')->nullable(); // assuming you have users who will be submitting the form
            $table->string('owner_name')->nullable();
            $table->string('owner_phone')->nullable();
            $table->string('vendor_type')->nullable(); // Assuming this isn't a relationship and is just a type. If it is a relationship, consider using an unsignedBigInteger and foreign key.
            $table->string('vendor_phone')->nullable();
            $table->string('vendor_fax')->nullable();
            $table->string('vendor_email')->nullable();
            $table->string('vendor_website')->nullable(); // Websites can be optional
            $table->foreign('user_id')->references('id')->on('users')->nullable(); // setting up a foreign key relationship with the users table
            $table->softDeletes(); // This is the correct method for soft deletes.
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vendors');
    }
};
