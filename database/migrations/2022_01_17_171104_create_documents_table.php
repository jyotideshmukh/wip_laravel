<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->string('document_path');
            $table->boolean('is_parsed');
            $table->enum('document_type', ['driving_license', 'ehs', 'profile_picture']);
            $table->text('parsed_content')->nullable();
            $table->text('parsed_license_no')->nullable();
            $table->text('parsed_license_expiry_date')->nullable();
            $table->text('parsed_first_name')->nullable();
            $table->text('parsed_last_name')->nullable();
            $table->text('parsed_address')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('documents');
    }
}
