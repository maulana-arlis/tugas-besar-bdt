<!DOCTYPE html>
<html>

<head>
    <title>Form Senjata</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <?php
    //Include file koneksi, untuk koneksikan ke database
    include "../koneksi.php";

    //Fungsi untuk mencegah inputan karakter yang tidak sesuai
    function input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    //Cek apakah ada kiriman form dari method post
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $nama=input($_POST["nama"]);
        $stok=input($_POST["stok"]);

        //Query input menginput data kedalam tabel anggota
        $sql="insert into produk (nama,stok) values
		('$nama','$stok')";

        var_dump($sql_laporan);
        //Mengeksekusi/menjalankan query diatas
        $hasil=mysqli_query($koneksi,$sql);

        //Kondisi apakah berhasil atau tidak dalam mengeksekusi query diatas
        if ($hasil) {
            header("Location:../part/halaman.php");
        }
        else {
            echo "<div class='alert alert-danger'> Data Gagal disimpan.</div>";

        }

    }
    ?>
        <h2>Input Data</h2>

        <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
            <div class="form-group">
                <label>Nama:</label>
                <input type="text" name="nama" class="form-control" placeholder="Masukan Nama" required />
            </div>
            <div class="form-group">
                <label>stok:</label>
                <input type="text" name="stok" class="form-control" placeholder="Masukan stok" required />
            </div>

            <button type="submit" name="submit" class="btn btn-primary" href="../part/halaman.php">Submit</button>
            <a href="../part/halaman.php" class="btn btn-primary" role="button">Kembali ke Data Produk</a>
        </form>
    </div>
</body>

</html>