<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="pemin/css/style.css">
    <title>Detail Pengembalian</title>
</head>

<body>
    <?php
    $id_peminjaman = $_GET['id_peminjaman'];
    if (empty($id_peminjaman)) {
        ?>
        <script type="text/javascript">
            windows.location.href = "?p=pengembalian";
        </script>
        <?php
    }
    $hari = date('d-m-y');
    $d_peminjaman = "SELECT *, detail_pinjam.jumlah as jml FROM detail_pinjam left join peminjaman on peminjaman.id_peminjaman = detail_pinjam.id_peminjaman left join inventaris on inventaris.id_inventaris = detail_pinjam.id_inventaris left join pegawai on pegawai.id_pegawai = peminjaman.id_pegawai  WHERE peminjaman.id_peminjaman ='$id_peminjaman'";

    $d_query = mysqli_query($koneksi, $d_peminjaman);
    $data = mysqli_fetch_array($d_query);
    ?>

    <div class="col-lg-5">
        <div class="contact-wrap w-100 p-md-5 p-4">
            <h3 class="mb-4">Konfirmasi Pengembalian Inventaris</h3>
            <form action="" method="post">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="" class="">Kode Peminjaman</label>
                            <input type="text" name="id_peminjaman" id="" class="form-control"
                                value="<?= $data['id_peminjaman'] ?>" readonly>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="" class="">Tanggal Peminjaman</label>
                            <input type="text" name="tgl_pinjam" id="" class="form-control" value="<?= $hari ?>"
                                readonly>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="" class="">Nama Peminjam</label>
                            <input type="text" name="nama_pegawai" id="" class="form-control"
                                value="<?= $data['nama_pegawai'] ?>" readonly>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="" class="">Nama Barang</label>
                            <input type="text" name="nama" id="" class="form-control" value="<?= $data['nama'] ?>"
                                readonly>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="" class="">Jumlah</label>
                            <input type="number" name="jml" id="" class="form-control" value="<?= $data['jml'] ?>"
                                readonly>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="" class="">Tanggal Pengembalian</label>
                            <input type="date" name="tgl_kembali" id="" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <button class="btn btn-primary btn-md" type="submit" name="simpan">Simpan</button>
                            <a href="?p=pengembalian" class="btn btn-md btn-default">Kembali</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <?php
    if (isset($_POST['simpan'])) {
        $tgl_kembali = $_POST['tgl_kembali'];

        $sql_pengembalian = "UPDATE peminjaman SET tanggal_kembali = '$tgl_kembali', status_peminjaman = '2' WHERE id_peminjaman = '$id_peminjaman'";
        $q_pengembalian = mysqli_query($koneksi, $sql_pengembalian);

        if ($q_pengembalian) {
            ?>
            <script type="text/javascript">
                window.location.href = "?p=pengembalian";

            </script>
            <?php
        } else {
            ?>
            <div class="alert alert-danger">
                Barang Gagal Untuk Diupdate!
            </div>
            <?php
        }
    }
    ?>
    </div>
    </div>
    <script src="pemin/js/jquery.min.js"></script>
    <script src="pemin/js/popper.js"></script>
    <script src="pemin/js/bootstrap.min.js"></script>
    <script src="pemin/js/jquery.validate.min.js"></script>
    <script src="pemin/js/main.js"></script>
</body>

</html>