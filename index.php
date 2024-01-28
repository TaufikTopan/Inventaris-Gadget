<?php
session_start();
include "config/koneksi.php";
if (!empty($_SESSION['username'])) {
  @$user = $_SESSION['username'];
  @$level = $_SESSION['level'];
}

?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">

  <link rel="stylesheet" href="page/nv/fonts/icomoon/style.css">

  <link rel="stylesheet" href="page/nv/css/owl.carousel.min.css">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="page/nv/css/bootstrap.min.css">

  <!-- Style -->
  <link rel="stylesheet" href="page/nv/css/style.css">

  <style>
    body {
      font-size: 12px;
      font-weight: 500;
    }
  </style>

  <title>Aplikasi Inventaris Kantor</title>
</head>

<body>


  <div class="site-mobile-menu site-navbar-target">
    <div class="site-mobile-menu-header">
      <div class="site-mobile-menu-close mt-3">
        <span class="icon-close2 js-menu-toggle"></span>
      </div>
    </div>
    <div class="site-mobile-menu-body"></div>
  </div>
  <header class="site-navbar site-navbar-target" role="banner">

    <div class="container">
      <div class="row align-items-center position-relative">


        <!-- <div class="site-logo">
          <a href="?p=home" class="text-black"><span class="text-primary">Aplikasi Inventaris</a>
        </div> -->

        <div class="col-12">
          <nav class="site-navigation text-right ml-auto " role="navigation">

            <ul class="site-menu main-menu js-clone-nav ml-auto d-none d-lg-block">
              <li><a href="?p=home" class="text-black"><span class="text-primary">Aplikasi Inventaris</a></li>
              <?php
              if (@$level == "1") {
                ?>
                <li><a href="?p=list_barang&halaman=1" class="nav-link">Daftar Inventaris</a></li>
                <li><a href="?p=peminjaman" class="nav-link">Peminjaman</a></li>
                <li><a href="?p=pengembalian" class="nav-link">Pengembalian</a></li>
                <li><a href="?p=laporan" class="nav-link">Laporan</a></li>
                <?php
              }
              ?>
              <?php
              if (@$level == "2") {
                ?>
                <li><a href="?p=peminjaman" class="nav-link">Peminjaman</a></li>
                <li><a href="?p=pengembalian" class="nav-link">Pengembalian</a></li>
                <?php
              }
              ?>
              <?php
              if (@$level == "3") {
                ?>
                <li><a href="?p=peminjaman01" class="nav-link">Peminjaman</a></li>
                <?php
              }
              ?>
              <?php
              if (!empty($user)) {
                ?>
                <li class="has-children">
                  <a href="#about-section" class="nav-link">
                    <?= $user ?>
                  </a>
                  <ul class="dropdown arrow-top">
                    <li><a onclick="return confirm('Apakah anda yakin?')" href="page/keluar.php"
                        class="nav-link">Keluar</a></li>
                    <?php
              }
              ?>
                </ul>
          </nav>
          <div class="container">
            <?php
            if (!empty($_SESSION['username'])) {
              $user = $_SESSION['username'];

              @$p = $_GET['p'];
              switch ($p) {
                case 'login':
                  include "page/login.php";
                  break;

                case 'list_barang':
                  include "page/list_barang.php";
                  break;

                case 'lihat_isi':
                  include "page/lihat_isi.php";
                  break;

                case 'tambah_barang':
                  include "page/tambah_barang.php";
                  break;

                case 'peminjaman':
                  include "page/peminjaman.php";
                  break;

                case 'pengembalian':
                  include "page/pengembalian.php";
                  break;

                case 'home':
                  include "page/home.php";
                  break;

                case 'keluar':
                  include "page/keluar.php";
                  break;

                case 'detail_pengembalian':
                  include "page/detail_pengembalian.php";
                  break;

                case 'laporan':
                  include "page/laporan.php";
                  break;

                case 'edit_barang':
                  include "page/edit_barang.php";
                  break;

                case 'peminjaman01':
                  include "page/peminjaman01.php";
                  break;

                case 'hapus':
                  include "page/hapus_barang.php";
                  break;

                case 'simpan':
                  include "page/simpan.php";
                  break;

                default:
                  include "page/login.php";
                  break;
              }
            } else {
              include "page/login.php";
            }
            ?>
            <!-- Main component for a primary marketing message or call to action -->


          </div>

        </div>

        <div class="toggle-button d-inline-block d-lg-none"><a href="#"
            class="site-menu-toggle py-5 js-menu-toggle text-black"><span class="icon-menu h3"></span></a></div>

      </div>
    </div>

  </header>





  <script src="page/nv/js/jquery-3.3.1.min.js"></script>
  <script src="page/nv/js/popper.min.js"></script>
  <script src="page/nv/js/bootstrap.min.js"></script>
  <script src="page/nv/js/jquery.sticky.js"></script>
  <script src="page/nv/js/main.js"></script>
</body>

</html>
<script type="text/javascript">
  $(document).on('click', '#cetak', function () {
    var tgl_awal = $("#tgl_awal").val();
    var tgl_sampai = $("#tgl_sampai").val();
    window.open('page/cetak.php?tgl_awal=' + tgl_awal + "&tgl_sampai=" + tgl_sampai, '_blank');
  });
</script>