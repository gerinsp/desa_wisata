<?php

namespace Database\Seeders;

use App\Models\Desa;
use App\Models\FasilitasDesa;
use App\Models\KegiatanDesa;
use App\Models\PotensiDesa;
use App\Models\ProfilDesa;
use App\Models\Role;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(1)->create();

        Role::factory()->admin()->create();
        Role::factory()->superAdmin()->create();

        Desa::create([
            'id' => 1,
            'nama_desa' => 'Cempaka'
        ]);

//        ProfilDesa::create([
//            'id_desa' => 1,
//            'deskripsi' => `<p><strong style="margin: 0px; padding: 0px; font-family: "Open Sans", Arial, sans-serif; font-size: 14px; text-align: justify;">Lorem Ipsum</strong><span style="font-family: "Open Sans", Arial, sans-serif; font-size: 14px; text-align: justify;"> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span><br></p>`,
//            'maps' => `<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31668.21531204931!2d109.0473719157825!3d-7.180552488837705!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6f91c1cc716295%3A0xbb5fae114078b2e3!2sCempaka%2C%20Kecamatan%20Bumijawa%2C%20Kabupaten%20Tegal%2C%20Jawa%20Tengah!5e0!3m2!1sid!2sid!4v1707382595448!5m2!1sid!2sid" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>`,
//            'foto_profil' => '',
//            'gambar1' => '',
//            'gambar2' => '',
//            'gambar3' => '',
//            'gambar4' => '',
//        ]);

        FasilitasDesa::create([
            'id_desa' => 1,
            'fasilitas' => 'Mushola',
        ]);

        FasilitasDesa::create([
            'id_desa' => 1,
            'fasilitas' => 'Tempat Makan',
        ]);

        FasilitasDesa::create([
            'id_desa' => 1,
            'fasilitas' => 'Spot Foto',
        ]);

        KegiatanDesa::create([
            'id_desa' => 1,
            'tanggal' => now(),
            'kegiatan' => 'Kemping'
        ]);

//        PotensiDesa::create([
//            'id_desa' => 1,
//            'potensi' => `<p><strong style="margin: 0px; padding: 0px; font-family: "Open Sans", Arial, sans-serif; font-size: 14px; text-align: justify;">Lorem Ipsum</strong><span style="font-family: "Open Sans", Arial, sans-serif; font-size: 14px; text-align: justify;"> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span><br></p>`,
//            'path_video' => 'yAf1Hpyi3-M',
//        ]);
    }
}
