<?php
 include "../koneksi.php";
 while ($data = mysqli_fetch_assoc($hasil)) {
    $no++;
    ?>
    <tbody>
    <tr>
        <td><?php echo $no; ?></td>
        <td><?php echo $data["nama"]; ?></td>
        <td><?php echo $data["stok"]; ?></td>
    </tr>
    </tbody>
    <?php
}
?>