@extends('layouts.guest.app')

@section('content')
<div class="container position-relative mt-3">
    <div class="row">
        <div class="col-12 col-md-6">
            <h1 class="mb-0">{{ $desa->nama_desa }}</h1>
            <div class="d-flex gap-2 align-items-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt"
                    viewBox="0 0 16 16">
                    <path
                        d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A32 32 0 0 1 8 14.58a32 32 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10" />
                    <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4m0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                </svg>
                <div class="mt-1">Cempaka, Kabupaten Tegal, Jawa Tengah</div>
            </div>
        </div>
        <div class="col-12 col-md-6 peta">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15834.108385196101!2d109.05771475969262!3d-7.180531545686707!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6f91c1cc716295%3A0xbb5fae114078b2e3!2sCempaka%2C%20Kecamatan%20Bumijawa%2C%20Kabupaten%20Tegal%2C%20Jawa%20Tengah!5e0!3m2!1sid!2sid!4v1707293953583!5m2!1sid!2sid"
                style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <div class="col-12 mt-3" x-data="{
            active: 'profil',
            setActive(param){
                this.active = param
            }
        }">
            <ul class="nav nav-pills border-bottom border-4 pb-1 mb-2">
                <li class="nav-item">
                    <button class="nav-link" :class="active === 'profil' ? 'active' : ''"
                        @click="setActive('profil')">Profil</button>
                </li>
                <li class="nav-item">
                    <button class="nav-link" :class="active === 'fasilitas' ? 'active' : ''"
                        @click="setActive('fasilitas')">Fasilitas</button>
                </li>
                <li class="nav-item">
                    <button class="nav-link" :class="active === 'potensi' ? 'active' : ''"
                        @click="setActive('potensi')">Potensi</button>
                </li>
                <li class="nav-item">
                    <button class="nav-link" :class="active === 'kegiatan' ? 'active' : ''"
                        @click="setActive('kegiatan')">Kegiatan</button>
                </li>
            </ul>
            <template x-if="active === 'profil'">
                <div class="row">
                    <iframe class="profil-iframe" src="{{ $desa->profil->path_video }}" title="YouTube video player"
                        frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        allowfullscreen></iframe>
                    <div class="col-12 col-md-8 text-md-center mx-auto mt-3 mb-4">
                        {{ $desa->profil->deskripsi }}
                    </div>
                    <div class="row m-0 p-0">
                        <div class="col-12 col-sm-6 col-md-3 p-0">
                            <img src="{{ asset('img/' . $desa->profil->gambar1) }}" alt="Dokumentasi Lokasi"
                                class="w-100">
                        </div>
                        <div class="col-12 col-sm-6 col-md-3 p-0">
                            <img src="{{ asset('img/' . $desa->profil->gambar2) }}" alt="Dokumentasi Lokasi"
                                class="w-100">
                        </div>
                        <div class="col-12 col-sm-6 col-md-3 p-0">
                            <img src="{{ asset('img/' . $desa->profil->gambar3) }}" alt="Dokumentasi Lokasi"
                                class="w-100">
                        </div>
                        <div class="col-12 col-sm-6 col-md-3 p-0">
                            <img src="{{ asset('img/' . $desa->profil->gambar4) }}" alt="Dokumentasi Lokasi"
                                class="w-100">
                        </div>
                    </div>
                </div>
            </template>
            <template x-if="active === 'fasilitas'">
                <div>fasilitas...</div>
            </template>
            <template x-if="active === 'potensi'">
                <div>potensi...</div>
            </template>
            <template x-if="active === 'kegiatan'">
                <div>kegiatan...</div>
            </template>
        </div>
    </div>
</div>
@endsection