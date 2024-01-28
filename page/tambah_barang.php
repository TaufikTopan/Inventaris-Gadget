<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/nav.css">
    <title>Tambah barang</title>
    <style>
        *{
        padding: 0;
        margin: 0;
        box-sizing: border-box;
        font-family: "Poppins", sans-serif;
        }
        body{
            display: flex;
            margin: 0 auto;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            /* background: url('img/adhxm.png'); */
            background-size: cover;
            background-position: center;
        }
        .panel{
        margin: 0 auto;
        justify-content: center;
        background-color: transparent;
        border: 2px solid rgba(255, 255, 255, .2);
        backdrop-filter: blur(20px);
        color: white;
        box-shadow: rgba(0, 0, 0, .2);
        }

    </style>
</head>
<body>
    <div class="row">
        <div class="col-lg-12 center">
            <div class="panel panel-success">
                <div class="panel-heading">Tambah Inventaris</div>
                <div class="panel-body">
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="col-lg-5 center">
                                <div class="panel panel-primary">
                                    <div class="panel panel-heading">
                                            <label>Kode Inventaris</label>
                                    </div>
                                    <div class="panel panel-body">
                                            <input type="text" class="form-control" name="kode_inventaris" placeholder="Masukkan Kode Barang">
                                    </div>
                                    <div class="panel panel-heading">
                                        <label>Kondisi</label>
                                    </div>
                                    <div class="panel panel-body">
                                        <select name="kondisi" id="" class="form-control">
                                            <option value="" name="kondisi" class="form-control">Pilih</option>
                                            <option value="Baru" name="kondisi" class="form-control">Baru</option>
                                            <option value="Rusak" name="kondisi" class="form-control">Rusak</option>
                                            <option value="Bekas" name="kondisi" class="form-control">Bekas</option>
                                        </select>
                                    </div>
                                    
                                    <div class="panel panel-heading">
                                            <label for="">Jenis Inventaris</label>
                                    </div>
                                    <div class="panel panel-body">
                                        <select class="form-control" name="id_jenis" id="">
                                        <option value="" class="form-control">-- pilih --</option>
                                        <?php
                                        $sql_jenis = "SELECT * FROM jenis";
                                        $q_jenis = mysqli_query($koneksi, $sql_jenis);
                                        while ($jenis = mysqli_fetch_array($q_jenis)) {
                                            ?>
                                                        <option value="<?= $jenis['id_jenis'] ?>"><?= $jenis['nama_jenis'] ?></option>
                                                        <?php
                                        }
                                        ?>
                                        </select>
                                    </div>
                                    <div class="panel panel-heading">
                                        <label for="">Nama Ruang</label>
                                    </div>
                                    <div class="panel panel-body">
                                        <select class="form-control" name="id_ruang" id="">
                                        <option value="" class="form-control">-- pilih --</option>
                                        <?php
                                        $sql_ruang = "SELECT * FROM ruang";
                                        $q_ruang = mysqli_query($koneksi, $sql_ruang);
                                        while ($ruang = mysqli_fetch_array($q_ruang)) {
                                            ?>
                                                        <option value="<?= $ruang['id_ruang'] ?>"><?= $ruang['nama_ruang'] ?></option>
                                                        <?php
                                        }
                                        ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-7 center">
                                <div class="panel panel-primary">
                                    
                                    <div class="panel panel-heading">
                                        <label>Nama Inventaris</label>
                                    </div>
                                    <div class="panel panel-body">
                                        <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama Barang">
                                    </div>
                                    <div class="panel panel-heading">
                                        <label>Jumlah</label>
                                    </div>
                                    <div class="panel panel-body">
                                        <input type="number" class="form-control" name="jumlah" placeholder="Masukkan Jumlah Barang">
                                    </div>

                                    <div class="panel panel-heading">
                                        <label>Keterangan</label>
                                    </div>
                                    <div class="panel panel-body">
                                        <textarea name="keterangan" id="" cols="30" rows="9" placeholder="Masukkan Keterangan" class="form-control"></textarea>
                                    </div>
                                    <div class="form-group hidden">
                                        <label>Keterangan</label>
                                        <input type="number" name="id_petugas" value="1" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 center">
                                <div class="panel panel-primary">
                                    <div class="panel panel-heading">
                                        <label>Foto</label>
                                    </div>
                                    <div class="panel panel-body">
                                        <input type="file" name="img" class="file" >
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-md btn-primary" name="simpan">Simpan</button>
                                <a href="?p=list_barang" class="btn btn-md btn-default">Kembali</a>
                            </div>
                        </form>
                        <?php

                        if (isset($_POST['simpan'])) {
                            //Include file koneksi, untuk koneksikan ke database
                            //include 'database.php';
                            //Cek apakah ada kiriman form dari method post
                            if ($_SERVER["REQUEST_METHOD"] == "POST") {

                                $ekstensi_diperbolehkan = array('png', 'jpg');
                                @$img = $_FILES['img']['name'];
                                $x = explode('.', $img);
                                $ekstensi = strtolower(end($x));
                                @$file_tmp = $_FILES['img']['tmp_name'];

                                $kode_inventaris = $_POST['kode_inventaris'];
                                $nama = $_POST['nama'];
                                $kondisi = $_POST['kondisi'];
                                $jumlah = $_POST['jumlah'];
                                $id_jenis = $_POST['id_jenis'];
                                $id_ruang = $_POST['id_ruang'];
                                $keterangan = $_POST['keterangan'];
                                $id_petugas = $_POST['id_petugas'];

                                if (!empty($img)) {
                                    if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {

                                        //Mengupload img
                                        move_uploaded_file($file_tmp, 'img/' . $img);

                                        $sql = "insert into inventaris (kode_inventaris, nama, kondisi, jumlah, id_jenis, id_ruang, keterangan, id_petugas, img) values ('$kode_inventaris', '$nama', '$kondisi', '$jumlah', '$id_jenis', '$id_ruang', '$keterangan', '$id_petugas', '$img')";

                                        $query = mysqli_query($koneksi, $sql);
                                        if ($query) {
                                            ?>
                                                                <div class="alert alert-success">Barang Berhasil Ditambahkan</div>
                                                            <?php
                                        } else {
                                            ?>
                                                                <div class="alert alert-danger">Barang Gagal Ditambahkan</div>
                                                            <?php
                                        }

                                    }
                                } else {
                                    $img = "bank_default.png";
                                }
                            }

                        }
                        ?>

                    </div>
                </div>
            </div>
    </div>
</body>
</html>

<script>

    function konfirmasi(){
        konfirmasi=confirm("Apakah anda yakin ingin menghapus gambar ini?")
        document.writeln(konfirmasi)
    }

    $(document).on("click", "#pilih_gambar", function() {
    var file = $(this).parents().find(".file");
    file.trigger("click");
    });

    $('input[type="file"]').change(function(e) {
    var fileName = e.target.files[0].name;
    $("#file").val(fileName);

    var reader = new FileReader();
    reader.onload = function(e) {
        // get loaded data and render thumbnail.
        document.getElementById("preview").src = e.target.result;
    };
    // read the image file as a data URL.
    reader.readAsDataURL(this.files[0]);
    });
</script>