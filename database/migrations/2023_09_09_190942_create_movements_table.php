<?php

use Faker\Guesser\Name;
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
        Schema::create('movements', function (Blueprint $table) {
            $table->id();
            $table->string('movement_desc');
            $table->string('movement_stock');

            $table->unsignedBigInteger('movement_types_fke')->nullable();
            $table->foreign('movement_types_fke')
            ->references('id')
            ->on('movement_types')
            ->onDelete('cascade');

            $table->unsignedBigInteger('supply_fke')->nullable();
            $table->foreign('supply_fke')
            ->references('id')
            ->on('supplies')
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
        Schema::dropIfExists('movements');
    }
};
