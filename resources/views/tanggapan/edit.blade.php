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
        Ubah Pengaduan
      </div>
      <div class="card-body">
        <a href="/tanggapan" class="btn btn-primary">Kembali</a>

        <form method="post" action="/tanggapan/update/{{ $tanggapan->id_tanggapan }}">
          {{ csrf_field() }}
          {{ method_field('PUT') }}

          <!-- /.card-header -->
          <!-- <form class="form-horizontal" action="/tanggapan/edit/{{ $tanggapan->id_tanggapan }}" method="post"> {{ csrf_field() }}
            <input type="hidden" name="_method" value="POST"> --> -->

          <div class="form-group row">
            <label class="control-label col-sm-2">Tanggal Tanggapan</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="tgl_tanggapan" value="{{ $tanggapan->tgl_tanggapan }}">
            </div>
          </div>

          <div class="form-group row">
            <label class="control-label col-sm-2">Tanggapan</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="tanggapan" value="{{ $tanggapan->tanggapan }}">
            </div>
          </div>

          <div class="form-group row">
            <label class="control-label col-sm-2">NIK</label>
            <div class="col-sm-10">
              <input type="number" class="form-control" name="nik" value="{{ $tanggapan->nik }}">
            </div>
          </div>

          <div class="form-group row">
            <div class="col-sm-offset-2 col-sm-6">
              <button type="submit" class="btn btn-outline-primary" onclick="return confirm('Yakin anda ingin mengubah data tersebut?')">Perbaharui Data</button>
              <a href="{{ route('tanggapan.index') }}" class="btn btn-outline-danger">Batal</a>
            </div>
          </div>

        </form>
      </div>
    </div>
  </div>
</body>

</html>
@endsection