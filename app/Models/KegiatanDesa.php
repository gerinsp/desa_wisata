<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KegiatanDesa extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'tbl_kegiatan_desa';

    public function desa()
    {
        return $this->belongsTo(Desa::class, 'id_desa', 'id');
    }
}
