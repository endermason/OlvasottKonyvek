<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAdminToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table -> boolean('admin') -> default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            // Jeśli chcemy usunąć kolumnę z tabeli, to musimy najpierw usunąć wszystkie klucze obce, które odnoszą się do tej kolumny.
            $table -> dropColumn('admin');
        });
    }
}
