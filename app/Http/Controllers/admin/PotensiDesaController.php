<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Desa;
use App\Models\PotensiDesa;
use Illuminate\Http\Request;

class PotensiDesaController extends Controller
{
    public function index()
    {
        $data = PotensiDesa::with('desa')->paginate(5);
        return view('admin.potensi.index', [
           'title' => 'Potensi Desa',
           'active' => 'potensi',
           'potensi' => $data,
        ]);
    }

    public function create()
    {
        $desa = Desa::all();
        return view('admin.potensi.create', [
            'title' => 'Tambah Potensi Desa',
            'active' => 'potensi',
            'desa' => $desa
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
           'id_desa' => 'required',
           'potensi'  => 'required',
           'video' => 'required|mimes:mp4,mov,avi,wmv'
        ]);

        $video_path = $request->file('video')->store('video', 'public');

        $potensi = new PotensiDesa();
        $potensi->id_desa = $request->id_desa;
        $potensi->potensi = $request->potensi;
        $potensi->path_video = $video_path;

        $potensi->save();

        return redirect('admin/potensi')->with('success', 'Data berhasil disimpan.');
    }

    public function show($id)
    {

    }

    public function edit($id)
    {
        $desa = Desa::all();
        $data = PotensiDesa::with('desa')->where('id', $id)->first();
        return view('admin.potensi.edit', [
            'title' => 'Edit Potensi Desa',
            'active' => 'potensi',
            'desa' => $desa,
            'potensi' => $data
        ]);
    }

    function update(Request $request, $id)
    {
        $request->validate([
            'id_desa' => 'required',
            'potensi'  => 'required',
            'video' => ''
        ]);

        $potensi = PotensiDesa::findOrFail($id);
        $potensi->id_desa = $request->id_desa;
        $potensi->potensi = $request->potensi;

        if ($request->file('video')) {
            $video_path = $request->file('video')->store('video', 'public');
            $potensi->path_video = $video_path;
        }

        $potensi->save();

        return redirect('admin/potensi')->with('success', 'Data berhasil diupdate.');
    }

    public function destroy($id)
    {
        if ($id) {
            PotensiDesa::destroy($id);

            return redirect('admin/potensi')->with('success', 'Data berhasil dihapus.');
        }

        return redirect('admin/potensi')->with('gagal', 'Id tidak ditemukan.');
    }
}
