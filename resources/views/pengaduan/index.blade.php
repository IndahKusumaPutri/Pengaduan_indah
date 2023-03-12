@extends('layouts.user.app')

@section('content')

<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
                <a href="{{ route('pengaduan.create') }}" class="btn btn-primary btn-rounded btn-fw">Laporkan!</a>

                <div class="table-responsive pt-3">
                    <table class="table table-bordered table-hover table-striped">
                        <thead>

                            <!-- <tr class="table-info"> -->
                            <tr>
                                <th>No</th>
                                <th>Tanggal Pengaduan</th>
                                <!-- <th>NIK</th> -->
                                <th>Isi Laporan</th>
                                <th>Foto</th>
                                <!-- <th>Status</th> -->
                                <th>Keterangan</th>
                                <th>Opsi</th>
                            </tr>

                        </thead>
                        <tbody>
                            @foreach ($pengaduan as $i => $p)

                            <tr>
                                <td>{{ $i + 1 }}</td>
                                <td>{{ $p->tgl_pengaduan }}</td>
                                <!-- <td>{{ $p->nik }}</td> -->
                                <td>{{ $p->isi_laporan }}</td>
                                <!-- <td>{{ $p->foto }}</td> -->
                                <td>
                                    @php
                                    $foto = App\Models\Pengaduan_Image::where('id_pengaduan', $p->unique_id)->get();
                                    @endphp
                                    @foreach($foto as $item)
                                    <a href="{{ asset('images/'. $p->foto) }}/{{$item->foto}}" target="_blank" rel="noopener noreferrer">
                                        <img src="{{ asset('images/'. $p->foto) }}/{{$item->foto}}" height="15%" width="30%">
                                    </a>
                                    @endforeach
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
    </div>
</body>

</html>
@endsection