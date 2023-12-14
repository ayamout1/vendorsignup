<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateFilePathColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Update AgreementForm table
        Schema::table('agreement_forms', function (Blueprint $table) {
            $table->string('signature_path', 255)->change();
        });


        // Add similar statements for other tables and columns as needed
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Here you can reverse the changes if needed
        // This is usually done by reverting the column types to their previous state
    }
}
