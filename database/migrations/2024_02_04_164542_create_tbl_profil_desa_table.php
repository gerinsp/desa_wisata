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
            $table->text('maps');
            $table->longText('foto_profil')->nullable();
            $table->longText('gambar1')->nullable();
            $table->longText('gambar2')->nullable();
            $table->longText('gambar3')->nullable();
            $table->longText('gambar4')->nullable();
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
