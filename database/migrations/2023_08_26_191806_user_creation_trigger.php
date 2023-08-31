<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
        DB::unprepared('CREATE TRIGGER after_user_created AFTER INSERT ON users
        FOR EACH ROW
        BEGIN
            INSERT INTO user_creations (user_id, user_name, created_at)
            VALUES (NEW.id, NEW.user_name, NOW());
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
        DB::unprepared('DROP TRIGGER IF EXISTS after_user_created');
        //
    }
};
