@extends('layouts.guest.app')

@section('content')
<!-- Hero -->
<div class="p-5 text-center bg-image rounded-3 hero" style="background-image: url('{{ asset('img/hero.jpg') }}');">
    <div class="mask" style="background-color: rgba(0, 0, 0, 0.6);">
        <div class="d-flex justify-content-center align-items-center h-100 px-2">
            <div class="text-white">
                <img src="{{ asset('img/logo-kab-tegal.png') }}" alt="Logo Kabupaten Tegal" width="65" class="mb-3">
                <h1 class="mb-1 mx-2 text-primary">{{ $title }}</h1>
                <p class="mb-3 mx-1">Kabupaten Tegal Adalah Solusi Healing Anda</p>
                <form action="desa" class="input-group my-5">
                    <input type="text" class="form-control" placeholder="Cari Desa Wisata di Kabupaten Tegal"
                        aria-label="Recipient's username" aria-describedby="button-addon2">
                    <button class="btn btn-primary" type="submit" id="button-addon2">Cari</button>
                </form>
                <img src="{{ asset('img/peta-tegal.jpg') }}" alt="Peta Kabupaten Tegal" width="100%">
            </div>
        </div>
    </div>
</div>
<!-- Hero -->
@endsection