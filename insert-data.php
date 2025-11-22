<?php
    require 'controller.php';
    $query = "INSERT INTO books VALUE
    ( '', 'Filosofi Teras', 'Kompas', '2019', '344', '4.4'),
    ( '', 'Laskar Pelangi', 'Bentang Pustaka', '2005', '529', '4.3'),
    ( '', 'Bumi Manusia', 'Hasta Mitra', '1980', '535', '4.4'),
    ( '', 'The Secret Garden', 'Gramedia Pustaka Utama', '2016', '320', '4.1'),
    ( '', 'Atomic Habits', 'Gramedia Pustaka Utama', '2019', '342', '4.3'),
    ( '', 'Cantik Itu Luka', 'Gramedia Pustaka Utama', '2002', '504', '4.3'),
    ( '', 'Sapiens: Riwayat Singkat Umat Manusia', 'Kepustakaan Populer Gramedia', '2017', '560', '4.4'),
    ( '', 'Negeri 5 Menara', 'Gramedia Pustaka Utama', '2009', '423', '4.3'),
    ( '', 'Pulang', 'Gramedia Pustaka Utama', '2017', '400', '4.3'),
    ( '', 'Rich Dad Poor Dad', 'Gramedia Pustaka Utama', '2001', '350', '4.1')
    ";
    global $db;
    mysqli_query($db, $query);

?>