<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <?php
    include "../config/koneksi.php";
    @$tgl_awal = $_GET['tgl_awal'];
    @$tgl_sampai = $_GET['tgl_sampai'];
    $hari_ini = date('d-m-y');

    ?>
    <div class="card">
        <div class="card-body">
            <div class="container mb-5 mt-3">
                <div class="row d-flex align-items-baseline">
                    <div class="col-xl-9">
                        <p style="color: #7e8d9f;font-size: 20px;">Laporan Peminjaman >> Periode :
                            <?= date('d-m-y', strtotime($tgl_awal)) ?> <b>s/d</b>
                            <?= date('d-m-y', strtotime($tgl_sampai)) ?>
                        </p>
                    </div>
                    <hr>
                </div>

                <div class="container">
                    <div class="row">
                        <div class="col-xl-8">
                            <ul class="list-unstyled">
                                <!-- <li class="text-muted">To: <span style="color:#5d9fc5 ;">John Lorem</span></li> -->
                                <li class="text-muted">Jln, Kota</li>
                                <li class="text-muted">Provinsi, Negara</li>
                                <li class="text-muted"><i class="fas fa-phone"></i> 123-456-789</li>
                            </ul>
                        </div>
                        <div class="col-xl-4">
                            <p class="text-muted">Invoice</p>
                            <ul class="list-unstyled">
                                <li class="text-muted"><i class="fas fa-circle" style="color:#84B0CA ;"></i> <span
                                        class="fw-bold">ID:</span>#123-456</li>
                                <!-- <li class="text-muted"><i class="fas fa-circle" style="color:#84B0CA ;"></i> <span
                                        class="fw-bold">Creation Date: </span>Jun 23,2021</li> -->
                                <li class="text-muted"><i class="fas fa-circle" style="color:#84B0CA ;"></i> <span
                                        class="me-1 fw-bold">Status:</span><span
                                        class="badge bg-success text-white fw-bold">
                                        Ready</span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="row my-2 mx-1 justify-content-center">
                        <table class="table table-striped table-borderless">
                            <thead style="background-color:#84B0CA ;" class="text-white">
                                <tr>
                                    <th>No</th>
                                    <th>Nama Peminjam</th>
                                    <th>Nama Inventaris</th>
                                    <th>Jumlah</th>
                                    <th>Tanggal Peminjaman</th>
                                    <th>Tanggal Pengembalian</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $cari = '';
                                @$tglDari = $_GET['tglDari'];
                                @$tglSampai = $_GET['tglSampai'];

                                if (!empty($tglDari)) {
                                    $cari .= "and tanggal_pinjam >= '" . $tglDari . "'";

                                }
                                if (!empty($tglSampai)) {
                                    $cari .= "and tanggal_pinjam <= '" . $tglSampai . "'";

                                }
                                // if(empty($tglDari) && empty($tglSampai)){
                                //     $cari .= "and tanggal_pinjam >= '".$hari_ini."' and tanggal_pinjam >='".$hari_ini."'";
                                // }
                                
                                $sql = "SELECT *, detail_pinjam.jumlah as jml FROM detail_pinjam left join peminjaman on peminjaman.id_peminjaman = detail_pinjam.id_peminjaman left join inventaris on inventaris.id_inventaris = detail_pinjam.id_inventaris left join pegawai on pegawai.id_pegawai = peminjaman.id_pegawai WHERE 1=1 $cari";

                                $query = mysqli_query($koneksi, $sql);
                                $cek = mysqli_num_rows($query);

                                if ($cek > 0) {
                                    $no = 1;
                                    while ($data = mysqli_fetch_array($query)) {
                                        ?>
                                        <tr>
                                            <td>
                                                <?= $no++ ?>
                                            </td>
                                            <td>
                                                <?= $data['nama_pegawai'] ?>
                                            </td>
                                            <td>
                                                <?= $data['nama'] ?>
                                            </td>
                                            <td>
                                                <?= $data['jml'] ?>
                                            </td>
                                            <td>
                                                <?= $data['tanggal_pinjam'] ?>
                                            </td>
                                            <td>
                                                <?= $data['tanggal_kembali'] ?>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                } else {
                                    ?>
                                    <tr>
                                        <td colspan="6">Tidak Ada Data</td>
                                    </tr>
                                    <?php
                                }
                                ?>
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
<script type="text/javascript">
    window.print();
</script>