<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AddRoleFkToUsersTable extends Migration
{
    public function up() : void
    {
        Schema::table(
            'users',
            static function (Blueprint $table) {
                $table->renameColumn('role', 'role_');
                $table
                    ->foreignId('role_id')
                    ->after('email')
                    ->constrained();
            }
        );

        DB::table('users')
            ->update(['role_id' => DB::raw('role_')]);

        Schema::table(
            'users',
            static function (Blueprint $table) {
                $table->renameColumn('role_id', 'role');
                $table->dropColumn('role_');
            }
        );
    }

    public function down() : void
    {
        Schema::table(
            'users',
            static function (Blueprint $table) {
                $table->dropForeign('users_role_id_foreign');
                $table->renameColumn('role', 'role_');
                $table->integer('role')->after('email');
            }
        );

        DB::table('users')
            ->update(['role' => DB::raw('role_')]);

        Schema::table(
            'users',
            static function (Blueprint $table) {
                $table->dropColumn('role_');
            }
        );
    }
}
