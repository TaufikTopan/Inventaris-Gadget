<!DOCTYPE html>
<html>

<head>
    <title>Edit Barang</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"
        integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <style>
        html,
        body {
            min-height: 100%;
        }

        body,
        div,
        form,
        input,
        select {
            padding: 0;
            margin: 0;
            outline: none;
            font-family: Roboto, Arial, sans-serif;
            font-size: 14px;
            color: #666;
            line-height: 22px;
        }

        h1,
        h4 {
            margin: 15px 0 4px;
            font-weight: 400;
        }

        h4 {
            margin: 20px 0 4px;
            font-weight: 400;
        }

        span {
            color: red;
        }

        .small {
            font-size: 10px;
            line-height: 18px;
        }

        .testbox {
            display: flex;
            justify-content: center;
            align-items: center;
            height: inherit;
            padding: 3px;
        }

        form {
            width: 50%;
            padding: 20px;
            background: #fff;
            box-shadow: 0 2px 5px #ccc;
        }

        input {
            width: calc(100% - 10px);
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 3px;
            vertical-align: middle;
        }

        input:hover,
        textarea:hover,
        select:hover {
            outline: none;
            border: 1px solid #095484;
            background: #e6eef7;
        }

        .title-block select,
        .title-block input {
            margin-bottom: 10px;
        }

        select {
            padding: 7px 0;
            border-radius: 3px;
            border: 1px solid #ccc;
            background: transparent;
        }

        select,
        table {
            width: 100%;
        }

        option {
            background: #fff;
        }

        .day-visited,
        .time-visited {
            position: relative;
        }

        input[type="date"]::-webkit-inner-spin-button {
            display: none;
        }

        input[type="time"]::-webkit-inner-spin-button {
            margin: 2px 22px 0 0;
        }

        .day-visited i,
        .time-visited i,
        input[type="date"]::-webkit-calendar-picker-indicator {
            position: absolute;
            top: 8px;
            font-size: 20px;
        }

        .day-visited i,
        .time-visited i {
            right: 5px;
            z-index: 1;
            color: #a9a9a9;
        }

        [type="date"]::-webkit-calendar-picker-indicator {
            right: 0;
            z-index: 2;
            opacity: 0;
        }

        .question-answer label {
            display: block;
            padding: 0 20px 10px 0;
        }

        .question-answer input {
            width: auto;
            margin-top: -2px;
        }

        th,
        td {
            width: 18%;
            padding: 15px 0;
            border-bottom: 1px solid #ccc;
            text-align: center;
            vertical-align: unset;
            line-height: 18px;
            font-weight: 400;
            word-break: break-all;
        }

        .first-col {
            width: 25%;
            text-align: left;
        }

        textarea {
            width: calc(100% - 6px);
        }

        .btn-block {
            margin-top: 20px;
            text-align: center;
        }

        button {
            width: 150px;
            padding: 10px;
            border: none;
            -webkit-border-radius: 5px;
            -moz-border-radius: 5px;
            border-radius: 5px;
            background-color: #095484;
            font-size: 16px;
            color: #fff;
            cursor: pointer;
        }

        button:hover {
            background-color: #0666a3;
        }

        @media (min-width: 568px) {
            .title-block {
                display: flex;
                justify-content: space-between;
            }

            .title-block select {
                width: 30%;
                margin-bottom: 0;
            }

            .title-block input {
                width: 31%;
                margin-bottom: 0;
            }

            th,
            td {
                word-break: keep-all;
            }
        }
    </style>
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
    <div class="testbox">
        <form action="" method="post" enctype="multipart/form-data">
            <h1>Edit Inventaris</h1>
            <h4>Kode Inventaris<span>*</span></h4>
            <input type="text" class="form-control" name="kode_inventaris" placeholder="Masukkan Kode Barang"
                value="<?= $data['kode_inventaris'] ?>">
            <h4>Kondisi<span>*</span></h4>
            <select name="kondisi" id="" class="form-control">
                <option value="<?= $data['kondisi'] ?>" name="kondisi" class="form-control">
                    <?= $data['kondisi'] ?>
                </option>
                <option value="Baru" name="kondisi" class="form-control">Baru</option>
                <option value="Rusak" name="kondisi" class="form-control">Rusak</option>
                <option value="Bekas" name="kondisi" class="form-control">Bekas</option>
            </select>
            <div class="title-block">
                <h4>Jenis Inventaris<span>*</span></h4>
                <h4>Nama Ruang<span>*</span></h4>
                <h4>Nama Inventaris<span>*</span></h4>
            </div>
            <div class="title-block">
                <select class="form-control" name="id_jenis" id="">
                    <option value="<?= $data['id_jenis'] ?>" class="form-control">
                        <?= $data['nama_jenis'] ?>
                    </option>
                    <?php
                    $sql_jenis = "SELECT * FROM jenis";
                    $q_jenis = mysqli_query($koneksi, $sql_jenis);
                    while ($jenis = mysqli_fetch_array($q_jenis)) {
                        ?>
                        <option value="<?= $jenis['id_jenis'] ?>">
                            <?= $jenis['nama_jenis'] ?>
                        </option>
                        <?php
                    }
                    ?>
                </select>
                <select class="form-control" name="id_ruang" id="">
                    <option value="<?= $data['id_ruang'] ?>" class="form-control">
                        <?= $data['nama_ruang'] ?>
                    </option>
                    <?php
                    $sql_ruang = "SELECT * FROM ruang";
                    $q_ruang = mysqli_query($koneksi, $sql_ruang);
                    while ($ruang = mysqli_fetch_array($q_ruang)) {
                        ?>
                        <option value="<?= $ruang['id_ruang'] ?>">
                            <?= $ruang['nama_ruang'] ?>
                        </option>
                        <?php
                    }
                    ?>
                </select>
                <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama Barang"
                    value="<?= $data['nama'] ?>">
            </div>
            <h4>Jumlah<span>*</span></h4>
            <input type="number" class="form-control" name="jumlah" placeholder="Masukkan Jumlah Barang"
                value="<?= $data['jumlah'] ?>">
            <h4>Keterangan</h4>
            <textarea name="ket" id="" cols="30" rows="9" placeholder="Masukkan Keterangan"
                class="form-control"><?= $data['ket'] ?></textarea>
            <h4>Keterangan<span>*</span></h4>
            <input type="number" name="id_petugas" value="1" class="form-control">
            <h4>Foto</h4>
            <input type="file" name="img" class="file">
            <br>

            <img src="img/<?php echo $data['img']; ?>" class="file" width='40%' alt="">
            <p>Nama file :
                <?= $data['img'] ?>
            </p>
            <div class="btn-block">
                <button type="submit" name="simpan">Simpan</button>
                <a href="?p=list_barang" class="btn btn-md btn-default">Kembali</a>
            </div>
        </form>
        <?php
        if (isset($_POST['simpan'])) {
            $kode_inventaris = $_POST['kode_inventaris'];
            $nama = $_POST['nama'];
            $kondisi = $_POST['kondisi'];
            $jumlah = $_POST['jumlah'];
            $id_jenis = $_POST['id_jenis'];
            $id_ruang = $_POST['id_ruang'];
            $id_petugas = $_POST['id_petugas'];
            $ket = $_POST['ket'];

            if (!empty($_FILES['img']['name'])) {
                // Jika ada file gambar yang diupload, lakukan proses upload
                @$img = $_FILES['img']['name'];
                $x = explode('.', $img);
                $ekstensi = strtolower(end($x));
                @$file_tmp = $_FILES['img']['tmp_name'];

                $newimg = date('dmYHis') . $img;
                $path = "img/" . $newimg;

                // Pindahkan file gambar ke folder img
                if (move_uploaded_file($file_tmp, $path)) {
                    // Hapus gambar lama jika ada
                    if (is_file("img/" . $data['img'])) {
                        unlink("img/" . $data['img']);
                    }
                }
            } else {
                // Jika tidak ada file gambar yang diupload, gunakan gambar yang sudah ada
                $newimg = $data['img'];
            }

            // Update data inventaris dengan menggunakan $newimg
            $sql_update = "UPDATE inventaris SET kode_inventaris = '$kode_inventaris',
                        nama = '$nama',
                        kondisi = '$kondisi' ,
                        jumlah = '$jumlah' ,
                        id_jenis = '$id_jenis' ,
                        id_ruang = '$id_ruang' ,
                        keterangan = '$ket',
                        img = '$newimg' WHERE id_inventaris = '$id_inventaris'";

            $q_update = mysqli_query($koneksi, $sql_update);
            if ($q_update) {
                ?>
                <script type="text/javascript">
                    window.location.href = "?p=list_barang&halaman=1"
                </script>
                <?php
            } else {
                ?>
                <div class="alert alert-danger">
                    Inventaris Gagal di update !
                </div>
                <?php
            }
        }
        ?>
    </div>
    <script>

        function konfirmasi() {
            konfirmasi = confirm("Apakah anda yakin ingin menghapus gambar ini?")
            document.writeln(konfirmasi)
        }

        $(document).on("click", "#pilih_gambar", function () {
            var file = $(this).parents().find(".file");
            file.trigger("click");
        });

        $('input[type="file"]').change(function (e) {
            var fileName = e.target.files[0].name;
            $("#file").val(fileName);

            var reader = new FileReader();
            reader.onload = function (e) {
                // get loaded data and render thumbnail.
                document.getElementById("preview").src = e.target.result;
            };
            // read the image file as a data URL.
            reader.readAsDataURL(this.files[0]);
        });
    </script>
</body>

</html>