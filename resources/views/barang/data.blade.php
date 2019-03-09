
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Data Barang</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="/css/admin.css">

    <!-- Font Awesome JS -->
    <script defer src="/js/solid.js"></script>
    <script defer src="/js/fontawesome.js"></script>

</head>

<body>

<div class="wrapper">
    <!-- Sidebar  -->
    @include("layouts/sidebar")

            <h2 id="judul">DATA BARANG</h2>
            <div class="line"></div>

    <!-- Data Barang -->

        @foreach($jenisbarang as $jenis)
            <h4>{{$jenis->nama}}</h4>

            <div class="col-md-6">
            <table class="table table-bordered">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Kode</th>
                    <th scope="col">Status</th>
                </tr>
                </thead>
                <tbody>
                <?php $rownumber =1; ?>
                @foreach($barangs as $barang)
                    @if($barang->jenis == $jenis->jenis)
                <tr @if($barang->status==0)
                    class="table-danger"
                    @endif
                    >
                    <th scope="row">{{$rownumber++}}</th>
                    <td>{{$barang->kode}}</td>
                    <td>
                        @if($barang->status==1)
                            Tersedia
                            @else
                            Dipinjam
                            @endif
                    </td>
                </tr>
                @endif
                    @endforeach
                </tbody>
            </table>
            </div>
        <div class="line"></div>
        @endforeach
    <!-- Data Barang -->

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
