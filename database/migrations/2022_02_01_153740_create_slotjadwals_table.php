<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSlotjadwalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('slotjadwals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_slot_jam')->constrained('slotjams')->onDelete('cascade');//FK
            $table->foreignId('id_jurusan')->constrained('jurusans')->onDelete('cascade');//FK
            $table->foreignId('id_ruangan')->constrained('ruangans')->onDelete('cascade');//FK
            $table->foreignId('id_pengampu')->constrained('pengampus')->onDelete('cascade');//FK
            $table->enum('kelas',['A','B','C','D','E']);
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
        Schema::dropIfExists('slotjadwals');
    }
}
