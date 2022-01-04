<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParamMastersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('param_masters', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('unit');
            $table->text('description');
            $table->integer('display_order');
            $table->tinyInteger('is_active');
            $table->timestamp('active_date');
            $table->foreignId('parent_id')->nullable(true);
            $table->string('default_type')->default('text');
            $table->json('param_choices');
            $table->foreignId('created_by');
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
        Schema::dropIfExists('param_masters');
    }
}
