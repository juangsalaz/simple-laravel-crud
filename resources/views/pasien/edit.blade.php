<!DOCTYPE html>
<html>
<head>
    <title>Look! I'm CRUDding</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">

<h1>Edit {{ $pasiens->name }}</h1>

<!-- if there are creation errors, they will show here -->
{{ Html::ul($errors->all()) }}

{{ Form::model($pasiens, array('route' => array('pasiens.update', $pasiens->id), 'method' => 'PUT')) }}

    <div class="form-group">
        {{ Form::label('name', 'Nama') }}
        {{ Form::text('nama', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('alamat', 'Alamat') }}
        {{ Form::textarea('alamat', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('telp', 'No. Telp') }}
        {{ Form::text('telp', null, array('class' => 'form-control')) }}
    </div>

    {{ Form::submit('Edit Pasien', array('class' => 'btn btn-primary pull-right')) }}
    <a href="{{ URL::to('pasiens') }}" class="btn btn-warning pull-right" style="margin-right: 10px;">Cancel</a>

{{ Form::close() }}

</div>
</body>
</html>
