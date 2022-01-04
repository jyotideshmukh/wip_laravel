<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicationDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('application_details', function (Blueprint $table) {
            $table->id();
            $table->string('prefix')->nullable(true);
            $table->string('firstname');
            $table->string('middlename')->nullable(true);
            $table->string('lastname');
            $table->string('email');
            $table->timestamp('birthdate');
            $table->enum('gender',['male','female','other']);
            $table->string('street_address');
            $table->string('apartment');
            $table->string('city');
            $table->string('state');
            $table->string('zip');
            $table->foreignId('application_id')->references('id')->on('applications');;
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
        Schema::dropIfExists('application_details');
    }
}
