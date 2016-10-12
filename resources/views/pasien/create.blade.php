<!DOCTYPE html>
<html>
<head>
    <title>Klinik Manager | Tambah Pasien</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container">

        <h1>Tambah Pasien</h1>
        {{ Html::ul($errors->all()) }}
        {{ Form::open(array('url' => 'pasiens')) }}
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" name="nama" class="form-control">
            </div>
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <textarea type="text" name="alamat" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <label for="telp">No. Telp</label>
                <input type="text" name="telp" class="form-control">
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary pull-right" value="Submit">
                <a href="{{ URL::to('pasiens') }}" class="btn btn-warning pull-right" style="margin-right: 10px;">Cancel</a>
            </div>
        {{ Form::close() }}
    </div>
</body>
</html>
