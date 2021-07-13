<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNewKolomToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('status_user');
            $table->string('foto_guru');
            $table->longText('nomor_Hp');
            $table->string('mapel');
            $table->string('nomor_rekening');
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
            $table->dropColumn('status_guru');
            $table->dropColumn('foto_guru');
            $table->dropColumn('nomor_Hp');
            $table->dropColumn('mapel');
            $table->dropColumn('nomor_rekening');
        });
    }
}
