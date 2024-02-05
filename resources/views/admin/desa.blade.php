@extends('layouts.admin.app')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">{{ $title }}</h1>
    </div>

    <!-- Content Row -->
    <div class="card shadow mb-4" style="width: 50%">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">
                Data Desa
            </h6>
            <div class="dropdown no-arrow">
                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">
                </a>
                <a href="#" data-toggle="modal" onclick="tambahData()" data-target="#exampleModal" class="btn btn-primary btn-sm">Tambah Data</a>
            </div>
        </div>
        <!-- Card Body -->
        <div class="card-body">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama Desa</th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                @foreach ($desa as $value)
                    <tr>
                        <th scope="row">
                            {{ ($desa->currentpage() - 1) * $desa->perpage() + $loop->index + 1 }}</th>
                        <td>{{ ucwords(strtolower($value->nama_desa)) }}</td>
                        <td>
                            <a href="#" id="btn-edit" data-toggle="modal" data-target="#exampleModal" onclick="updateData('{{ $value->id }}')" href="#"><i class="fas fa-edit"></i></a>
                            <a href="#" id="btn-delete" class="border-0 bg-white" onclick="hapusData('{{ $value->id }}')"><i
                                        class="fas fa-trash-alt text-danger"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $desa->links() }}
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
    <script>
        const btnSubmit = document.getElementById('btn-submit')

        let url = ''
        let method = ''
        function tambahData() {
            $('#exampleModalLabel').text('Tambah Data')
            $('#btn-submit').text('Simpan')
            url = '{{ route('desa.store') }}'
            method = 'POST'
            $('#nama_desa').val('')
        }
        function updateData(id) {
            $('#exampleModalLabel').text('Edit Data')
            $('#btn-submit').text('Ubah')
            url = `/admin/desa/${id}`
            method = 'PUT'

            $.ajax({
                url: `/admin/desa/${id}`,
                method: 'GET',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                success: function (res) {
                    if (res.status == 'OK') {
                        $('#nama_desa').val(res.nama_desa)
                    }
                }
            })
        }
        function hapusData(id) {
            let konfirmasi = confirm('Apakah anda yakin?')

            if(konfirmasi) {
                $.ajax({
                    url: `/admin/desa/${id}`,
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    success: function (res) {
                        if (res.status == 'OK') {
                            Swal.fire({
                                title: "Success",
                                text: res.message,
                                icon: "success"
                            }).then(function () {
                                location.reload()
                            });
                        }
                    }
                })
            }
        }

        btnSubmit.addEventListener('click', function (e) {
            e.preventDefault()
            $.ajax({
                url: url,
                method: method,
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                data: {
                    nama_desa: $('#nama_desa').val()
                },
                success: function (res) {
                    if (res.status == 'OK') {
                        Swal.fire({
                            title: "Success",
                            text: res.message,
                            icon: "success"
                        }).then(function () {
                            location.reload()
                        });
                    }
                }
            })
        })
    </script>
@endsection
