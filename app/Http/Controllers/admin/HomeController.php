<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Desa;
use App\Models\FasilitasDesa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $desa = Desa::count();
        $fasilitas = FasilitasDesa::count();
        $user = User::count();
        return view('admin.home', [
            'title' => 'Dashboard',
            'active' => 'dashboard',
            'desa' => $desa,
            'fasilitas' => $fasilitas,
            'user' => $user
        ]);
    }
}
