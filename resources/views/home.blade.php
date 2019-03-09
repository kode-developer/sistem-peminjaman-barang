
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Home</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="/css/bootstrap.min.css" type="text/css">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="/css/admin.css" type="text/css">
    <script src="/js/jquery-3.3.1.min.js"></script>
    <!-- Font Awesome JS -->
    <script defer src="/js/solid.js"></script>
    <script defer src="/js/fontawesome.js"></script>

</head>

<body>

<div class="wrapper">
    <!-- Sidebar  -->
    @include("layouts/sidebar")


    @if(isset($datapeminjaman))
        <h4 style="text-align: center">Daftar Peminjam yang Belum Mengembalikan Barang</h4>
        <div class="line"></div>

    <div class="col-md-8">
        <table class="table table-bordered">
            <thead >
            <tr class="table-primary">
                <th scope="col">#</th>
                <th scope="col">Barang</th>
                <th scope="col">Nim</th>
                <th scope="col">Waktu Peminjaman</th>

            </tr>
            </thead>
            <tbody>
            <?php $baris=1; ?>
            @foreach($datapeminjaman as $data)
            <tr>
                <th scope="row">{{$baris++}}</th>
                <td>{{$data->kodebarang}}</td>
                <td><a style="text-decoration: underline" href="/datapeminjam?nim={{$data->nim}}">{{$data->nim}}</a></td>
                <td>{{date('d-m-Y H:i',strtotime($data->tglpinjam))}}</td>
            </tr>
                @endforeach
            </tbody>
        </table>
    </div>

        @else
        <h4 style="text-align: center">Tidak Ada Yang Meminjam Barang :)</h4>
        <div class="line"></div>
    @endif

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
