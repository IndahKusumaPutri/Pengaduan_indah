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
    <!-- <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-12 grid-margin">
                    <div class="row">
                        <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                            <h3 class="font-weight-bold">Data Pengaduan</h3>
                        </div> -->

    @if (session('Data dihapus'))
    <div class="alert alert-danger" role="alert">
        {{ session('Data dihapus') }}
    </div>
    @endif

    @if (session('Data diedit'))
    <div class="alert alert-success" role="alert">
        {{ session('Data diedit') }}
    </div>
    @endif

    @if (session('Data ditambah'))
    <div class="alert alert-success" role="alert">
        {{ session('Data ditambah') }}
    </div>
    @endif

    <div class="container">
        <div class="row">
            <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                <h3 class="font-weight-bold">Data Pengaduan</h3>
            </div>
        </div>
        <div class="card mt-5">
            <div class="card-body">
                <a href="/pengaduan/create" class="btn btn-primary">Laporkan!</a>
                <br />
                <br />
                <table class="table table-bordered table-hover table-striped">
                    <thead>

                        <!-- <tr class="table-info"> -->
                        <tr class="table-info">
                            <th>No</th>
                            <th>Tanggal Pengaduan</th>
                            <th>NIK</th>
                            <th>Isi Laporan</th>
                            <th>Foto</th>
                            <th>Status</th>
                            <th>Keterangan</th>
                            <th>Opsi</th>
                        </tr>

                    </thead>
                    <tbody>
                        @foreach ($pengaduan as $i => $p)

                        <tr>
                            <td>{{ $i + 1 }}</td>
                            <td>{{ $p->tgl_pengaduan }}</td>
                            <td>{{ $p->nik }}</td>
                            <td>{{ $p->isi_laporan }}</td>
                            <!-- <td>{{ $p->foto }}</td> -->
                            <td>
                                <img src="{{ asset('storage/'. $p->foto) }}" height="15%" width="30%">
                            </td>
                            <td>
                                <label class="label label-success">{{ ($p->status == 1) ? 'Masa Proses' : 'Proses' }}</label>
                            </td>
                            <td>
                                @if($p->status == 0)
                                <a href="/pengaduan/status/{{ $p->id_pengaduan }}" class="btn btn-sm btn-primary" onClick="return confirm('Yakin ingin memproses data ini?')">Proses</a>
                                @else
                                <a href="#" class="btn btn-sm btn-success" disabled>Masa Proses</a>
                                @endif
                            </td>
                            <td>
                                <a href="/pengaduan/edit/{{ $p->id_pengaduan }}" class="btn btn-warning">Edit</a>
                                <a href="/pengaduan/destroy/{{ $p->id_pengaduan }}" class="btn btn-danger fa-fa-trash">Hapus</a>
                            </td>
                            <!-- <td>
                                        <form method="post" action="{{ route('pengaduan.destroy', $p->id_pengaduan) }}"> {{ csrf_field() }}
                                            <a href="{{ route('pengaduan.edit', $p->id_pengaduan) }}" class="btn btn-outline-success">Edit</a>
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button class="btn btn-outline-danger" type="submit" onclick="return confirm('Yakin anda ingin menghapus data tersebut?')">Hapus</button>
                                        </form>
                                    </td> -->
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>
@endsection