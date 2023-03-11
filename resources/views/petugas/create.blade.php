<!-- Content Header (Page header) -->
@extends('layouts.app')

@section('content')
    <!doctype html>
    <html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet">
        <title>Pengaduan</title>
    </head>

    <body>
        <div class="container">
            <div class="card mt-5">
                <div class="card-header text-center">
                    TAMBAH DATA
                </div>
                <div class="card-body">
                    <!-- <a href="/pengaduan" class="btn btn-primary">Kembali</a> -->
                    <br />
                    <br />

                    <form method="post" action="/petugas/store" enctype="multipart/form-data">

                        {{ csrf_field() }}

                        <div class="form-group">
                            <label>NIK</label>
                            <input type="number" class="form-control" name="nik" value="{{ old('nik') }}" placeholder="Masukkan NIK">

                            @if ($errors->has('nik'))
                                <div class="text-danger">
                                    {{ $errors->first('nik') }}
                                </div>
                            @endif

                        </div>

                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Masukkan Nama">

                            @if ($errors->has('name'))
                                <div class="text-danger">
                                    {{ $errors->first('name') }}
                                </div>
                            @endif

                        </div>

                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" class="form-control" name="email" value="{{ old('email') }}"
                                placeholder="Masukkan Email"></textarea>

                            @if ($errors->has('email'))
                                <div class="text-danger">
                                    {{ $errors->first('email') }}
                                </div>
                            @endif

                        </div>

                        <div class="form-group">
                            <label>Password</label>
                            <input type="text" class="form-control" name="password" value="{{ old('password') }}" placeholder="Masukkan Password">

                            @if ($errors->has('password'))
                                <div class="text-danger">
                                    {{ $errors->first('password') }}
                                </div>
                            @endif

                        </div>

                        <div class="form-group">
                            <label>Telepon</label>
                            <input type="number" class="form-control" name="telp" value="{{ old('telp') }}" placeholder="Masukkan No Telp">

                            @if ($errors->has('telp'))
                                <div class="text-danger">
                                    {{ $errors->first('telp') }}
                                </div>
                            @endif

                        </div>

                        <div class="form-group">
                            <label for="example-text-input" name="jenis_kel" class="form-control-label">Jenis
                                Kelamin</label>
                            <label for="jenis_kel">
                                <input type="radio" name="jenis_kel" value="Laki-laki" id="jenis_kel" checked>&nbsp
                                Laki-Laki &nbsp &nbsp &nbsp
                                <input type="radio" name="jenis_kel" value="Perempuan" id="jenis_kel">&nbsp
                                Perempuan
                            </label>

                            @if ($errors->has('jenis_kel'))
                                <div class="text-danger">
                                    {{ $errors->first('jenis_kel') }}
                                </div>
                            @endif

                        </div>

                        <div class="form-group">
                            <label>Level</label>
                            <select class="col-sm-12 form-control" name="level" aria-label="Default select example">
                                <option selected> Pilih Level </option>
                                <option value="1">User</option>
                                <option value="2">Petugas</option>
                            </select>

                            @if ($errors->has('level'))
                                <div class="text-danger">
                                    {{ $errors->first('level') }}
                                </div>
                            @endif

                        </div>

                        <div class="form-group">
                            <label>Alamat</label>
                            <textarea class="form-control" name="alamat" value="{{ old('alamat') }}" placeholder="Masukkan Alamat"></textarea>

                            @if ($errors->has('alamat'))
                                <div class="text-danger">
                                    {{ $errors->first('alamat') }}
                                </div>
                            @endif

                        </div>

                        <div class="form-group">
                            <label>Rt</label>
                            <input type="text" class="form-control" name="rt" value="{{ old('rt') }}" placeholder="Masukkan rt">

                            @if ($errors->has('rt'))
                                <div class="text-danger">
                                    {{ $errors->first('rt') }}
                                </div>
                            @endif

                        </div>

                        <div class="form-group">
                            <label>Rw</label>
                            <input type="text" class="form-control" name="rw" value="{{ old('rw') }}" placeholder="Masukkan rw">

                            @if ($errors->has('rw'))
                                <div class="text-danger">
                                    {{ $errors->first('rw') }}
                                </div>
                            @endif

                        </div>

                        <div class="form-group">
                            <label>Kode Pos</label>
                            <input type="text" class="form-control" name="kode_pos" value="{{ old('kode_pos') }}" placeholder="Masukkan ">

                            @if ($errors->has('kode_pos'))
                                <div class="text-danger">
                                    {{ $errors->first('kode_pos') }}
                                </div>
                            @endif

                        </div>

                        {{-- <div class="form-group">
                            <!-- <label>Provinsi</label> -->
                            <label for="example-text-input" class="form-control-label">Provinsi</label>
                            <select id="province_id" class="form-control @error('province_id') is-invalid @enderror"
                                name="province_id">
                                <option value="">--Pilih Provinsi--</option>
                                @foreach ($provinces as $province)
                                    <option value="{{ $province->id }}">{{ $province->name }}</option>
                                @endforeach
                            </select>
                        </div> --}}

                        <div class="form-group col-md-12">
                            <label class="form-label" for="province_id">Provinsi:</label>
                            <select name="province_id" id="province_id" class="selectpicker form-control" data-style="py-0">
                                <option value="">Pilih Provinsi...</option>
                                @foreach ($provinces as $provinsi)
                                    <option value="{{ $provinsi->id }}">{{ $provinsi->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-md-12">
                            <label class="form-label" for="regency_id">Kota:</label>
                            <select name="regency_id" id="regency_id" class="selectpicker form-control"
                                data-style="py-0">

                            </select>
                        </div>
                        <div class="form-group col-md-12">
                            <label class="form-label" for="village_id">Kecamatan:</label>
                            <select name="village_id" id="village_id" class="selectpicker form-control"
                                data-style="py-0">

                            </select>
                        </div>
                        <div class="form-group col-md-12">
                            <label class="form-label" for="district_id">Kelurahan:</label>
                            <select name="district_id" id="district_id" class="selectpicker form-control"
                                data-style="py-0">

                            </select>
                        </div>

                        <div class="form-group">
                            <a href="{{ route('pengaduan.index') }}" class="btn btn-outline-danger">Kembali</a>
                            <button type="submit" class="btn btn-outline-primary"
                                onclick="return confirm('Yakin anda ingin menyimpan data tersebut?')">Simpan</i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </body>

    </html>

    <script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
    <script>
        $(function() {
            $('#province_id').on('change', function() {
                let province_id = $('#province_id').val();

                if (province_id) {
                    $.ajax({
                        url: "{{ route('getKota') }}",
                        type: "POST",
                        data: {
                            province_id: province_id
                        },
                        cache: false,
                        success: function($msg) {
                            $('#regency_id').html($msg);
                            $('#village_id').html('');
                            $('#district_id').html('');
                        },
                        error: function(data) {
                            console.log('error:', data);
                        }
                    })
                }
            })
            $('#regency_id').on('change', function() {
                let regency_id = $('#regency_id').val();
                if (regency_id) {
                    $.ajax({
                        url: "{{ route('getKecamatan') }}",
                        type: "POST",
                        data: {
                            regency_id: regency_id
                        },
                        cache: false,
                        success: function($msg) {
                            $('#village_id').html($msg);
                            $('#district_id').html('');
                        },
                        error: function(data) {
                            console.log('error:', data);
                        }
                    })
                }
            })
            $('#village_id').on('change', function() {
                let village_id = $('#village_id').val();
                if (village_id) {
                    $.ajax({
                        url: "{{ route('getKelurahan') }}",
                        type: "POST",
                        data: {
                            village_id: village_id
                        },
                        cache: false,
                        success: function($msg) {
                            $('#district_id').html($msg);
                        },
                        error: function(data) {
                            console.log('error:', data);
                        }
                    })
                }
            })
            $('#inputGambar_profile').on('change', function() {
                //get the file name
                var fileName = $(this).val();
                var panjangnamafile = fileName.length;

                if (panjangnamafile > 22) {
                    hasilpotong = fileName.substring(0, 22);
                    $(this).next('.custom-file-label').html(hasilpotong);
                } else {
                    $(this).next('.custom-file-label').html(fileName);
                }
            })

            function filePreview(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#preview').attr('src', e.target.result)
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            }
            $(function() {
                $("#inputGambar_profile").change(function() {
                    filePreview(this);
                });
            });
        });
    </script>
@endsection
