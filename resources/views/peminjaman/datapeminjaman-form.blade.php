
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Data Peminjaman</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" type="text/css" href="/css/admin.css">

    <script src="/js/jquery-3.3.1.min.js"></script>

    <!-- Font Awesome JS -->
    <script defer src="/js/solid.js"></script>
    <script defer src="/js/fontawesome.js"></script>

</head>

<body>

<div class="wrapper">
    <!-- Sidebar  -->

    @include("layouts/sidebar")

        <div id>
            <h2 id="judul">DATA PEMINJAMAN</h2>
            <div class="line"></div>
            @if(isset($error))
                <h4 style="color: red;text-align: center">tanggal awal harus sebelum tanggal akhir</h4>
                @endif
            <form id="form-content" action="/datapeminjaman/show" method="get">
                @csrf
                <div class="form-group row">
                    <label for="jenis" class="col-sm-2 col-form-label offset-sm-2">Dari Tanggal</label>
                    <div class="col-sm-3">
                        <input type="date" name="awal" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="jenis" class="col-sm-2 col-form-label offset-sm-2">Sampai Tanggal</label>
                    <div class="col-sm-3">
                        <input type="date" name="akhir" required>
                    </div>
                </div>


                <div class="form-group row">
                    <div class="col-sm-8 offset-sm-4">
                        <br>
                        <button type="submit" class="btn btn-primary">Tampilkan</button>
                    </div>
                </div>
            </form>






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
