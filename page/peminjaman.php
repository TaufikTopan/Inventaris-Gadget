<!doctype html>
<html lang="en">

<head>
    <title>Contact Form 10</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="pemin/css/style.css">

    <link rel="stylesheet" href="peminta/css/style.css">

</head>

<body>
    <?php
    $sql = "SELECT max(id_peminjaman) as maxKode FROM peminjaman";
    $query = mysqli_query($koneksi, $sql);
    $data = mysqli_fetch_array($query);
    $id_peminjaman = $data['maxKode'];

    @$noUrut = (int) substr($id_peminjaman, 3, 3);
    $noUrut++;

    $char = "PMJ";
    $kodePeminjaman = $char . sprintf("%03s", $noUrut);
    ?>
    <section class="ftco-section img bg-hero" style="background-image: url(pemin/images/bg_1.jpg);">
        <div class="container">
            <br>
            <div class="row justify-content-center">
                <div class="col-md-6 text-center mb-5">
                    <h2 class="heading-section">Peminjaman Inventaris</h2>
                </div>
            </div>
            <hr>
            <div class="row justify-content-center">
                <div class="col-lg-13">
                    <div class="wrapper">
                        <div class="row no-gutters justify-content-between">
                            <div class="col-lg-7 d-flex align-items-stretch">
                                <section class="ftco-section">
                                    <br><br><br><br>
                                    <div class="table-wrap">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Kode Pinjam</th>
                                                    <th>Tgl.Pinjam</th>
                                                    <th>Nama Peminjam</th>
                                                    <th>Nama Barang</th>
                                                    <th>Jml</th>
                                                    <th>Tgl.Kembali</th>
                                                    <th>Status</th>
                                                    <th>Opsi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $hari = date('d-m-y');
                                                $d_peminjaman = "SELECT *, detail_pinjam.jumlah as jml FROM detail_pinjam left join peminjaman on peminjaman.id_peminjaman = detail_pinjam.id_peminjaman left join inventaris on inventaris.id_inventaris = detail_pinjam.id_inventaris left join pegawai on pegawai.id_pegawai = peminjaman.id_pegawai";

                                                $d_query = mysqli_query($koneksi, $d_peminjaman);
                                                $cek = mysqli_num_rows($d_query);

                                                if ($cek > 0) {
                                                    $no = 1;
                                                    while ($data_d = mysqli_fetch_array($d_query)) {
                                                        ?>
                                                        <tr>
                                                            <td>
                                                                <?= $no++ ?>
                                                            </td>
                                                            <td>
                                                                <?= $data_d['id_peminjaman'] ?>
                                                            </td>
                                                            <td>
                                                                <?= $data_d['tanggal_pinjam'] ?>
                                                            </td>
                                                            <td>
                                                                <?= $data_d['nama_pegawai'] ?>
                                                            </td>
                                                            <td>
                                                                <?= $data_d['nama'] ?>
                                                            </td>
                                                            <td>
                                                                <?= $data_d['jml'] ?>
                                                            </td>
                                                            <td>
                                                                <?= $data_d['tanggal_kembali'] ?>
                                                            </td> <!--tgl kmbali-->
                                                            <td>
                                                                <?php
                                                                if ($data_d['status_peminjaman'] == '0') {
                                                                    echo "<label class='label label-danger'>Konfirmasi</label>";
                                                                } else if ($data_d['status_peminjaman'] == '1') {
                                                                    echo "<label class='label label-warning'>Dipinjam</label>";
                                                                } else {
                                                                    echo "<label class='label label-success'>Dikembalikan</label>";
                                                                }
                                                                ?>
                                                            </td>
                                                            <td>
                                                                <?php
                                                                if ($data_d['status_peminjaman'] == '0') {
                                                                    ?>
                                                                    <a onclick="return confirm('Apakah anda yakin?')"
                                                                        href="page/proses_peminjaman.php?id_peminjaman=<?= $data_d['id_peminjaman'] ?>"
                                                                        class="btn btn-sm btn-primary">Proses</a>
                                                                    <?php
                                                                }
                                                                ?>
                                                            </td>
                                                        </tr>
                                                        <?php
                                                    }
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </section>
                            </div>
                            <div class="col-lg-4">
                                <div class="contact-wrap w-100 p-md-5 p-4">
                                    <h3 class="mb-4">Peminjaman</h3>
                                    <form action="" method="post">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Kode Peminjaman</label>
                                                    <input name="id_peminjaman" value="<?= $kodePeminjaman ?>"
                                                        type="text" class="form-control" readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="">Nama Peminjam</label>
                                                    <select name="id_pegawai" id="" class="form-control">
                                                        <option name="id_pegawai" value="">Nama Pegawai</option>
                                                        <?php
                                                        $sql_pegawai = "SELECT * FROM pegawai";
                                                        $q_pegawai = mysqli_query($koneksi, $sql_pegawai);
                                                        while ($pegawai = mysqli_fetch_array($q_pegawai)) {
                                                            ?>
                                                            <option value="<?= $pegawai['id_pegawai'] ?>">
                                                                <?= $pegawai['nama_pegawai'] ?>
                                                            </option>
                                                            <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="">Pilih Barang</label>
                                                    <select name="id_inventaris" id="" class="form-control">
                                                        <option name="id_pegawai" value="">Nama Barang</option>
                                                        <?php
                                                        $sql_inventaris = "SELECT * FROM inventaris";
                                                        $q_inventaris = mysqli_query($koneksi, $sql_inventaris);
                                                        while ($inventaris = mysqli_fetch_array($q_inventaris)) {
                                                            ?>
                                                            <option value="<?= $inventaris['id_inventaris'] ?>">
                                                                <?= $inventaris['nama'] ?>
                                                            </option>
                                                            <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="">Jumlah</label>
                                                    <input type="number" class="form-control" name="jumlah">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <button class="btn btn-md btn-primary" name="simpan">Simpan</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <?php
                                if (isset($_POST['simpan'])) {
                                    $id_peminjaman = $_POST['id_peminjaman'];
                                    $id_pegawai = $_POST['id_pegawai'];
                                    $id_inventaris = $_POST['id_inventaris'];
                                    $jumlah = $_POST['jumlah'];

                                    $sql_peminjaman = "INSERT INTO peminjaman SET   
                        id_peminjaman = '$id_peminjaman',
                        id_pegawai = '$id_pegawai',
                        status_peminjaman = '0'";

                                    $query_input = mysqli_query($koneksi, $sql_peminjaman);
                                    if ($query_input) {
                                        $detail_pinjam = "INSERT INTO detail_pinjam SET
                            jumlah = '$jumlah',
                            id_inventaris = '$id_inventaris',
                            id_peminjaman = '$id_peminjaman'";

                                        $q_detail_pinjam = mysqli_query($koneksi, $detail_pinjam);
                                        if ($q_detail_pinjam) {
                                            ?>
                                            <script type="text/javascript">
                                                window.location.href = "?p=peminjaman"
                                            </script>
                                            <?php
                                        } else {
                                            echo "gagal";
                                        }
                                    } else {
                                        echo "Gagal menyimpan";
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="pemin/js/jquery.min.js"></script>
    <script src="pemin/js/popper.js"></script>
    <script src="pemin/js/bootstrap.min.js"></script>
    <script src="pemin/js/jquery.validate.min.js"></script>
    <script src="pemin/js/main.js"></script>

    <script src="peminta/js/jquery.min.js"></script>
    <script src="peminta/js/popper.js"></script>
    <script src="peminta/js/bootstrap.min.js"></script>
    <script src="peminta/js/main.js"></script>

</body>

</html>