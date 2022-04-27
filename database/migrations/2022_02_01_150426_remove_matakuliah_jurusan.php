<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveMatakuliahJurusan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('jurusan_matakuliah', function (Blueprint $table) {
            // Better
            $table->dropIfExists('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('jurusan_matakuliah', function (Blueprint $table) {
            $table->foreignId('id_matakuliah')->constrained('matakuliahs')->onDelete('cascade');//FK
            $table->foreignId('id_jurusan')->constrained('jurusans')->onDelete('cascade');//FK
            $table->timestamps();
        });
    }
}
