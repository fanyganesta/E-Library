<?php
    require 'controller.php';
    $rows = index();
?>


<!DOCTYPE html>
<html> 
<head> 
    <title> E-Perpusatakaan </title>
    <link rel="stylesheet" href="css-index.css">
</head>
<body>

    <?php if(isset($_GET['error'])) : ?>
        <p class="error"> <?= $_GET['error'] ?>
    <?php endif ?>

    <?php if(isset($_GET['message'])) : ?>
        <p class="message"> <?= $_GET['message']; ?>
    <?php endif ?>

    <h2> List Buku-buku </h2>
    <a href="tambah.php"> Tambah data</a>
    <p style="display: inline">|</p>
    <a href="logout.php"> Keluar </a>
    <br>
    <br>

    <form action="" method="POST">
        <label for="cari">Cari Buku: </label>
        <input name="cari" id="cari" tipe="text">
        <button tipe="submit" name="btn-cari"> Cari</button>
    </form>
    <br>

    <table class="tb">
        <tr>
            <th>No.</th>
            <th>Judul Buku</th>
            <th>Penerbit</th>
            <th>Tahun Terbit</th>
            <th>Jumlah Halaman</th>
            <th>Rating</th>
            <th>Action</th>
        </tr>
        <?php $i = 1; foreach($rows as $row) : ?>
            <tr> 
                <td class="ct">
                    <?= $i; $i++ ?>
                </td>
                <td> <?= $row['judulBuku'] ?> </td>
                <td> <?= $row['penerbit'] ?> </td>
                <td class="ct"> <?= $row['tahunTerbit'] ?> </td>
                <td class="ct"> <?= $row['jumlahHalaman'] ?> </td>
                <td class="ct"> <?= $row['rating'] ?> </td>
                <td class="ct"> 
                    <a href="ubah.php?id=<?= $row['id'] ?>">Ubah</a>
                    <p style="display:inline"> | </p>
                    <a href="hapus.php?id=<?= $row['id'] ?>">Hapus</a>
                </td>
            </tr>
        <?php endforeach ?>
        <tr>
            <td colspan="7" class="ct"> 
                <?php if($row['halamanAktif'] != 1) : ?>
                    <a href="?halaman=<?= $row['halamanAktif'] - 1?>"> &laquo;</a>
                <?php endif ?>
                <?php for ($j = 1; $j <= $row['halamanPaginasi']; $j++) : ?>
                    <?php if($j == $row['halamanAktif']) : ?>
                        <p style="font-weight: bold; display: inline; color: red"><?= $j ?></p>
                    <?php else :?>
                        <a href="?halaman=<?= $j ?>"><?= $j?></a>
                    <?php endif ?>
                <?php endfor ?>
                <?php if($row['halamanAktif'] != $row['halamanPaginasi']) : ?>
                    <a href="?halaman=<?= $row['halamanAktif'] + 1?>"> &raquo;</a>
                <?php endif ?>
            </td>
        </tr>
    </table>

</body>
</html>