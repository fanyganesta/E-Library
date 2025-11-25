<?php 
    session_start();
    $_SESSION['username'] = '';
    session_destroy();
    setcookie('key', '', time()-3600);
    setcookie('token', '', time()-3600);
    header("Location: login.php?message=Anda berhasil logout");
    exit;


?>