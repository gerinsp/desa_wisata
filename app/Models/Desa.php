<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Desa extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'tbl_desa';

    public function fasilitas()
    {
        return $this->hasMany(FasilitasDesa::class, 'id_desa', 'id');
    }
    public function kegiatan()
    {
        return $this->hasMany(KegiatanDesa::class, 'id_desa', 'id');
    }
    public function potensi()
    {
        return $this->hasOne(PotensiDesa::class, 'id_desa', 'id');
    }
    public function profil()
    {
        return $this->hasOne(ProfilDesa::class, 'id_desa', 'id');
    }
}
