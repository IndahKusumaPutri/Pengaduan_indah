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
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-12 grid-margin">
                    <div class="row">
                        <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                            <h3 class="font-weight-bold">Data Petugas</h3>
                        </div>

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
                            <div class="card mt-5">
                                <div class="card-body">
                                    <a href="{{ route('petugas.create') }}" class="btn btn-primary">Tambah Data</a>
                                    <br />
                                    <br />
                                    <table class="table table-bordered table-hover table-striped">
                                        <thead>

                                            <!-- <tr class="table-info"> -->
                                            <tr>
                                                <th>No</th>
                                                <th>NIK</th>
                                                <th>Nama</th>
                                                <th>Email</th>
                                                <th>Password</th>
                                                <th>Telepon</th>
                                                <th>Jenis Kelamin</th>
                                                <th>Level</th>
                                                <th>Opsi</th>
                                            </tr>

                                        </thead>
                                        <tbody>
                                            @foreach ($petugas as $i => $p)

                                            <tr>
                                                <td>{{ $i + 1 }}</td>
                                                <td>{{ $p->nik }}</td>
                                                <td>{{ $p->name }}</td>
                                                <td>{{ $p->email }}</td>
                                                <td>{{ $p->password }}</td>
                                                <td>{{ $p->telp }}</td>
                                                <td>{{ $p->jenis_kel }}</td>
                                                <td>{{ $p->level }}</td>

                                                <td>
                                                    <a href="/masyarakat/edit/{{ $p->id }}" class="btn btn-warning">Edit</a>
                                                    <a href="/masyarakat/destroy/{{ $p->id }}" class="btn btn-danger fa-fa-trash">Hapus</a>
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
            </div>
        </div>
    </div>
</body>

</html>
@endsection