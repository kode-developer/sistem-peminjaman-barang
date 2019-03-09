
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Hapus Barang</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="/css/admin.css">
    <script src="/js/jquery-3.3.1.min.js"></script>
    <!-- Font Awesome JS -->
    <script defer src="/js/solid.js" ></script>
    <script defer src="/js/fontawesome.js"></script>

</head>

<body>

<div class="wrapper">
    <!-- Sidebar  -->
    @include("layouts/sidebar")


            <h2 id="judul">HAPUS BARANG</h2>
            <div class="line"></div>

            <form id="form-content" action="/barang/hapus" method="post">
                @csrf
                <div class="form-group row">
                    <label for="jenis" class="col-sm-2 col-form-label offset-sm-2">Jenis Barang</label>
                    <div class="col-sm-3">
                        <select class="form-control" name="jenis" id="jenis-barang" onchange="chainSelect(this.value)" required>
                            <option></option>
                            @foreach($jenisbarang as $barang)
                                <option value="{{$barang->jenis}}">{{strtoupper($barang->nama)}}</option>
                                @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="jenis" class="col-sm-2 col-form-label offset-sm-2">Kode Barang</label>
                    <div class="col-sm-3">
                        <select class="form-control" name="kode" id="kode-barang" required>
                        </select>
                    </div>
                </div>



                <div class="form-group row">
                    <div class="col-sm-8 offset-sm-4">
                        <br>
                        <button type="submit" class="btn btn-primary">Hapus</button>
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

    <script>
        function chainSelect(val) {
            let barang = @json($barangs);

            $("#kode-barang").empty();

            for(i=0;i<barang.length;i++)
            {
                if(barang[i].jenis == val)
                {
                    if(barang[i].status==1){
                        $("#kode-barang").append("<option  value=\""+barang[i].kode+"\">"+barang[i].kode+"</option>");

                    }else {
                        $("#kode-barang").append("<option style='color:red' value=\""+barang[i].kode+"\" disabled>"+barang[i].kode+" ~ Masih Dipinjam</option>");

                    }

                                  }
            }
        }
    </script>

</body>

</html>
