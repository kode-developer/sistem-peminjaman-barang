<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- JQuery -->
    <script src="/js/jquery-3.3.1.min.js"></script>


    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/peminjaman.css" type="text/css">

    <title>Sistem Peminjaman Barang - PTI Undiksha</title>
</head>
<body>

<!-- header -->
<section class="header">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="text-center">PEMINJAMAN BARANG</h1>
            </div>
        </div>
    </div>
</section>
<!-- header end -->

<!-- button -->
<section class="button">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 offset-lg-2">
                <a href="/peminjaman">    <button type="button" class="btn btn-danger" class="btn btn-primary btn-lg"><h3>PEMINJAMAN</h3></button></a>
            </div>
            <div class="col-lg-4">
                <a href="/pengembalian">   <button type="button" class="btn btn-success" class="btn btn-primary btn-lg"><h3>PENGEMBALIAN</h3></button></a>
            </div>
        </div>
    </div>
</section>
<!-- button end -->

<!-- form -->
<section class="pinjam">
    <div class="container">
        <form method="post" action="/peminjaman">
            @csrf
            <div class="form-group row">
                <label for="jenis" class="col-sm-2 col-form-label offset-sm-2">Jenis Barang</label>
                <div class="col-sm-3">
                    <select class="form-control" onchange="chainSelect(this.value)" name="jenis" required>
                        <option></option>
                        @foreach ($jenisbarangtersedia as $jenis)

                            <option value="{{$jenis->jenis}}">{{ strtoupper($jenis->nama) }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="kode" class="col-sm-2 col-form-label offset-sm-2">Kode Barang</label>
                <div class="col-sm-3">
                    <select class="form-control" name="kode" id="lcd-kode" required>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="nama" class="col-sm-2 col-form-label offset-sm-2">Nama Peminjam</label>
                <div class="col-sm-5">
                    <input class="form-control" title="minimal 5 karakter tanpa digit angka" type="text" name="nama" pattern="^[A-Za-z ]{5,100}$" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="nomorid" class="col-sm-2 col-form-label offset-sm-2">Nomor Id Peminjam</label>
                <div class="col-sm-5">
                    <input class="form-control" type="text" title="nim harus 10 digit" name="nim" pattern="^[0-9]{10,10}$" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="nomorhp" class="col-sm-2 col-form-label offset-sm-2">Nomor HP Peminjam</label>
                <div class="col-sm-5">
                    <input class="form-control" type="text" title="nomor telepon antara 9~12 digit" name="telepon" pattern="^[0-9]{9,12}$" required>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-8 offset-sm-4">
                    <br>
                    <button type="submit" class="btn btn-primary">Pinjam</button>
                </div>
            </div>
        </form>
    </div>
</section>
<!-- form end -->

<!-- footer -->
<section class="footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h6 class="text-center">Copyright @ PTI Undiksha 2019</h6>
            </div>
        </div>
    </div>
</section>
<!-- footer end -->

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="/js/bootstrap.min.js"></script>
<script>
    function chainSelect(val){
        let barang = @json($barangs);
        $("#lcd-kode").empty();

        for(i=0;i<barang.length;i++)
        {
            if(barang[i].jenis == val)
            {
                $("#lcd-kode").append("<option value=\""+barang[i].kode+"\">"+barang[i].kode+"</option>");
            }
        }
    }
</script>
</body>
</html>
