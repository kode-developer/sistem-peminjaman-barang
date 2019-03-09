<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Gagal</title>
    <link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Acme" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/css/sukses.css">
    <link rel="stylesheet" type="text/css" href="/css/all.css">

</head>

<body>

<div class="container h-100" >
    <div class="row align-items-center h-100">
        <div class="col-8 mx-auto">
            <div class="jumbotron text-center">
                <i class="fas fa-times fa-10x" style="color: red"></i>

                <h1 class="display-4 fontchange">Gagal Menambahkan Jenis Barang</h1>
                <p class="lead fontchange">Kode Jenis Barang <span style="text-decoration: underline">{{$data->jenis}}</span> Sudah dipakai </p>
                <p class="lead fontchange">oleh barang dengan nama <span style="text-decoration: underline">{{$data->nama}}</span></p>
                <br>
                <p class="btn btn-outline-danger lead fontchange">Silahkan gunakan kode barang yang unik</p>
                <br>
                <p class="lead">


                    <a class="btn btn-primary btn-lg" href="/barang/tambah" role="button">Kembali</a>
                </p>
            </div>
        </div>
    </div>
</div>

</body>

</html>


