<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Desa;
use App\Models\FasilitasDesa;
use App\Models\KegiatanDesa;
use Illuminate\Http\Request;

class KegiatanController extends Controller
{
    public function index()
    {
        $desa = Desa::all();
        $data = KegiatanDesa::with('desa')->paginate(8);
        return view('admin.kegiatan', [
            'title' => 'Data Kegiatan',
            'active' => 'kegiatan',
            'kegiatan' => $data,
            'desa' => $desa
        ]);
    }

    public function store(Request $request)
    {
        $data = [
            'id_desa' => $request->id_desa,
            'kegiatan' => $request->kegiatan,
            'tanggal' => $request->tanggal
        ];

        KegiatanDesa::create($data);

        return response()->json([
            'status' => 'OK',
            'message' => 'Berhasil menambahkan data.'
        ]);
    }

    public function show($id)
    {
        $kegiatan = KegiatanDesa::with('desa')->find($id);

        return response()->json([
            'status' => 'OK',
            'data' => $kegiatan
        ]);
    }

    public function update(Request $request, $id)
    {
        $data = [
            'id_desa' => $request->id_desa,
            'kegiatan' => $request->kegiatan,
            'tanggal' => $request->tanggal
        ];

        KegiatanDesa::where('id', $id)->update($data);

        return response()->json([
            'status' => 'OK',
            'message' => 'Berhasil mengupdate data.'
        ]);
    }

    public function destroy($id)
    {
        KegiatanDesa::destroy($id);

        return response()->json([
            'status' => 'OK',
            'message' => 'Berhasil menghapus data.'
        ]);
    }
}
