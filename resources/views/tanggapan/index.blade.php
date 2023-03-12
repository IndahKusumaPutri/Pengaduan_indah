@extends('layouts.admin.app')

@section('content')

<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tanggapan Petugas</title>
</head>

<body>

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
                <h3 class="font-weight-bold">Data Tanggapan</h3>
            </div>
        </div>
        <div class="card mt-5">
            <div class="card-body">
                <!-- <a href="{{ route('tanggapan.create') }}" class="btn btn-primary">Beri Tanggapan!</a> -->

                <!-- <div class="main-panel">
                    <div class="content-wrapper">
                        <div class="row">
                            <div class="col-md-12 grid-margin">
                                <div class="row">
                                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                                        <h3 class="font-weight-bold">Data Tanggapan</h3>
                                    </div>
                                </div> -->
                <br />
                <table class="table table-bordered table-hover table-striped">
                    <thead>

                        <tr>
                            <th>No</th>
                            <th>Tanggal Pengaduan</th>
                            <th>Tanggapan</th>
                            <th>nik</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tanggapan as $i => $p)
                        <tr>
                            <td>{{ $i + 1 }}</td>
                            <td>{{ $p->tgl_tanggapan }}</td>
                            <td>{{ $p->tanggapan }}</td>
                            <td>{{ $p->nik }}</td>
                            <td>
                                <form method="post" action="{{ route('tanggapan.destroy', $p->id_tanggapan) }}"> {{ csrf_field() }}
                                    <a href="{{ route('tanggapan.edit', $p->id_tanggapan) }}" class="btn btn-outline-success">Edit</a>
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button class="btn btn-outline-danger" type="submit" onclick="return confirm('Yakin anda ingin menghapus data tersebut?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>
    </div>
</body>

</html>
@endsection