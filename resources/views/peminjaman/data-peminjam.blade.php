
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Data Peminjam</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="/css/bootstrap.min.css"  type="text/css">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="/css/admin.css" type="text/css">

    <!-- Font Awesome JS -->
    <script defer src="/js/solid.js"></script>
    <script defer src="/js/fontawesome.js" ></script>

</head>

<body>

<div class="wrapper">

            @include("layouts/sidebar")

        <h2 id="judul">Data Peminjam Barang</h2>
        <div class="line"></div>

        <table class="table table-bordered">
            <thead >
            <tr>
                <th scope="col">Nim</th>
                <th scope="col">Nama</th>
                <th scope="col">Telepon</th>
                <th scope="col">Pernah Meminjam Barang</th>

            </tr>
            </thead>
            <tbody>
            <tr>
                <td>{{$peminjam->nim}}</td>
                <td>{{$peminjam->nama}}</td>
                <td>{{$peminjam->telepon}}</td>
                <td>{{$jumlah}} Kali</td>
            </tr>
            </tbody>
        </table>

        <div class="btn btn-warning">
        <a href="{{ URL::previous() }}">kembali</a>
        </div>

    </div>
</div>

<!-- jQuery CDN - Slim version (=without AJAX) -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<!-- Popper.JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
<!-- Bootstrap JS -->
<script src="/js/bootstrap.min.js"></script>


</body>

</html>
