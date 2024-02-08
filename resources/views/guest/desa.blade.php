@extends('layouts.guest.app')

@push('head')
<script src="{{ asset('js/fullcalendar.js') }}"></script>
<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('fullCalendar', () => ({
            init() {
                var calendarEl = document.getElementById('calendar');
                var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                events: {!! $kegiatan !!},
                });
                calendar.render();
            }
        }))
    })
</script>
@endpush

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
                <div class="mt-1">{{ $desa->nama_desa }}, Kabupaten Tegal, Jawa Tengah</div>
            </div>
        </div>
        <div class="col-12 col-md-6 peta">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d44528.9914268558!2d109.10041815031109!3d-6.868345771690286!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6fb9df95633e29%3A0xba923dd45f2aac0!2sKota%20Tegal%2C%20Jawa%20Tengah!5e0!3m2!1sid!2sid!4v1707378538115!5m2!1sid!2sid" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <div class="col-12 mt-3" x-data="{
            active: 'profil',
            setActive(param){
                this.active = param
            }
        }">
            <ul class="nav nav-pills border-bottom border-4 rounded sticky-top bg-light py-1 px-2">
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
            <div class="row mt-2" x-show="active === 'profil'" x-cloak>
                <img src="data:image/png;base64,{{ $desa->profil->foto_profil ?? '' }}" alt="Dokumentasi Lokasi"
                    class="foto_profil">
                <div class="col-12 col-md-8 text-md-center mx-auto mt-3 mb-4">
                    {!! $desa->profil->deskripsi ?? '' !!}
                </div>
                <div class="row m-0 p-0">
                    <div class="col-12 col-sm-6 col-md-3 p-0">
                        <img src="data:image/png;base64,{{ $desa->profil->gambar1 ?? '' }}" alt="Dokumentasi Lokasi" class="w-100">
                    </div>
                    <div class="col-12 col-sm-6 col-md-3 p-0">
                        <img src="data:image/png;base64,{{ $desa->profil->gambar2 ?? '' }}" alt="Dokumentasi Lokasi" class="w-100">
                    </div>
                    <div class="col-12 col-sm-6 col-md-3 p-0">
                        <img src="data:image/png;base64,{{ $desa->profil->gambar3 ?? '' }}" alt="Dokumentasi Lokasi" class="w-100">
                    </div>
                    <div class="col-12 col-sm-6 col-md-3 p-0">
                        <img src="data:image/png;base64,{{ $desa->profil->gambar4 ?? '' }}" alt="Dokumentasi Lokasi" class="w-100">
                    </div>
                </div>
            </div>
            <div class="mt-2" x-show="active === 'fasilitas'" x-cloak>
                <h2>Fasilitas</h2>
                <div class="row gap-y-3">
                    @foreach ($desa->fasilitas as $item)
                    <div class="col-12 col-sm-6 col-md-4 d-flex align-items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#ffc107"
                            class="bi bi-check-square-fill" viewBox="0 0 16 16">
                            <path
                                d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zm10.03 4.97a.75.75 0 0 1 .011 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.75.75 0 0 1 1.08-.022z" />
                        </svg>
                        <div>{{ $item->fasilitas }}</div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="row mt-2" x-show="active === 'potensi'" x-cloak>
                <iframe class="profil-iframe" src="https://www.youtube.com/embed/{{ $desa->potensi->path_video ?? '' }}" title="YouTube video player"
                    frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                    allowfullscreen></iframe>
                <div class="col-12 col-md-8 text-md-center mx-auto mt-3 mb-4">
                    {!! $desa->potensi->potensi ?? '' !!}
                </div>
            </div>
            <div class="mt-2" x-show="active === 'kegiatan'" x-data="fullCalendar">
                <h2>Kegiatan</h2>
                <div class="col-md-8 mx-auto mb-3" id="calendar" x-ignore></div>
            </div>
        </div>
    </div>
</div>
@endsection
