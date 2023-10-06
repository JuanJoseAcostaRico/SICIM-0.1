<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('CREATE TRIGGER update_supplies_stock
            AFTER INSERT on movements
            FOR EACH ROW
            BEGIN
                DECLARE IdMovimiento bigint;
                DECLARE StockMovimiento bigint;
                DECLARE TipoMovimiento bigint;

                SET IdMovimiento = NEW.supply_fke;
                SET StockMovimiento = NEW.movement_stock;
                SET TipoMovimiento = NEW.movement_types_fke;

                IF TipoMovimiento = 1 THEN
                    UPDATE supplies
                    SET supply_stock = supply_stock + StockMovimiento
                    WHERE id = IdMovimiento;
                ELSEIF TipoMovimiento = 2 THEN
                    UPDATE supplies
                    SET supply_stock = supply_stock - StockMovimiento
                    WHERE id = IdMovimiento;
                END IF;
            END;');
        //
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER IF EXISTS update_supplies_stock');
        //
    }
};
