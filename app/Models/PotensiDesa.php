<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PotensiDesa extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'tbl_potensi_desa';

    public function desa()
    {
        return $this->hasOne(Desa::class, 'id', 'id_desa');
    }
}
