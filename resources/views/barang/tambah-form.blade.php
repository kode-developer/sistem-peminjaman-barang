
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Tambah Barang</title>

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

        <h2 id="judul">TAMBAH BARANG</h2>
        <div class="line"></div>

        <form id="form-content" action="/barang/tambah" method="post">
            @csrf
            <div class="form-group row remove">
                <label for="jenis" class="col-sm-2 col-form-label offset-sm-2">Jenis Barang</label>
                <div class="col-sm-3">
                    <select class="form-control" name="jenis" required>
                        @foreach($jenisbarang as $jenis)
                            <option value="{{$jenis->jenis}}">{{strtoupper($jenis->nama)}}</option>
                            @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group row remove">
                <label for="jenis" class="col-sm-2 col-form-label offset-sm-2">Jumlah Barang</label>
                <div class="col-sm-3">
                    <select class="form-control" name="jumlah">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>


                    </select>
                </div>
            </div>



            <div class="form-group row remove">
                <div class="col-sm-8 offset-sm-4">
                    <br>
                    <button type="submit" class="btn btn-primary">Tambah</button>
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
    function tambahJenis() {
        $("#judul").empty();
        $(".remove").remove();
        $("#rubah").remove()
        $("#judul").append("TAMBAH JENIS BARANG");

        $("#form-content").attr("action","/barang/tambah/jenis");
        $("#form-content").append("  <div class=\"form-group row\">\n" +
            "                    <label for=\"kode\" class=\"col-sm-2 col-form-label offset-sm-2\">Kode Jenis</label>\n" +
            "                    <div class=\"col-sm-3\">\n" +
            "                        <input class=\"form-control\" title=\"Minimal 2 Maksimal 7 Karakter dan Tidak Boleh Angka dan spasi\" name=\"jenis\" type=\"text\" pattern=\"^[A-Za-z]{2,7}$\" required>        \n" +
            "                    </div>\n" +
            "                </div>");
        $("#form-content").append(" <div class=\"form-group row\">\n" +
            "                    <label for=\"kode\" class=\"col-sm-2 col-form-label offset-sm-2\">Nama Barang</label>\n" +
            "                    <div class=\"col-sm-3\">\n" +
            "                        <input class=\"form-control\" title=\"Minimal 2, Maksimal 100 karakter\" name=\"nama\" type=\"text\"  pattern=\"^[A-Za-z ]{2,100}$\" required>        \n" +
            "                    </div>\n" +
            "                </div>");

        $("#form-content").append("<div class=\"form-group row\">\n" +
            "                <div class=\"col-sm-8 offset-sm-4\">\n" +
            "                    <br>\n" +
            "                    <button type=\"submit\" class=\"btn btn-primary\">Tambah</button>\n" +
            "                </div>\n" +
            "            </div>");
    }
</script>

</body>

</html>
