@extends('layouts.guest.app')

@section('content')
<!-- Hero -->
<div class="p-5 text-center bg-image rounded-3 hero" style="background-image: url('{{ asset('img/hero.jpg') }}');">
    <div class="mask" style="background-color: rgba(0, 0, 0, 0.1);">
        <nav class="navbar bg-white border-body text-white">
            <div class="container">
                <div class="navbar-brand">
                    <img src="{{ asset('img/logo.png') }}" alt="Logo Kabupaten Tegal" width="30" height="30">
                </div>
                <div class="d-flex gap-3">
                    <a href="{{ route('login') }}" class="btn btn-outline-primary d-flex justify-content-evenly align-items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-box-arrow-in-right" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M6 3.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 0-1 0v2A1.5 1.5 0 0 0 6.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-8A1.5 1.5 0 0 0 5 3.5v2a.5.5 0 0 0 1 0z" />
                            <path fill-rule="evenodd"
                                d="M11.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H1.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708z" />
                        </svg>
                        <div>Login</div>
                    </a>
                    <a href="{{ route('register') }}" class="btn btn-primary d-flex justify-content-evenly align-items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-person-fill" viewBox="0 0 16 16">
                            <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                        </svg>
                        <div>Daftar</div>
                    </a>
                </div>
            </div>
        </nav>
        <div class="d-flex justify-content-center align-items-center px-2">
            <div class="text-white">
                <img src="{{ asset('img/logo.png') }}" alt="Logo Kabupaten Tegal" width="120">
                <h1 class="mb-1 mx-2 text-primary">{{ $title }}</h1>
                <p class="mb-3 mx-1">Kabupaten Tegal Adalah Solusi Healing Anda</p>
                <div class="my-5 position-relative" x-data="{
                    on: true,
                    keyword: '',
                    desa: {{ $desa }},
                    get filteredDesa(){
                        return this.desa.filter((item) => item.nama_desa.toLowerCase().startsWith(this.keyword.toLowerCase()))
                    }
                }">
                    <input type="text" name="desa" class="form-control" x-model="keyword" autocomplete="off"
                        placeholder="Cari Desa Wisata di Kabupaten Tegal" aria-label="Recipient's username"
                        aria-describedby="button-addon2">
                    <div class="list-group position-absolute w-100 mt-1">
                        <template x-if="keyword !== ''">
                            <template x-for="desa in filteredDesa">
                                <a :href="'{{ url('desa') }}/' + desa.id"
                                    class="list-group-item list-group-item-action list-group-item-primary"
                                    x-text="desa.nama_desa">Welcome</a>
                            </template>
                        </template>
                        <template x-if="keyword !== '' && filteredDesa.length === 0">
                            <li class="list-group-item list-group-item-danger">
                                Desa Tidak Ditemukan
                            </li>
                        </template>
                    </div>
                </div>
                <img src="{{ asset('img/peta-tegal.jpg') }}" alt="Peta Kabupaten Tegal" width="100%">
            </div>
        </div>
    </div>
</div>
<!-- Hero -->
@endsection
