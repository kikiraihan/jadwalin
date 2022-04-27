<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPenanggungJawabRemoveperiodeCollumnOnPengampus extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pengampus', function (Blueprint $table) {
            $table->dropColumn('periode');
            $table->boolean('penanggung_jawab')->default(false);
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
            $table->dropColumn('penanggung_jawab');
            $table->string('periode')->nullable();
        });
    }
}
