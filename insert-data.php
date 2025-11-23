<?php
    require 'controller.php';
    global $db;

    $createEbooks = "CREATE TABLE books (
        ID INT PRIMARY KEY AUTO_INCREMENT,
        judulBuku VARCHAR(100),
        penerbit VARCHAR(100),
        tahunTerbit VARCHAR(100),
        jumlahHalaman VARCHAR(100),
        rating VARCHAR(100)
    )";

    $checkTable = "SELECT table_name FROM information_schema.tables WHERE table_schema = 'e_library' AND table_name = 'books'";
    $checkResult = mysqli_query($db, $checkTable);

    if($checkResult->num_rows == 0){
        $tableEbooks = mysqli_query($db, $createEbooks);
    }else{
        echo "Table sudah ada, data akan segera dimasukkan";
    }

    $query = "INSERT INTO books VALUES
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

    $result = mysqli_query($db, $query);
    header("Location: index.php?message=Data berhasil ditambah");

?>