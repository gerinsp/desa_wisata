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
    <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">
                Potensi Desa
            </h6>
            <div class="dropdown no-arrow">
                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">
                </a>
                <a href="{{ route('potensi.create') }}" class="btn btn-primary btn-sm">Tambah Data</a>
            </div>
        </div>
        <!-- Card Body -->
        <div class="card-body">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama Desa</th>
                    <th scope="col" width="60%">Potensi</th>
                    <th scope="col">Video</th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                @foreach ($potensi as $value)
                    <tr>
                        <th scope="row">
                            {{ ($potensi->currentpage() - 1) * $potensi->perpage() + $loop->index + 1 }}</th>
                        <td>{{ ucwords(strtolower($value->desa->nama_desa)) }}</td>
                        <td>{!! $value->potensi !!}</td>
                        <td>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-{{ $value->id }}">
                                Lihat Video
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="modal-{{ $value->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Video</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <iframe width="100%" height="300px;" class="profil-iframe" src="https://www.youtube.com/embed/{{ $value->path_video ?? '' }}" title="YouTube video player"
                                                    frameborder="0"
                                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                                    allowfullscreen></iframe>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <a href="{{ route('potensi.edit', $value->id) }}" id="btn-edit" ><i class="fas fa-edit"></i></a>
                            <form action="{{ route('potensi.destroy', $value->id) }}" method="post" class="d-inline">
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
            {{ $potensi->links() }}
        </div>
    </div>
@endsection

@section('js')

@endsection
