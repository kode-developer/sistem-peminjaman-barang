<!-- Sidebar  -->
<nav id="sidebar">
    <div class="sidebar-header">
        <img src="/img/logo.png"  class="img-fluid">
    </div>

    <ul class="list-unstyled components">
        <li class="active">
            <a href="/home">
                <i class="fas fa-home"></i>
                Home
            </a>
        </li>
        <li>
            <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                <i class="fas fa-database"></i>
                Barang
            </a>
            <ul class="collapse list-unstyled" id="pageSubmenu">
                <li>
                    <a href="/barang/tambah">Tambah</a>
                </li>
                <li>
                    <a href="/barang/hapus">Hapus</a>
                </li>
                <li>
                    <a href="/barang/data">Data</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="/datapeminjaman">
                <i class="fas fa-calendar"></i>
                Data Peminjaman
            </a>
        </li>
        <li>
            <a href="/about">
                <i class="fas fa-question"></i>
                About
            </a>
        </li>

    </ul>

    @if(Request::is('barang/tambah'))
        <ul class="list-unstyled CTAs" id="rubah">
            <li>
                <a onclick="tambahJenis()" href="javascript:void(0);" class="btn btn-warning">Jenis Barang Tidak Ada? <em>Klik Disini</em></a>
            </li>

        </ul>

        @endif

</nav>

<!-- Page Content  -->
<div id="content">

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">

            <button type="button" id="sidebarCollapse" class="btn btn-warning" onclick="changeside()">
                <i class="fas fa-sliders-h"></i>
            </button>

            <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-align-justify"></i>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="/logout">logout</a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
                $(this).toggleClass('active');

            });

        });
    </script>
