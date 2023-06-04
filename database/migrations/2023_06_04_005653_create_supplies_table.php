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

            $table->unsignedBigInteger('state_fke')->nullable();
            $table->foreign('state_fke')
            ->references('id')
            ->on('states')
            ->onDelete('cascade');

            $table->string('supply_name');
            $table->string('supply_weight');
            $table->string('supply_posology');
            $table->string('supply_desc');
            $table->string('supply_stock');
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
