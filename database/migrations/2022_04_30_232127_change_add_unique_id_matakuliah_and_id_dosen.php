<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeAddUniqueIdMatakuliahAndIdDosen extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pengampus', function (Blueprint $table) {
            $table->unique(['id_matakuliah', 'id_dosen','kelas']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pengampus', function (Blueprint $table) {
            $table->dropUnique(['id_matakuliah', 'id_dosen']);
        });
    }
}
