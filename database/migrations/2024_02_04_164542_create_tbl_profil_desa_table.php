<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblProfilDesaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_profil_desa', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_desa');
            $table->text('deskripsi');
            $table->string('latitude');
            $table->string('longitude');
            $table->string('gambar1');
            $table->string('gambar2');
            $table->string('gambar3');
            $table->string('gambar4');
            $table->string('path_video');
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
        Schema::dropIfExists('tbl_profil_desa');
    }
}
