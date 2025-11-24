<?php 
    require 'controller.php';
    mustGuest();
    if(isset($_POST['btn-login'])){
        login();
    }
?>

<!DOCTYPE html>
<html> 
<head>
    <title> Login </title>
    <link rel="stylesheet" href="css-index.css">
</head>
<body>
    <?php if(isset($_GET['message'])) : ?>
        <p class="message"> <?= $_GET['message']?> </p>
    <?php elseif(isset($_GET['error'])) : ?>
        <p class="error"> <?= $_GET['error']?> </p>
    <?php endif ?>

    <h3>Selamat datang, silahkan login dahulu</h3>
    <a href="register.php">Registrasi di sini</a>
    <br><br>

    <form action="" method="POST"> 
        <table> 
            <tr> 
                <td> <label for="username"> Username:</label> </td>
                <td> <input id="username" name="username" type="text"> </td>
            </tr>
            <tr>
                <td> <label for="password">Password:</label> </td>
                <td> <input type="password" name="password" id="password"> </td>
            </tr>
            <tr> 
                <td colspan="2" class="ct"> 
                    <button type="submit" name="btn-login">Login</button>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>