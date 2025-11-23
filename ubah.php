<?php 
    require 'controller.php';
    $row = get_ubah($_GET['ID']);
    if(isset($_POST['btn-ubah'])){
        ubah();
    }



?>


<!DOCTYPE html>
<html>
<head>
    <title> Ubah Data</title>
    <link rel="stylesheet" href="css-index.css">
</head>
<body>

    <h3> Ubah data dari "<?=$row['judulBuku']?>"</h3>

    <form method="POST" action="">
        <input type="hidden" name="id" value="<?= $row['ID'];?>">
        <table>
            <tr>
                <td> <label for="judulBuku">Judul Buku:</label> </td>
                <td> <input type="text" name="judulBuku" id="judulBuku" value="<?=$row['judulBuku']?>" required></td>
            </tr> 
            <tr>
                <td> <label for="penerbit">Penerbit:</label> </td>
                <td> <input type="text" id="penerbit" name="penerbit" value="<?=$row['penerbit']?>" required> </td>
            </tr>
            <tr>
                <td> <label for="tahunTerbit">Tahun Terbit:</label> </td>
                <td> <input type="text" name="tahunTerbit" id="tahunTerbit" value="<?=$row['tahunTerbit']?>" required> </td>
            </tr>
            <tr>
                <td> <label for="jumlahHalaman">Jumlah Halaman:</label> </td>
                <td> <input type="text" id="jumlahHalaman" name="jumlahHalaman" value="<?=$row['jumlahHalaman']?>" required> </td>
            </tr>
            <tr>
                <td> <label for="rating">Rating: </label> </td>
                <td> <input type="text" id="rating" name="rating" value="<?=$row['rating']?>" required> </td>
            </tr>
            <tr>
                <td colspan="2" class="ct">
                    <button type="submit" name="btn-ubah"> Ubah</button>
                </td>
            </tr>
        </table>
    </form>

</body>
</html>