<?php

if ( isset($_POST["pengaduan"]) ){
    header("Location: pengaduan.php");
    exit;
}

if ( isset($_POST["admin"]) ){
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Belajar HTML 01</title>
    </head>
    <body>
        <form action="" method="post">
        <button submit="submit" name="pengaduan">Pengaduan</button>
        <button submit="submit" name="admin">Admin</button>
    </form>
    </body>
</html>