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
        Schema::create('supplies', function (Blueprint $table) {
            $table->id();

            $table->string('supply_name');
            $table->string('supply_presentation'); // esta es la presentación
            $table->string('supply_weight'); //peso, debe ser de en g, ml, ect.
            $table->string('supply_posology')->nullable();
            $table->string('supply_desc')->nullable();
            $table->string('supply_stock');

            $table->unsignedBigInteger('state_fke')->nullable();
            $table->foreign('state_fke')
            ->references('id')
            ->on('states')
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
        Schema::dropIfExists('supplies');
    }
};
