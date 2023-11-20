<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateW9SubmissionsTable extends Migration
{
    public function up()
    {
        Schema::create('w9_submissions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('vendor_id'); // assuming you have users who will be submitting the form
            $table->string('file_path')->nullable(); // stores the path of the uploaded W9 document
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('vendor_id')->references('id')->on('vendors')->nullable(); // setting up a foreign key relationship with the vendors table
        });
    }

    public function down()
    {
        Schema::dropIfExists('w9_submissions');
    }
}
