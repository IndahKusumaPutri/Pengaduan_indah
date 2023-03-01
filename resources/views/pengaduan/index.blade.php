<!-- Content Header (Page header) -->
<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous"> -->
<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet">
    <title>Pengaduan</title>
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
                        Pengaduan
                    </div>
                    <div class="card-body">
                        <a href="/pengaduan/create" class="btn btn-primary">Laporkan Masalah Anda</a>
                        <br />
                        <br />
                        <table class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr class="table-info">
                                    <th>No</th>
                                    <th>Tanggal Pengaduan</th>
                                    <th>NIK</th>
                                    <th>Isi Laporan</th>
                                    <th>Foto</th>
                                    <th>Status</th>
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
                                    <td>{{ $p->foto }}</td>
                                    <td>{{ $p->status }}</td>
                                    <td>
                                        <form method="post" action="{{ route('pengaduan.destroy', $p->id_pengaduan) }}"> {{ csrf_field() }}
                                            <a href="{{ route('pengaduan.edit', $p->id_pengaduan) }}" class="btn btn-outline-success">Edit</a>
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button class="btn btn-outline-danger" type="submit" onclick="return confirm('Yakin anda ingin menghapus data tersebut?')">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                                <a href="{{route('tanggapan.index')}}">tanggapan</a>
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
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script> -->