<?php

session_start();

if( !isset($_SESSION['login'])  ){
	header("location: login.php");
	exit;
}


require 'functions.php';

//ambil data di URL
$id = $_GET["id"];

// query data warga berdasarkan id
$warga = query("SELECT * FROM warga WHERE id = $id")[0];

// cek apakah tombol submit sudah ditekan atau belum
if( isset($_POST["submit"]) ) {

    // cek apakah data berhasil di tambahkan atau tidak
    if( ubah($_POST) > 0 ) {
    echo "<script>
        alert('data berhasil diubah!');
        document.location.href = index.php;
    </script>";
} else {
echo"
    <script>
        alert('data gagal diubah!');
        document.location.href = index.php;
    </script>";
}

}

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Ubah data mahasiswa</title>
        <style>
            @import url('https://fonts.googleapis.com/css?family=Poppins:200i,400&display=swap');

:root {
  --color-white: #f3f3f3;
  --color-darkblue: #1b1b32;
  --color-darkblue-alpha: rgba(27, 27, 50, 0.8);
  --color-green: #37af65;
}

*,
*::before,
*::after {
  box-sizing: border-box;
}

body {
  font-family: 'Poppins', sans-serif;
  font-size: 1rem;
  font-weight: 400;
  line-height: 1.4;
  color: var(--color-white);
  margin: 0;
}

/* mobile friendly alternative to using background-attachment: fixed */
body::before {
  content: '';
  position: fixed;
  top: 0;
  left: 0;
  height: 100%;
  width: 100%;
  z-index: -1;
  background: var(--color-darkblue);
  background-image: linear-gradient(
      115deg,
      rgba(58, 58, 158, 0.8),
      rgba(136, 136, 206, 0.7)
    ),
  background-size: cover;
  background-repeat: no-repeat;
  background-position: center;
}

h1 {
  font-weight: 400;
  line-height: 1.2;
}

p {
  font-size: 1.125rem;
}

h1,
p {
  margin-top: 0;
  margin-bottom: 0.5rem;
}

label {
  display: flex;
  align-items: center;
  font-size: 1.125rem;
  margin-bottom: 0.5rem;
}

input,
button,
select,
textarea {
  margin: 0;
  font-family: inherit;
  font-size: inherit;
  line-height: inherit;
}

button {
  border: none;
}

.container {
  width: 100%;
  margin: 3.125rem auto 0 auto;
}

@media (min-width: 576px) {
  .container {
    max-width: 540px;
  }
}

@media (min-width: 768px) {
  .container {
    max-width: 720px;
  }
}

.header {
  padding: 0 0.625rem;
  margin-bottom: 1.875rem;
}

.description {
  font-style: italic;
  font-weight: 200;
  text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.4);
}

.clue {
  margin-left: 0.25rem;
  font-size: 0.9rem;
  color: #e4e4e4;
}

.text-center {
  text-align: center;
}

/* form */

form {
  background: var(--color-darkblue-alpha);
  padding: 2.5rem 0.625rem;
  border-radius: 0.25rem;
}

@media (min-width: 480px) {
  form {
    padding: 2.5rem;
  }
}

.form-group {
  margin: 0 auto 1.25rem auto;
  padding: 0.25rem;
}

.form-control {
  display: block;
  width: 100%;
  height: 2.375rem;
  padding: 0.375rem 0.75rem;
  color: #495057;
  background-color: #fff;
  background-clip: padding-box;
  border: 1px solid #ced4da;
  border-radius: 0.25rem;
  transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
}

.form-control:focus {
  border-color: #80bdff;
  outline: 0;
  box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
}

.input-radio,
.input-checkbox {
  display: inline-block;
  margin-right: 0.625rem;
  min-height: 1.25rem;
  min-width: 1.25rem;
}

.input-textarea {
  min-height: 120px;
  width: 100%;
  padding: 0.625rem;
  resize: vertical;
}

.submit-button {
  display: block;
  width: 100%;
  padding: 0.75rem;
  background: var(--color-green);
  color: inherit;
  border-radius: 2px;
  cursor: pointer;
}
            </style>
    </head>
    <body>
        <h1>Ubah data warga</h1>
        <a href="database.php">data warga</a>
        <br><br>

        <form action="" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $warga["id"]; ?>">
            <div class="form-group">
                    <label for="nrp">NRP : </label>
                    <input type="text" name="nrp" id="nrp" required value="<?= $warga["nrp"]; ?>">
            </div>
                
            <div class="form-group">
                    <label for="nama">Nama : </label>
                    <input type="text" name="nama" id="nama" required value="<?= $warga["nama"]; ?>">
            </div>

                <div class="form-group">
                    <label for="email">Email : </label>
                    <input type="text" name="email" id="email" required value="<?= $warga["email"]; ?>">
                </div>

                <div class="form-group">
                    <label for="usia">Usia : </label>
                    <input type="text" name="usia" id="usia" required value="<?= $warga["usia"]; ?>">
                </div>

                <div class="form-group">
                <p>Profesi?</p>
                <input type="text" id="profesi" name="profesi" class="form-control" required value="<?= $warga["profesi"];?>">
                </div>

                <div class="form-group">
                    <label for="keluhan">Keluhan : </label>
                    <input type="text" name="keluhan" id="keluhan" required value="<?= $warga["keluhan"]; ?>">
                </div>

                <div class="form-group">
        <label for="rekomendasi">Rekomendasi : </label>
                    <input type="text" name="rekomendasi" id="rekomendasi" required value="<?= $warga["rekomendasi"]; ?>">
      </div>
                
                    <button type="submit" name="submit">Ubah Data!</button>
        </form>

    </body>
</html>
