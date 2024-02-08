@extends('layouts.admin.app')

@section('content')
    @if (session()->has('success'))
        <div class="alert alert-success col-lg-8" role="alert">
            {{ session('success') }}
        </div>
    @endif

    @if (session()->has('gagal'))
        <div class="alert alert-danger col-lg-8" role="alert">
            {{ session('gagal') }}
        </div>
    @endif

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">{{ $title }}</h1>
    </div>

    <!-- Content Row -->
    <div class="card shadow mb-4" >
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">
                Profil Desa
            </h6>
            <div class="dropdown no-arrow">
                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">
                </a>
                <a href="{{ route('profil.create') }}" class="btn btn-primary btn-sm">Tambah Data</a>
            </div>
        </div>
        <!-- Card Body -->
        <div class="card-body">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama Desa</th>
                    <th scope="col">Deskripsi</th>
                    <th scope="col">Maps</th>
                    <th scope="col">Foto</th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                @foreach ($profil as $value)
                    <tr>
                        <th scope="row">
                            {{ ($profil->currentpage() - 1) * $profil->perpage() + $loop->index + 1 }}</th>
                        <td>{{ ucwords(strtolower($value->desa->nama_desa)) }}</td>
                        <td>{!! $value->deskripsi !!}</td>
                        <td>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-maps-{{ $value->id }}">
                                Lihat Maps
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="modal-maps-{{ $value->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" >
                                    <div class="modal-content" style="width: 635px !important;">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Maps</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            {!! $value->maps !!}
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-{{ $value->id }}">
                                Lihat Foto
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="modal-{{ $value->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Galeri Foto</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-4 mb-3">
                                                    <h6>Foto Profil</h6>
                                                    @if ($value->foto_profil)
                                                        <img src="data:image/png;base64,{{ $value->foto_profil }}" class="img-fluid" alt="Foto Profil">
                                                    @endif
                                                </div>

                                                <div class="col-md-4 mb-3">
                                                    <h6>Gambar 1</h6>
                                                    @if ($value->gambar1)
                                                        <img src="data:image/png;base64,{{ $value->gambar1 }}" class="img-fluid" alt="Gambar 1">
                                                    @endif
                                                </div>

                                                <div class="col-md-4 mb-3">
                                                    <h6>Gambar 2</h6>
                                                    @if ($value->gambar2)
                                                        <img src="data:image/png;base64,{{ $value->gambar2 }}" class="img-fluid" alt="Gambar 2">
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="row">

                                                <div class="col-md-4 mb-3">
                                                    <h6>Gambar 3</h6>
                                                    @if ($value->gambar3)
                                                        <img src="data:image/png;base64,{{ $value->gambar3 }}" class="img-fluid" alt="Gambar 3">
                                                    @endif
                                                </div>

                                                <div class="col-md-4 mb-3">
                                                    <h6>Gambar 4</h6>
                                                    @if ($value->gambar4)
                                                        <img src="data:image/png;base64,{{ $value->gambar4 }}" class="img-fluid" alt="Gambar 4">
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <a href="{{ route('profil.edit', $value->id) }}" id="btn-edit"><i class="fas fa-edit"></i></a>
                            <form action="{{ route('profil.destroy', $value->id) }}" method="post" class="d-inline">
                                @method('delete')
                                @csrf
                                <button class="border-0 bg-white" onclick="return confirm('Are you sure?')"><i
                                        class="fas fa-trash-alt text-danger"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $profil->links() }}
        </div>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama Desa</label>
                        <input type="text" class="form-control" id="nama_desa" aria-describedby="emailHelp">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="button" id="btn-submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')

@endsection
