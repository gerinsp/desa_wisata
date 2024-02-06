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
    public function list_desa()
    {
        $data = Desa::all();
        return view('guest.list-desa', [
            'title' => 'List Desa Wisata Kabupaten Tegal',
            'desa' => $data
        ]);
    }
}
