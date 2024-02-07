<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfilDesa extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'tbl_profil_desa';

    public function desa()
    {
        return $this->hasOne(Desa::class, 'id', 'id_desa');
    }
}
