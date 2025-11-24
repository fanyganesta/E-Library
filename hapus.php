<?php
    require 'controller.php';
    statusLogin();
    if(!isset($_GET['ID'])){
        header("Location: index.php?error=Pilih data yang mau dihapus dahulu");
        exit;
    }else{
        $id = $_GET['ID'];
        global $db;
        $query = "DELETE FROM books WHERE ID = ?";
        $prepQuery = $db->prepare($query);
        $prepQuery->bind_param('s', $id);
        $prepQuery->execute();
        $result = mysqli_affected_rows($db);
        if($result > 0){
            header("Location: index.php?message=Data berhasil dihapus");
            exit;
        }else{
            header("Location: index.php?error=Data gagal dihapus");
            exit;
        }
    }


?>