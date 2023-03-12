<!-- Content Header (Page header) -->
@extends('layouts.user.app')

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
        <div class="row">
            <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                <h3 class="font-weight-bold">Laporkan!</h3>
            </div>
        </div>
        <div class="card mt-5">
            <div class="card">
                <div class="card-body">

                    <form method="post" action="{{ route('pengaduan.store') }}" enctype="multipart/form-data">

                        {{ csrf_field() }}

                        <!-- <form class="form-horizontal" action="/pengaduan/store" method="post"> {{ csrf_field() }} -->

                        <!-- <form method="post" action="/pengaduan/store" enctype="multipart/form-data"> {{ csrf_field() }} -->

                        <div class="form-group col-12">
                            <label>Tanggal Pengaduan</label>
                            <input type="date" class="form-control" name="tgl_pengaduan">

                            @if ($errors->has('tgl_pengaduan'))
                            <div class="date-danger">
                                {{ $errors->first('tgl_pengaduan') }}
                            </div>
                            @endif

                        </div>

                        <!-- <div class="form-group col-12">
                            <label>NIK</label>
                            <input type="number" class="form-control" name="nik" placeholder="Masukan NIK">

                            @if ($errors->has('nik'))
                            <div class="number-danger">
                                {{ $errors->first('nik') }}
                            </div>
                            @endif

                        </div> -->

                        <div class="form-group col-12">
                            <label>Isi Pengaduan</label>
                            <textarea name="isi_laporan" class="form-control" placeholder="Masukkan Isi Pengaduan"></textarea>

                            @if($errors->has('isi_laporan'))
                            <div class="text-danger">
                                {{ $errors->first('isi_laporan')}}
                            </div>
                            @endif

                        </div>

                        <div class="form-group col-12">
                            <label class="form-label" for="foto">Foto Pengaduan</label>
                            <input type="file" class="form-control" id="select-image" name="foto[]" multiple />
                            <div class="filearray">
                            </div>
                            @if ($errors->has('foto'))
                            <div class="text-danger">
                                {{ $errors->first('foto') }}
                            </div>
                            @endif

                        </div>

                        <!-- <div class="form-group row">
                        <label class="control-label col-sm-2">Status</label>
                        <div class="col-sm-10">
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
                    </div> -->

                        <!-- <div class="form-group col-12">
                            <label>Status</label>
                            <br>
                            <input type="text" name="status" value="Proses" class="form-control" placeholder="Status">
                            </br>

                            @if($errors->has('status'))
                            <div class="text-danger">
                                {{ $errors->first('status')}}
                            </div>
                            @endif

                        </div> -->

                        <div class="form-group col-12">
                            <a href="{{ route('pengaduan.index')}}" class="btn btn-outline-danger">Kembali</a>
                            <button type="submit" class="btn btn-outline-primary" onclick="return confirm('Yakin anda ingin menyimpan data tersebut?')">Simpan</i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<script>
    $(document).on('ready', () => {
        $("#select-image").on('change', function() {
            $(".filearray").empty(); //you can remove this code if you want previous user input
            for (let i = 0; i < this.files.length; ++i) {
                let filereader = new FileReader();
                let $img = jQuery.parseHTML("<img src='' height='100px' widht='50px'> ");
                filereader.onload = function() {
                    $img[0].src = this.result;
                };
                filereader.readAsDataURL(this.files[i]);
                $(".filearray").append($img);
            }
        });
    });
</script>

@endsection