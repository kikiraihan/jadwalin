<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddKelasOnPengampus extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pengampus', function (Blueprint $table) {
            $table->enum('kelas',['A','B','C','D','E']);
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
            $table->dropColumn('kelas');
        });
    }
}
