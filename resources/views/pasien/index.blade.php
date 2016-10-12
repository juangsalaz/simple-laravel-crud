<!DOCTYPE html>
<html>
<head>
    <title>Klinik Manager | Pasien</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">

<h1>Data Pasien</h1>

<!-- will be used to show any messages -->
@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif
<div style="padding-bottom: 10px;">
    <a class="btn btn-small btn-success" href="{{ URL::to('pasiens/create') }}">Tambah Pasien</a>
</div>
<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <td>ID</td>
            <td>Nama</td>
            <td>Alamat</td>
            <td>Telp</td>
            <td>Actions</td>
        </tr>
    </thead>
    <tbody>
    @foreach($pasiens as $key => $value)
        <tr>
            <td>{{ $value->id }}</td>
            <td>{{ $value->nama }}</td>
            <td>{{ $value->alamat }}</td>
            <td>{{ $value->telp }}</td>

            <!-- we will also add show, edit, and delete buttons -->
            <td>

                <!-- delete the pasien (uses the destroy method DESTROY /pasiens/{id} -->
                <!-- we will add this later since its a little more complicated than the other two buttons -->

                {{ Form::open(array('url' => 'pasiens/' . $value->id, 'class' => 'pull-right')) }}
                    {{ Form::hidden('_method', 'DELETE') }}
                    {{ Form::submit('Hapus pasien', array('class' => 'btn btn-warning')) }}
                {{ Form::close() }}

                <!-- show the pasien (uses the show method found at GET /pasiens/{id} -->
                <a class="btn btn-small btn-success" href="{{ URL::to('pasiens/' . $value->id) }}">Tampilkan pasien</a>

                <!-- edit this pasien (uses the edit method found at GET /pasiens/{id}/edit -->
                <a class="btn btn-small btn-info" href="{{ URL::to('pasiens/' . $value->id . '/edit') }}">Edit pasien</a>

            </td>
        </tr>
    @endforeach
    </tbody>
</table>

</div>
</body>
</html>
