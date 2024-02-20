<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Desa;
use App\Models\PotensiDesa;
use App\Models\ProfilDesa;
use Illuminate\Http\Request;

class ProfilDesaController extends Controller
{
    public function index()
    {
        $data = ProfilDesa::with('desa')->paginate(8);
        return view('admin.profil.index', [
           'title' => 'Profil Desa',
           'active' => 'profil',
           'profil' => $data
        ]);
    }

    public function create()
    {
        $desa = Desa::all();
        return view('admin.profil.create', [
            'title' => 'Lengkapi Profil Desa',
            'active' => 'profil',
            'desa' => $desa
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_desa' => 'required',
            'deskripsi' => 'required',
            'foto_profil' => 'required|image',
            'gambar1' => 'required|image',
            'gambar2' => 'required|image',
            'gambar3' => 'required|image',
            'gambar4' => 'required|image',
            'maps' => 'required'
        ]);

        $maps = $request->maps;

        $fotoProfil = $request->file('foto_profil');
        $fotoProfilBase64 = base64_encode(file_get_contents($fotoProfil->path()));

        $gambar1 = $request->file('gambar1');
        $gambar1Base64 = base64_encode(file_get_contents($gambar1->path()));

        $gambar2 = $request->file('gambar2');
        $gambar2Base64 = base64_encode(file_get_contents($gambar2->path()));

        $gambar3 = $request->file('gambar3');
        $gambar3Base64 = base64_encode(file_get_contents($gambar3->path()));

        $gambar4 = $request->file('gambar4');
        $gambar4Base64 = base64_encode(file_get_contents($gambar4->path()));

        $desa = new ProfilDesa();
        $desa->id_desa = $request->id_desa;
        $desa->deskripsi = $request->deskripsi;
        $desa->foto_profil = $fotoProfilBase64;
        $desa->gambar1 = $gambar1Base64;
        $desa->gambar2 = $gambar2Base64;
        $desa->gambar3 = $gambar3Base64;
        $desa->gambar4 = $gambar4Base64;
        $desa->maps = $maps;

        $desa->save();

        return redirect('admin/profil')->with('success', 'Data berhasil disimpan.');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $desa = Desa::all();
        $data = ProfilDesa::with('desa')->where('id', $id)->first();
        return view('admin.profil.edit', [
            'title' => 'Edit Profil Desa',
            'active' => 'profil',
            'desa' => $desa,
            'profil' => $data
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_desa' => 'required',
            'deskripsi' => 'required',
            'foto_profil' => '',
            'gambar1' => '',
            'gambar2' => '',
            'gambar3' => '',
            'gambar4' => '',
            'maps' => 'required',
        ]);
        $desa = ProfilDesa::findOrFail($id);
        $desa->id_desa = $request->id_desa;
        $desa->deskripsi = $request->deskripsi;

        $maps = preg_replace('/[?&]?(width|height)=\d+/', '', $request->maps);

        $fotoProfil = $request->file('foto_profil');
        if ($fotoProfil) {
            $fotoProfilBase64 = base64_encode(file_get_contents($fotoProfil->path()));
            $desa->foto_profil = $fotoProfilBase64;
        }
        $gambar1 = $request->file('gambar1');
        if ($gambar1) {
            $gambar1Base64 = base64_encode(file_get_contents($gambar1->path()));
            $desa->gambar1 = $gambar1Base64;
        }
        $gambar2 = $request->file('gambar2');
        if($gambar2) {
            $gambar2Base64 = base64_encode(file_get_contents($gambar2->path()));
            $desa->gambar2 = $gambar2Base64;
        }
        $gambar3 = $request->file('gambar3');
        if ($gambar3) {
            $gambar3Base64 = base64_encode(file_get_contents($gambar3->path()));
            $desa->gambar3 = $gambar3Base64;
        }
        $gambar4 = $request->file('gambar4');
        if ($gambar4) {
            $gambar4Base64 = base64_encode(file_get_contents($gambar4->path()));
            $desa->gambar4 = $gambar4Base64;
        }

        $desa->maps = $maps;

        $desa->save();

        return redirect('admin/profil')->with('success', 'Data berhasil diupdate.');
    }

    public function destroy($id)
    {
        if ($id) {
            ProfilDesa::destroy($id);

            return redirect('admin/profil')->with('success', 'Data berhasil dihapus.');
        }

        return redirect('admin/profil')->with('gagal', 'Id tidak ditemukan.');
    }
}
