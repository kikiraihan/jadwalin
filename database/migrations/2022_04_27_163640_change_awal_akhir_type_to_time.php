<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeAwalAkhirTypeToTime extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('slotjams', function (Blueprint $table) {
            $table->time('awal')->change();
            $table->time('akhir')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('slotjams', function (Blueprint $table) {
            $table->string('awal')->change();
            $table->string('akhir')->change();
        });
    }
}
