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

    public function index()
    {
        $user = User::where('role_id', 2)->count();
        $admin = User::where('role_id', 1)->count();
        return view('admin.home', [
            'title' => 'Dashboard',
            'active' => 'dashboard',
            'user' => $user,
            'admin' => $admin
        ]);
    }
}
