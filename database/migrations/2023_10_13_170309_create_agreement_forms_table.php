<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgreementFormsTable extends Migration
{
    public function up()
    {
        Schema::create('agreement_forms', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('vendor_id');  // Assuming a user is submitting the form
            $table->boolean('is_certified')->default(false); // For the checkbox to certify agreement
            $table->text('signature_path')->nullable();  // Store path to signature image or file
            $table->string('name');  // Name of the person
            $table->string('title');  // Title/position of the person
            $table->timestamp('submitted_at')->nullable();  // Timestamp when the form was submitted
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('vendor_id')->references('id')->on('vendors')->nullable(); // setting up a foreign key relationship with the vendors table
        });
    }

    public function down()
    {
        Schema::dropIfExists('agreement_forms');
    }
}
