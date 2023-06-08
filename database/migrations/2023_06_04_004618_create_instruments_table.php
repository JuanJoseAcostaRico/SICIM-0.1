<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('instruments', function (Blueprint $table) {
            $table->id();
            $table->string('instrument_name');
            $table->string('instrument_size');
            $table->string('instrument_desc');
            $table->string('instrument_stock');

            $table->unsignedBigInteger('departament_fke')->nullable();
            $table->foreign('departament_fke')
            ->references('id')
            ->on('departaments')
            ->onDelete('cascade');

            $table->unsignedBigInteger('condition_fke')->nullable();
            $table->foreign('condition_fke')
            ->references('id')
            ->on('conditions')
            ->onDelete('cascade');
            
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
        Schema::dropIfExists('instruments');
    }
};
