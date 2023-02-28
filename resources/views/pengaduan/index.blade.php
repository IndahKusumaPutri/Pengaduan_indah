<!-- Content Header (Page header) -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <h1 class="m-0">
                    <center>
                        <font color="A8A4CE">Pengaduan</font>
                    </center>
                </h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <!-- <li class="breadcrumb-item"><a href="/Pengaduan/index">Home</a></li> -->
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
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
        <div class="row">
            <div class="col-md-12">
                <div class="card" style="margin-top: 10px">
                    <div class="panel panel-default">
                        <div class="card-header">
                            <div class="col-md-12">
                                <a href="/pengaduan/create" class="btn btn-outline-info"><i class="nav-icon fa fa-thin fa-plus-square"> Tambah Data</i></a>
                                <a href="" target="_blank" class="btn btn-outline-primary"><i class="fas fa-print"> Cetak Data</i></a>
                                <!-- <div class="float-sm-right"> <p>Laporkan Masalah Anda</p> </div> -->
                            </div>
                            <br />
                            <!--/.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table id="table-data" class="table table-hover text-nowrap">
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
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>