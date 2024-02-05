<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Desa;
use Illuminate\Http\Request;

class DesaController extends Controller
{
    public function index()
    {
        $data = Desa::paginate(8);
        return view('admin.desa', [
           'title' => 'Data Desa',
           'active' => 'desa',
           'desa' => $data
        ]);
    }

    public function store(Request $request)
    {
        Desa::create(['nama_desa' => $request->nama_desa]);

        return response()->json([
           'status' => 'OK',
           'message' => 'Berhasil menambahkan data.'
        ]);
    }

    public function show($id)
    {
        $desa = Desa::find($id);

        return response()->json([
            'status' => 'OK',
            'nama_desa' => $desa->nama_desa
        ]);
    }

    public function update(Request $request, $id)
    {
        Desa::where('id', $id)->update(['nama_desa' => $request->nama_desa]);

        return response()->json([
            'status' => 'OK',
            'message' => 'Berhasil mengupdate data.'
        ]);
    }

    public function destroy($id)
    {
        Desa::destroy($id);

        return response()->json([
            'status' => 'OK',
            'message' => 'Berhasil menghapus data.'
        ]);
    }
}
