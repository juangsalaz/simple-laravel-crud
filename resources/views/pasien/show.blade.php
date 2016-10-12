<!DOCTYPE html>
<html>
<head>
    <title>Show Pasien</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">

<h1>Showing {{ $pasiens->nama }}</h1>

    <div class="jumbotr on text-center">
        <h2>{{ $pasiens->nama }}</h2>
        <p>
            <strong>Alamat:</strong> {{ $pasiens->alamat }}<br>
            <strong>Telp:</strong> {{ $pasiens->telp }}
        </p>
    </div>

</div>
</body>
</html>
