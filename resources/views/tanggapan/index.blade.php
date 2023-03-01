@extends('layouts.app')
@section('content')
@section('menu', 'master')
@section('submenu', 'kader')
@section('title','Data Kader')
@section('content')
<!-- Content Header (Page header) -->
{{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous"> --}}
<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet">
    <title>Tanggapan</title>
</head>

<body>
    <div class="content">
        <div class="container-fluid">
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
                    <div class="card-header text-center">
                        Tanggapan
                    </div>
                    <div class="card-body">
                        <a href="/tanggapan/create" class="btn btn-primary">Beri Tanggapan</a>
                        <br />
                        <br />
                        <table class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr class="table-info">
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
{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script> --}}