<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJamtidakbersediasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jamtidakbersedias', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_slotjam')->constrained('slotjams')->onDelete('cascade');//FK
            $table->foreignId('id_dosen')->constrained('dosens')->onDelete('cascade');//FK
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jamtidakbersedias');
    }
}
