<!-- Content Header (Page header) -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet">
    <title>Pengkat</title>
</head>

<body>
    <div class="container">
        <div class="card mt-5">
            <div class="card-header text-center">
                Masukkan Pengaduan
            </div>
            <div class="card-body">
                <a href="/pengaduan" class="btn btn-primary">Kembali</a>

                <!-- <form class="form-horizontal" action="/pengaduan/store" method="post"> {{ csrf_field() }} -->

                <form method="post" action="/pengaduan/store" enctype="multipart/form-data"> {{ csrf_field() }}

                    <div class="form-group row">
                        <label>Tanggal Pengaduan</label>
                        <input type="date" class="form-control" name="tgl_pengaduan">

                        @if ($errors->has('tgl_pengaduan'))
                        <div class="date-danger">
                            {{ $errors->first('tgl_pengaduan') }}
                        </div>
                        @endif

                    </div>

                    <div class="form-group row">
                        <label>NIK</label>
                        <input type="number" class="form-control" name="nik">

                        @if ($errors->has('nik'))
                        <div class="number-danger">
                            {{ $errors->first('nik') }}
                        </div>
                        @endif

                    </div>

                    <div class="form-group row">
                        <label>Isi Laporan</label>
                        <input type="text" class="form-control" name="isi_laporan">

                        @if ($errors->has('isi_laporan'))
                        <div class="text-danger">
                            {{ $errors->first('isi_laporan') }}
                        </div>
                        @endif

                    </div>

                    <div class="form-group row">
                        <label>Foto</label>
                        <input type="file" class="form-control" name="foto">

                        @if ($errors->has('foto'))
                        <div class="text-danger">
                            {{ $errors->first('foto') }}
                        </div>
                        @endif

                    </div>

                    <div class="form-group row">
                        <label>Status</label>
                        <!-- <input type="radio" class="form-control" name="status"> -->
                        <label for="status">
                            <input type="radio" name="status" value="proses" id="status" checked>&nbsp Proses &nbsp &nbsp &nbsp
                            <input type="radio" name="status" value="selesai" id="status">&nbsp Selesai
                        </label>

                        @if ($errors->has('status'))
                        <div class="radio-danger">
                            {{ $errors->first('status') }}
                        </div>
                        @endif

                    </div>

                    <div class="form-group row">
                        <div class="col-sm-offset-5 col-sm-6">
                            <a href="{{route('pengaduan.index')}}" class="btn btn-outline-danger">Kembali</a>
                            <button type="submit" class="btn btn-outline-primary" onclick="return confirm('Yakin anda ingin menyimpan data tersebut?')">Simpan</i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>