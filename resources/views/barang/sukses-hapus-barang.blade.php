<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Sukses Hapus</title>
    <link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Acme" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/css/sukses.css">
    <link rel="stylesheet" href="/css/all.css">

</head>

<body>

<div class="container h-100" >
    <div class="row align-items-center h-100">
        <div class="col-8 mx-auto">
            <div class="jumbotron text-center">
                <i class="fas fa-trash-alt fa-10x" style="color: green"></i>

                <h1 class="display-4 fontchange">Sukses Hapus Barang</h1>

                        <p class="btn btn-warning btn-lg lead fontchange">{{$data['nama']}} Kode => {{$data['kode']}} </p>

                <p class="lead">


                    <a class="btn btn-primary btn-lg" href="/barang/hapus" role="button">kembali</a>
                </p>
            </div>
        </div>
    </div>
</div>

</body>

</html>


