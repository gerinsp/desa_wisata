@extends('layouts.admin.app')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">{{ $title }}</h1>
    </div>
    <div class="col-md-12">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">
                    Form Edit Profil Desa
                </h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <form method="POST" action="{{ route('profil.update', $profil->id) }}" enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    <div class="row">
                        <div class="col-md-5">
                            <div class="mb-3">
                                <label for="id_desa">Nama Desa</label>
                                <select class="form-control" id="id_desa" name="id_desa">
                                    <option>- Pilih Desa -</option>
                                    @foreach ($desa as $value)
                                        @if($profil->id_desa == $value->id)
                                            <option value="{{ $value->id }}" selected>{{ $value->nama_desa }}</option>
                                        @else
                                            <option value="{{ $value->id }}">{{ $value->nama_desa }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <img id="preview0" src="data:image/png;base64,{{ $profil->foto_profil }}" class="mt-2" style="display: block; max-width: 200px;" />
                            </div>
                            <div class="mb-3">
                                <label for="foto_profil" class="form-label">Foto Profil Desa</label>
                                <input type="file" class="form-control @error('foto_profil') is-invalid @enderror" id="foto_profil" name="foto_profil" autofocus onchange="previewImage(this, '0')">
                                @error('foto_profil')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <img id="preview1" src="data:image/png;base64,{{ $profil->gambar1 }}" class="mt-2" style="display: block; max-width: 200px;" />
                            </div>
                            <div class="mb-3">
                                <label for="gambar1" class="form-label">Foto 1</label>
                                <input type="file" class="form-control @error('gambar1') is-invalid @enderror" id="gambar1" name="gambar1" autofocus onchange="previewImage(this, '1')">
                                @error('gambar1')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <img id="preview2" src="data:image/png;base64,{{ $profil->gambar2 }}" class="mt-2" style="display: block; max-width: 200px;" />
                            </div>
                            <div class="mb-3">
                                <label for="gambar2" class="form-label">Foto 2</label>
                                <input type="file" class="form-control @error('gambar2') is-invalid @enderror" id="gambar2" name="gambar2" autofocus onchange="previewImage(this, '2')">
                                @error('gambar2')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <img id="preview3" src="data:image/png;base64,{{ $profil->gambar3 }}" class="mt-2" style="display: block; max-width: 200px;" />
                            </div>
                            <div class="mb-3">
                                <label for="gambar3" class="form-label">Foto 3</label>
                                <input type="file" class="form-control @error('gambar3') is-invalid @enderror" id="gambar3" name="gambar3" autofocus onchange="previewImage(this, '3')">
                                @error('gambar3')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <img id="preview4" src="data:image/png;base64,{{ $profil->gambar4 }}" class="mt-2" style="display: block; max-width: 200px;" />
                            </div>
                            <div class="mb-3">
                                <label for="gambar4" class="form-label">Foto 4</label>
                                <input type="file" class="form-control @error('gambar4') is-invalid @enderror" id="gambar4" name="gambar4" autofocus onchange="previewImage(this, '4')">
                                @error('gambar4')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="latitude">Latitude</label>
                                    <input type="text" class="form-control" id="latitude" name="latitude" value="{{ $profil->latitude }}">
                                    @error('latitude')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="longitude">Longitude</label>
                                    <input type="text" class="form-control" id="longitude" name="longitude" value="{{ $profil->longitude }}">
                                    @error('longitude')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="deskripsi" class="form-label ">Deskripsi</label>
                                <textarea id="deskripsi" name="deskripsi">{!! $profil->deskripsi !!}</textarea>
                                @error('deskripsi')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                        </div>
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
        function previewImage(input, id) {
            var preview = document.getElementById('preview' + id);
            var file = input.files[0];

            if (file) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                };

                reader.readAsDataURL(file);
            } else {
                preview.src = '';
                preview.style.display = 'none';
            }
        }

        $('#deskripsi').summernote({
            placeholder: '',
            tabsize: 2,
            height: 290
        });

    </script>
@endsection
