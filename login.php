<?php
session_start();

require 'functions.php';

if ( isset($_POST["login"]) ){
    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM admin WHERE username = '$username'");

    // cek username
    if( mysqli_num_rows($result) === 1 ){

        // cek password
        $row = mysqli_fetch_assoc($result);
        if(password_verify($password, $row["password"])){

            //set session
            $_SESSION["login"] = true;

            header("Location: database.php");
            exit;
        }
    }
    $error = true;
}

?>

<!DOCTYPE HTML>
<html>
    <head>
        <title>Halaman Login</title>
    </head>
    <body>

    <h1>Halaman Login</h1>

<?php if( isset($error) ): ?>
<p style="color: red; font-style: italic;">username/password salah</p>
<?php endif; ?>



    <form action="" method="post">
        <ul>
            <li>
                <label for="username">Username : </label>
                <input type="text" name="username" id="username">
            </li>
            <li>
                <label for="password">Password : </label>
                <input type="password" name="password" id="password">
            </li>
                <button submit="submit" name="login">Login</button>
                <a href="index.php">Kembali</a>
        </ul>
    </form>

    </body>
</html>