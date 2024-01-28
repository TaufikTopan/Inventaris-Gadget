<!doctype html>
<html lang="en">

<head>
    <title>Contact Form 03</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="lih/css/style.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

</head>

<body>
    <?php
    $id_inventaris = $_GET['id_inventaris'];
    if (empty($id_inventaris)) {
        ?>
        <script type="text/javascript">
            window.location.href = "?p=list_barang";
        </script>
        <?php
    }

    $sql = "SELECT *, inventaris.keterangan as ket FROM inventaris LEFT JOIN ruang ON ruang.id_ruang = inventaris.id_ruang LEFT JOIN jenis ON jenis.id_jenis = inventaris.id_jenis WHERE id_inventaris = '$id_inventaris'";
    $query = mysqli_query($koneksi, $sql);
    $cek = mysqli_num_rows($query);

    if ($cek > 0) {
        $data = mysqli_fetch_array($query);
    } else {
        $data = NULL;
    }
    ?>
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="wrapper">
                        <div class="row no-gutters">
                            <div class="col-md-7">
                                <div class="contact-wrap w-100 p-md-5 p-4">
                                    <h3 class="mb-4">Lihat secara menyeluruh</h3>
                                    <form method="POST" id="contactForm" name="contactForm" class="contactForm">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="label" for="name">Kode Inventaris</label>
                                                    <input type="text" class="form-control" name="kode_inventaris"
                                                        value="<?= $data['kode_inventaris'] ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="label" for="email">Nama Inventaris</label>
                                                    <input type="text" class="form-control" name="nama"
                                                        value="<?= $data['nama'] ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="label" for="subject">Kondisi barang</label>
                                                    <input type="text" class="form-control" name="kondisi"
                                                        value="<?= $data['kondisi'] ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="label" for="#">Tanggal register</label>
                                                    <input type="text" class="form-control" name="tanggal_register"
                                                        value="<?= $data['tanggal_register'] ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="label" for="#">Jumlah barang</label>
                                                    <input type="text" class="form-control" name="jumlah"
                                                        value="<?= $data['jumlah'] ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="label" for="#">Nama ruang</label>
                                                    <input type="text" class="form-control" name="nama_ruang"
                                                        value="<?= $data['nama_ruang'] ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="label" for="#">Keterangan barang</label>
                                                    <input type="text" class="form-control" name="ket"
                                                        value="<?= $data['ket'] ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <a href="?p=list_barang&halaman=1?>" class="btn btn-success"><span
                                                            class="fas fa-eye-slash"></span></a>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <a href="?p=edit_barang&id_inventaris=<?= $data['id_inventaris'] ?>"
                                                        class="btn btn-primary"><span class="fas fa-edit"></span></a>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <a onclick="return confirm('Apakah anda yakin untuk menghapusnya?')"
                                                        href="page/hapus_barang.php?id_inventaris=<?= $data['id_inventaris'] ?>"
                                                        class="btn btn-danger"><span
                                                            class="fas fa-trash-alt"></span></a>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-md-5 d-flex align-items-stretch">
                                <div class="info-wrap w-100 p-5 img">
                                    <img src="img/<?php echo $data['img']; ?>" class="image popup-trigger" width="100%"
                                        alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="lih/js/jquery.min.js"></script>
    <script src="lih/js/popper.js"></script>
    <script src="lih/js/bootstrap.min.js"></script>
    <script src="lih/js/jquery.validate.min.js"></script>
    <script src="lih/js/main.js"></script>
</body>

</html>

<!-- start -->
<!-- <div class="col-lg-3 center">
    <div class="panel panel-body">
        <div class="panel panel-success">
            <div class="panel panel-heading">
                <label>Foto barang</label>
            </div>
            <div class="panel panel-body">
                <img src="img/<?php echo $data['img']; ?>" class="" width='100%' alt="">
            </div>
        </div>
    </div>
</div> -->
<!-- end -->