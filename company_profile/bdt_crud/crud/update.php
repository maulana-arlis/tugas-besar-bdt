<!DOCTYPE html>
<html>
<head>
    <title>Form Pendaftaran Senjata</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

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
    //Cek apakah ada nilai yang dikirim menggunakan method GET dengan nama id
    if (isset($_GET['id'])) {
        $id=input($_GET["id"]);
        $sql="select * from produk where id=$id";
        $hasil=mysqli_query($koneksi,$sql);
        $data = mysqli_fetch_assoc($hasil);


    }

    //Cek apakah ada kiriman form dari method post
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $id=htmlspecialchars($_POST["id"]);
        $nama=input($_POST["nama"]);
        $stok=input($_POST["stok"]);

        //Query update data pada tabel anggota
        $sql="update produk set
			nama='$nama',
			stok='$stok'
			where id=$id";

        //Mengeksekusi atau menjalankan query diatas
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
    <h2>Update Data</h2>


    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
    <div class="form-group">
            
        <div class="form-group">
            <label>Nama:</label>
            <input type="text" name="nama" class="form-control" placeholder="Masukan Nama" required />
        </div>
        <div class="form-group">
            <label>stok:</label>
            <input type="text" name="stok" class="form-control" placeholder="Masukan stok" required/>
        </div>

        <input type="hidden" name="id" value="<?php echo $data['id']; ?>" />

        <button type="submit" name="submit" class="btn btn-primary" href="../part/halaman.php">Submit</button>
        <!-- kembali ke halaman admin -->
        <a href="../part/halaman.php" class="btn btn-primary" role="button">Kembali ke Data Produk</a>
    </form>
</div>
</body>
</html>