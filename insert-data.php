<?php
    require 'controller.php';
    global $db;

    if(isset($_GET['data-book'])){
        $createEbooks = "CREATE TABLE books (
            ID INT PRIMARY KEY AUTO_INCREMENT,
            judulBuku VARCHAR(100),
            penerbit VARCHAR(100),
            tahunTerbit VARCHAR(100),
            jumlahHalaman VARCHAR(100),
            rating VARCHAR(100),
            img VARCHAR(100)
        )";

        $checkTable = "SELECT table_name FROM information_schema.tables WHERE table_schema = 'e_library' AND table_name = 'books'";
        $checkResult = mysqli_query($db, $checkTable);

        if($checkResult->num_rows == 0){
            $tableEbooks = mysqli_query($db, $createEbooks);
        }else{
            echo "Table sudah ada, data akan segera dimasukkan";
        }

        $query = "INSERT INTO books VALUES
        ( '', 'Filosofi Teras', 'Kompas', '2019', '344', '4.4',''),
        ( '', 'Laskar Pelangi', 'Bentang Pustaka', '2005', '529', '4.3',''),
        ( '', 'Bumi Manusia', 'Hasta Mitra', '1980', '535', '4.4',''),
        ( '', 'The Secret Garden', 'Gramedia Pustaka Utama', '2016', '320', '4.1',''),
        ( '', 'Atomic Habits', 'Gramedia Pustaka Utama', '2019', '342', '4.3',''),
        ( '', 'Cantik Itu Luka', 'Gramedia Pustaka Utama', '2002', '504', '4.3',''),
        ( '', 'Sapiens: Riwayat Singkat Umat Manusia', 'Kepustakaan Populer Gramedia', '2017', '560', '4.4',''),
        ( '', 'Negeri 5 Menara', 'Gramedia Pustaka Utama', '2009', '423', '4.3',''),
        ( '', 'Pulang', 'Gramedia Pustaka Utama', '2017', '400', '4.3',''),
        ( '', 'Rich Dad Poor Dad', 'Gramedia Pustaka Utama', '2001', '350', '4.1','')
        ";

        $result = mysqli_query($db, $query);
        if(mysqli_fetch_rows($db) > 0){
            header("Location: login.php?message=Data books berhasil ditambah");
            exit;
        }else{
            header("Location: login.php?error=Gagal tambah data");
            exit;
        }
    }elseif(isset($_GET['data-users'])){
        
        $checkUsers = "SELECT table_name FROM information_schema.tables WHERE table_schema = 'e_library' AND table_name = 'users'";
        $checkResult = mysqli_query($db, $checkUsers);

        if($checkResult->num_rows == 0){

            $query = "CREATE TABLE users (
                ID INT PRIMARY KEY AUTO_INCREMENT,
                username VARCHAR(100),
                password VARCHAR(255)
            )";
            mysqli_query($db, $query);

            if(mysqli_affected_rows($db) < 0){
                header("Location: login.php?error=Gagal membuat table users");
                exit;
            }
        }

        $password = password_hash('123', PASSWORD_DEFAULT);
        $query = "INSERT INTO users VALUES (
            '', 'fany', '$password'
        )";

        mysqli_query($db, $query);

        if(mysqli_affected_rows($db) > 0){
            header("Location: login.php?message=Data users berasil ditambahkan");
            exit;
        }else{
            header("Location: login.php?error=Data users gagal ditambahkan");
            exit;
        }
        
    }

?>