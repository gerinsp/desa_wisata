@extends('layouts.admin.app')

@section('content')
    <!-- Content Row -->
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
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">{{ $title }}</h1>
    </div>
    <div class="row mb-5">
        <div class="col">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">
                        My Account
                    </h6>
                    {{-- <div class="dropdown no-arrow">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        </a>
                        <a href="/profile/{{ auth()->user()->id }}/edit" class="btn btn-primary btn-sm">Edit Profile</a>
                    </div> --}}
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <form method="POST" action="/admin/profil-user/{{ auth()->user()->id }}">
                        @method('put')
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="name">Name</label>
                                <input type="text" name="name"
                                    class="form-control @error('name') is-invalid @enderror" id="name"
                                    value="{{ old('name', auth()->user()->name) }}">
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="role_id">Role</label>
                                <select id="role_id" name="role_id"
                                    class="form-control @error('role_id') is-invalid @enderror">
                                    @if (old('role_id', auth()->user()->role_id) === 1)
                                        <option value="1" selected>Admin</option>
                                        <option value="2">Super Admin</option>
                                    @elseif(old('role_id', auth()->user()->role_id) === 2)
                                        <option value="1">Admin</option>
                                        <option value="2" selected>Super Admin</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" name="username" class="form-control @error('username') is-invalid @enderror"
                                id="username" value="{{ old('username', auth()->user()->username) }}">
                            @error('username')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password"
                                class="form-control @error('password') is-invalid @enderror" id="password"
                                value="{{ old('password', auth()->user()->password) }}">
                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <!-- Card Body -->
                <div class="card-body">
                    <img style="display:block; margin-right:auto;margin-left:auto;" width="200px"
                        class="img-profile rounded-circle" src="{{ asset('img/undraw_profile.svg') }}" />
                </div>
                <h4 class="text-center">{{ auth()->user()->name }}</h4>
                <p class="text-center">{{ auth()->user()->username }}</p>
            </div>
        </div>
    </div>
@endsection
