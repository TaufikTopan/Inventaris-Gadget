<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>proses peminjaman</title>
</head>
<body>
    <?php  
        include "../config/koneksi.php";
        $id_peminjaman = $_GET['id_peminjaman'];
        if(empty($id_peminjaman)){
            header('location : ../index.php?p=peminjaman');
        }
        $sql = "UPDATE peminjaman SET status_peminjaman ='1' WHERE id_peminjaman='$id_peminjaman'";
        $query = mysqli_query($koneksi, $sql);

        if($query){
            ?>
                <script type="text/javascript">
                    window.location.href="../index.php?p=peminjaman";
                </script>
            <?php
        }else{
            ?>
                <script type="text/javascript">
                    alert('GAGAL MENGUBAH STATUS');
                    window.location.href="../index.php?p=peminjaman";
                </script>
            <?php

        }
    ?>
</body>
</html>