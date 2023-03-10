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
                        <input type="number" class="form-control" name="nik" placeholder="Masukkan Nik">

                        @if ($errors->has('nik'))
                        <div class="text-danger">
                            {{ $errors->first('nik') }}
                        </div>
                        @endif

                    </div>

                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama">

                        @if ($errors->has('name'))
                        <div class="text-danger">
                            {{ $errors->first('name') }}
                        </div>
                        @endif

                    </div>

                    <div class="form-group">
                        <label>Email</label>
                        <textarea name="email" class="form-control" placeholder="Masukkan Email"></textarea>

                        @if($errors->has('email'))
                        <div class="text-danger">
                            {{ $errors->first('email')}}
                        </div>
                        @endif

                    </div>

                    <div class="form-group">
                        <label>Password</label>
                        <input type="text" class="form-control" name="password" placeholder="Masukkan Password">

                        @if ($errors->has('password'))
                        <div class="text-danger">
                            {{ $errors->first('password') }}
                        </div>
                        @endif

                    </div>

                    <div class="form-group">
                        <label>Telepon</label>
                        <input type="number" class="form-control" name="telp" placeholder="Masukkan No Telp">

                        @if ($errors->has('telp'))
                        <div class="text-danger">
                            {{ $errors->first('telp') }}
                        </div>
                        @endif

                    </div>

                    <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <input type="number" class="form-control" name="jenis_kel">

                        @if ($errors->has('jenis_kel'))
                        <div class="text-danger">
                            {{ $errors->first('jenis_kel') }}
                        </div>
                        @endif

                    </div>

                    <div class="form-group">
                        <label>Level</label>
                        <input type="number" class="form-control" name="level" placeholder="Masukkan Level">

                        @if ($errors->has('level'))
                        <div class="text-danger">
                            {{ $errors->first('level') }}
                        </div>
                        @endif

                    </div>

                    <div class="form-group">
                        <label>Alamat</label>
                        <input type="text" class="form-control" name="alamat" placeholder="Masukkan Alamat">

                        @if ($errors->has('alamat'))
                        <div class="text-danger">
                            {{ $errors->first('alamat') }}
                        </div>
                        @endif

                    </div>

                    <div class="form-group">
                        <label>Rt</label>
                        <input type="text" class="form-control" name="rt" placeholder="Masukkan rt">

                        @if ($errors->has('rt'))
                        <div class="text-danger">
                            {{ $errors->first('rt') }}
                        </div>
                        @endif

                    </div>

                    <div class="form-group">
                        <label>Rw</label>
                        <input type="text" class="form-control" name="rw" placeholder="Masukkan rw">

                        @if ($errors->has('rw'))
                        <div class="text-danger">
                            {{ $errors->first('rw') }}
                        </div>
                        @endif

                    </div>

                    <div class="form-group">
                        <label>Kode Pos</label>
                        <input type="text" class="form-control" name="kode_pos" placeholder="Masukkan ">

                        @if ($errors->has('kode_pos'))
                        <div class="text-danger">
                            {{ $errors->first('kode_pos') }}
                        </div>
                        @endif

                    </div>

                    <div class="form-group">
                        <!-- <label>Provinsi</label> -->
                        <label for="example-text-input" class="form-control-label">Provinsi</label>
                        <select id="province_id" class="form-control @error('province_id') is-invalid @enderror" name="province_id">
                            <option value="">--Pilih Provinsi--</option>
                            @foreach ($provinces as $province)
                            <option value="{{ $province->id }}">{{ $province->name }}</option>
                            @endforeach
                        </select>

                        @if ($errors->has('province_id'))
                        <div class="text-danger">
                            {{ $errors->first('province_id') }}
                        </div>
                        @endif

                    </div>

                    <div class="form-group">
                        <!-- <label>Kabupaten/Kota</label> -->
                        <label for="example-text-input" class="form-control-label">Kabupaten/Kota</label>
                        <select id="regency_id" class="form-control @error('regency_id') is-invalid @enderror" name="regency_id">
                        </select>

                        @if ($errors->has('regency_id'))
                        <div class="text-danger">
                            {{ $errors->first('regency_id') }}
                        </div>
                        @endif

                    </div>

                    <div class="form-group">
                        <!-- <label>Kecamatan</label> -->
                        <label for="example-text-input" class="form-control-label">Kecamatan</label>
                        <select id="district_id" class="form-control @error('district_id') is-invalid @enderror" name="district_id">
                        </select>

                        @if ($errors->has('district_id'))
                        <div class="text-danger">
                            {{ $errors->first('district_id') }}
                        </div>
                        @endif

                    </div>

                    <div class="form-group">
                        <!-- <label>Kelurahan</label> -->
                        <label for="example-text-input" class="form-control-label">Desa</label>
                        <select id="village_id" class="form-control @error('village_id') is-invalid @enderror" name="village_id">
                        </select>

                        @if ($errors->has('village_id'))
                        <div class="text-danger">
                            {{ $errors->first('village_id') }}
                        </div>
                        @endif

                    </div>

                    <div class="form-group">
                        <a href="{{ route('pengaduan.index')}}" class="btn btn-outline-danger">Kembali</a>
                        <button type="submit" class="btn btn-outline-primary" onclick="return confirm('Yakin anda ingin menyimpan data tersebut?')">Simpan</i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>

    <script>
        $(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                }
            });
            $(function() {
                $('#province_id').on('change', function() {
                    let province_id = $('#province_id').val();
                    console.log(province_id);
                    $.ajax({
                        type: 'POST',
                        url: "{{ route('getkota') }}",
                        data: {
                            province_id: province_id
                        },
                        cache: false,
                        success: function(message) {
                            $('#regency_id').html(message);
                            $('#district_id').html('');
                            $('#village_id').html('');
                        },
                        error: function(data) {
                            console.log(`Error on ${data}`);
                        }
                    });
                });
                $('#regency_id').on('change', function() {
                    let regency_id = $('#regency_id').val();
                    $.ajax({
                        type: 'POST',
                        url: "{{ route('getkecamatan') }}",
                        data: {
                            regency_id: regency_id
                        },
                        cache: false,
                        success: function(message) {
                            $('#district_id').html(message);
                            $('#village_id').html('');
                        },
                        error: function(data) {
                            console.log(`Error on ${data}`);
                        }
                    });
                });
                $('#district_id').on('change', function() {
                    let district_id = $('#district_id').val();
                    $.ajax({
                        type: 'POST',
                        url: "{{ route('getdesa') }}",
                        data: {
                            district_id: district_id
                        },
                        cache: false,
                        success: function(message) {
                            $('#village_id').html(message);
                        },
                        error: function(data) {
                            console.log(`Error on ${data}`);
                        }
                    })
                })
            })
        });
    </script>

</body>

</html>

@endsection