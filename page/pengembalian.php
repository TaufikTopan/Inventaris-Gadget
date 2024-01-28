<!doctype html>
<html lang="en">

<head>
    <title>Table 09</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="pengem/css/style.css">

</head>

<body>
    <section class="ftco-section">
        <div class="container">
            <br>
            <div class="row justify-content-center">
                <div class="col-md-6 text-center mb-5">
                    <h2 class="heading-section">Pengembalian Inventaris</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="table-wrap">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode peminjaman</th>
                                    <th>Tanggal Pinjam</th>
                                    <th>Nama Peminjam</th>
                                    <th>Nama Barang</th>
                                    <th>Jumlah</th>
                                    <th>Tanggal Kembali</th>
                                    <th>Status</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $hari = date('d-m-y');
                                $d_peminjaman = "SELECT *, detail_pinjam.jumlah as jml FROM detail_pinjam left join peminjaman on peminjaman.id_peminjaman = detail_pinjam.id_peminjaman left join inventaris on inventaris.id_inventaris = detail_pinjam.id_inventaris left join pegawai on pegawai.id_pegawai = peminjaman.id_pegawai WHERE peminjaman.status_peminjaman ='1'";

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
                                                <?= $hari ?>
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
                                            </td>
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
                                                <a href="?p=detail_pengembalian&id_peminjaman=<?= $data_d['id_peminjaman'] ?>"
                                                    class="btn btn-sm btn-primary">Proses</a>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                } else {
                                    ?>
                                    <td colspan="9">Tidak ada data</td>
                                    <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="pengem/js/jquery.min.js"></script>
    <script src="pengem/js/popper.js"></script>
    <script src="pengem/js/bootstrap.min.js"></script>
    <script src="pengem/js/main.js"></script>

</body>

</html>