<?php
    require 'controller.php';
    if(isset($_POST['btn-tambah'])){
        tambah();
    }

?>

<!DOCTYPE html>
<html> 
<head>
    <title>Tambah Data</title>
    <link rel="stylesheet" href="css-index.css">
</head>
<body> 

    <h3> Tambah Buku Baru </h3>

    <a href="index.php"> Kembali ke beranda</a>
    <br>
    <br>
    <form action="" method="POST" enctype="multipart/form-data"> 
        <table> 
            <tr>
                <td>
                    <label for="judulBuku"> Judul Buku:</label>
                </td>
                <td>
                    <input name="judulBuku" id="judulBuku" type="text">
                </td>
            </tr>
            <tr>
                <td> <label for="penertbit">Penerbit:</labeel> </td>
                <td> <input id="penerbit" type="text" name="penerbit"> </td>
            </tr>
            <tr>
                <td> <label for="tahunTerbit">Tahun Terbit:</label> </td>
                <td> <input type="text" id="tahunTerbit" name="tahunTerbit"> </td>
            </tr>
            <tr>
                <td> <label for="jumlahHalaman">Jumlah Halaman:</label> </td>
                <td> <input type="type" id="jumlahHalaman" name="jumlahHalaman"> </td>
            </tr>
            <tr> 
                <td> <label for="rating">Rating:</label> </td>
                <td> <input type="text" id="rating" name="rating"> </td>
            </tr>
            <td>
                <td> <label for="image">Cover Buku:</label> </td>
                <td> <input type="file" name="image" id="image"></td>
            <tr>
                <td colspan="2" class="ct"> 
                    <button type="submit" name="btn-tambah">Tambah</button>
                </td>
            </tr>
        </table>
    </form>

</body>
</html>