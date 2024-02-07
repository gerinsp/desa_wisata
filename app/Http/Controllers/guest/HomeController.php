<?php

namespace App\Http\Controllers\guest;

use App\Http\Controllers\Controller;
use App\Models\Desa;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $data = Desa::all();
        return view('guest.home', [
            'title' => 'Desa Wisata Kabupaten Tegal',
            'desa' => $data
        ]);
    }
    public function desa($id)
    {
        $desa = Desa::with(['fasilitas', 'kegiatan', 'potensi', 'profil'])->find($id);
        if (!$desa) {
            return abort(404);
        }
        return view('guest.desa', [
            'title' => $desa->nama_desa,
            'desa' => $desa
        ]);
    }
}
