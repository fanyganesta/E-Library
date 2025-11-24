<?php
    require 'controller.php';
    $rows = index();
    if(isset($_POST['btn-cari']) && mb_strlen($_POST['cari'])){
        $rows = cari();
    }
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

    <form action="index.php" method="POST">
        <label for="cari">Cari Buku: </label>
        <input name="cari" id="cari" tipe="text" value="<?php if(isset($_POST['cari'])){
            if(mb_strlen($_POST['cari']) > 0){
                echo $rows[0]['key'];
            }
                }elseif(isset($_GET['cari'])){
                    echo $_GET['cari'];
                } ?>">
        <button tipe="submit" name="btn-cari"> Cari</button>
    </form>
    <br>

    <table class="tb">
        <tr>
            <th>No.</th>
            <th>Buku</th>
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
                    <?= $row['ID'] ?>
                </td>
                    <?php if(!isset($row['img'])) : ?>
                        <p style="font-style: italic"> (Gambar belum ditambahkan) </p>
                    <?php else : ?>
                        <img src="img/<?=$row['img']?>" alt="Gambar buku" width="100">
                    <?php endif ?>
                <td> <?= $row['judulBuku'] ?> </td>
                <td> <?= $row['penerbit'] ?> </td>
                <td class="ct"> <?= $row['tahunTerbit'] ?> </td>
                <td class="ct"> <?= $row['jumlahHalaman'] ?> </td>
                <td class="ct"> <?= $row['rating'] ?> </td>
                <td class="ct"> 
                    <a href="ubah.php?ID=<?= $row['ID'] ?>">Ubah</a>
                    <p style="display:inline"> | </p>
                    <a href="hapus.php?ID=<?= $row['ID'] ?>" onclick="return confirm('Apakah yakin ingin menghapus data ini?')">Hapus</a>
                </td>
            </tr>
        <?php endforeach ?>
        <?php if($row['halamanPaginasi'] > 1) : ?>
            <tr>
                <td colspan="8" class="ct"> 
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
        <?php endif ?>
    </table>

</body>
</html>