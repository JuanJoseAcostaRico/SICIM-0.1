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
            $table->integer('supply_weight');

            $table->unsignedBigInteger('unit_fke')->nullable();
            $table->foreign('unit_fke')
            ->references('id')
            ->on('units')
            ->onDelete('cascade');

            $table->string('supply_posology')->nullable();
            $table->string('supply_desc')->nullable();
            $table->string('supply_stock');

            $table->unsignedBigInteger('presentation_fke')->nullable();
            $table->foreign('presentation_fke')
            ->references('id')
            ->on('presentations')
            ->onDelete('cascade');

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
