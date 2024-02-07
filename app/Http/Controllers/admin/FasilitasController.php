<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Desa;
use App\Models\FasilitasDesa;
use Illuminate\Http\Request;

class FasilitasController extends Controller
{
    public function index()
    {
        $desa = Desa::all();
        $data = FasilitasDesa::with('desa')->paginate(8);
        return view('admin.fasilitas', [
            'title' => 'Data Fasilitas',
            'active' => 'fasilitas',
            'fasilitas' => $data,
            'desa' => $desa
        ]);
    }

    public function store(Request $request)
    {
        $data = [
            'id_desa' => $request->id_desa,
            'fasilitas' => $request->fasilitas
        ];

        FasilitasDesa::create($data);

        return response()->json([
            'status' => 'OK',
            'message' => 'Berhasil menambahkan data.'
        ]);
    }

    public function show($id)
    {
        $fasilitas = FasilitasDesa::with('desa')->find($id);

        return response()->json([
            'status' => 'OK',
            'data' => $fasilitas
        ]);
    }

    public function update(Request $request, $id)
    {
        $data = [
            'id_desa' => $request->id_desa,
            'fasilitas' => $request->fasilitas
        ];

        FasilitasDesa::where('id', $id)->update($data);

        return response()->json([
            'status' => 'OK',
            'message' => 'Berhasil mengupdate data.'
        ]);
    }

    public function destroy($id)
    {
        FasilitasDesa::destroy($id);

        return response()->json([
            'status' => 'OK',
            'message' => 'Berhasil menghapus data.'
        ]);
    }
}
