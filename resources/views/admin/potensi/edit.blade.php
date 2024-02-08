@extends('layouts.admin.app')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">{{ $title }}</h1>
    </div>
    <div class="col-md-6">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">
                    Form Potensi Desa
                </h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <form method="POST" action="{{ route('potensi.update', $potensi->id) }}" enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    <div class="mb-3">
                        <label for="id_desa">Nama Desa</label>
                        <select class="form-control" id="id_desa" name="id_desa">
                            <option>- Pilih Desa -</option>
                            @foreach ($desa as $value)
                                @if($potensi->id_desa == $value->id)
                                    <option value="{{ $value->id }}" selected>{{ $value->nama_desa }}</option>
                                @else
                                    <option value="{{ $value->id }}">{{ $value->nama_desa }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="video" class="form-label ">Link Video</label>
                        <input type="text" class="form-control @error('video') is-invalid @enderror" id="video"
                            name="video" autofocus value="{{ old('video', 'https://youtu.be/' . $potensi->path_video) }}">
                        @error('video')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="potensi" class="form-label ">Potensi</label>
                        <textarea id="potensi" name="potensi">{!! $potensi->potensi !!}</textarea>
                        @error('potensi')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <button class="btn btn-primary btn-sm mt-3" type="submit">Edit</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('js/jquery-3.4.1.slim.min.js') }}" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="{{ asset('js/summernote-lite.min.js') }}"></script>
    <script>

        $('#potensi').summernote({
            placeholder: '',
            tabsize: 2,
            height: 100
        });

    </script>
@endsection
