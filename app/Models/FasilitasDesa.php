<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FasilitasDesa extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'tbl_fasilitas_desa';

    public function desa()
    {
        return $this->belongsTo(Desa::class, 'id_desa', 'id');
    }
}
