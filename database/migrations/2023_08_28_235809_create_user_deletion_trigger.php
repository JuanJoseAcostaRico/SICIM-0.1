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
        DB::unprepared('CREATE TRIGGER after_user_deleted AFTER DELETE ON users
        FOR EACH ROW
        BEGIN
            INSERT INTO user_deletions (user_id, user_name, created_at, deleted_at)
            VALUES (OLD.id, OLD.user_name, NOW(), NOW());
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
        DB::unprepared('DROP TRIGGER IF EXISTS after_user_deleted');
    }
};
