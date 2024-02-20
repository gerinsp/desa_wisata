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
                Data Fasilitas
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
                    <th scope="col">Fasilitas</th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                @foreach ($fasilitas as $value)
                    <tr>
                        <th scope="row">
                            {{ ($fasilitas->currentpage() - 1) * $fasilitas->perpage() + $loop->index + 1 }}</th>
                        <td>{{ ucwords(strtolower($value->desa->nama_desa)) }}</td>
                        <td>{{ ucwords(strtolower($value->fasilitas)) }}</td>
                        <td>
                            <a href="#" id="btn-edit" data-toggle="modal" data-target="#exampleModal" onclick="updateData('{{ $value->id }}')" href="#"><i class="fas fa-edit"></i></a>
                            <a href="#" id="btn-delete" class="border-0 bg-white" onclick="hapusData('{{ $value->id }}')"><i
                                        class="fas fa-trash-alt text-danger"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $fasilitas->links() }}
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
                        <label for="exampleFormControlSelect1">Pilih Desa</label>
                        <select class="form-select" id="id_desa" required>

                        </select>
                    </div>
                    <div id="input-fasilitas">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Fasilitas</label>
                            <div style="display: flex;align-items: center;gap: 10px;">
                                <input type="text" class="form-control nama_fasilitas" id="nama_fasilitas" aria-describedby="emailHelp" required>
                                <a href="#" onclick="addInputFasilitas()" class="btn btn-sm btn-primary">+</a>
                            </div>
                        </div>
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
        const selectDesa = document.getElementById('id_desa')

        function addInputFasilitas() {
            $('#input-fasilitas').append(`
                <div class="form-group">
                   <div style="display: flex;align-items: center;gap: 10px;">
                       <input type="text" class="form-control nama_fasilitas" id="nama_fasilitas" aria-describedby="emailHelp" required>
                       <a href="#" onclick="dropInputFasilitas(this)" class="btn btn-sm btn-danger">-</a>
                   </div>
                </div>
            `)
        }

        function dropInputFasilitas(e) {
            $(e).closest('.form-group').remove();
        }

        const desa = {!! json_encode($desa) !!};

        let url = ''
        let method = ''
        let input;
        function tambahData() {
            input = 1
            $('#input-fasilitas').html('')
            $('#exampleModalLabel').text('Tambah Data')
            $('#btn-submit').text('Simpan')
            url = '{{ route('fasilitas.store') }}'
            method = 'POST'
            $('.nama_fasilitas').val('')
            selectDesa.innerHTML = '';

            $('#input-fasilitas').html(`
                <div class="form-group">
                    <label for="exampleInputEmail1">Fasilitas</label>
                    <div style="display: flex;align-items: center;gap: 10px;">
                        <input type="text" class="form-control nama_fasilitas" id="nama_fasilitas" aria-describedby="emailHelp" required>
                        <a href="#" onclick="addInputFasilitas()" class="btn btn-sm btn-primary">+</a>
                    </div>
                </div>
            `)

            //option value
            desa.forEach(function(value) {
                const option = document.createElement('option');
                option.value = value.id;
                option.text = value.nama_desa;
                selectDesa.add(option);
            });
        }
        function updateData(id) {
            input = 2
            $('#input-fasilitas').html('')
            $('#exampleModalLabel').text('Edit Data')
            $('#btn-submit').text('Ubah')
            url = `/admin/fasilitas/${id}`
            method = 'PUT'

            $('#input-fasilitas').html(`
                <div class="form-group">
                    <label for="exampleInputEmail1">Fasilitas</label>
                    <input type="text" class="form-control nama_fasilitas" id="nama_fasilitas" aria-describedby="emailHelp" required>
                </div>
            `)

            $.ajax({
                url: `/admin/fasilitas/${id}`,
                method: 'GET',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                success: function (res) {
                    if (res.status == 'OK') {
                        $('#nama_fasilitas').val(res.data.fasilitas)
                        selectDesa.innerHTML = '';

                        //option value
                        desa.forEach(function(value) {
                            const option = document.createElement('option');
                            option.value = value.id;
                            option.text = value.nama_desa;

                            if (res.data.desa.id == value.id) {
                                option.selected = true
                            }
                            selectDesa.add(option);
                        });
                    }
                }
            })
        }
        function hapusData(id) {
            let konfirmasi = confirm('Apakah anda yakin?')

            if(konfirmasi) {
                $.ajax({
                    url: `/admin/fasilitas/${id}`,
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

            let fasilitas = []
            $('.nama_fasilitas').each(function(index, element) {

                var nilaiFasilitas = $(element).val();
                fasilitas.push(nilaiFasilitas)
            });

            $.ajax({
                url: url,
                method: method,
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                data: {
                    id_desa: $('#id_desa').val(),
                    fasilitas: input == 1 ? fasilitas : $('#nama_fasilitas').val()
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
