<?php
session_start();

if( !isset($_SESSION['login'])  ){
	header("location: login.php");
	exit;
}

require 'functions.php';

// ambil data dari tabel mahasiswa / query data mahasiswa
$result = mysqli_query($conn, "SELECT * FROM warga");
$warga = query("SELECT * FROM warga");

// tombol cari ditekan
if( isset($_POST["cari"]) ){
	$warga = cari($_POST["keyword"]);
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Halaman Admin</title>
    </head>
    <body>
        <h1>Daftar Mahasiswa</h1>

        <a href="tambah.php">Tambah data keluhan warga</a>
		<a href="logout.php">Logout</a>
        <br><br>

		<form action="" method="post">
			
		<input type="text" name="keyword" size="40" autofocus placeholder="masukan keyword pencarian..." autocomplete="off">
		<button type="submit" name="cari">Cari!</button>
		</form>
		<br>


        <table border="1" cellpadding="10" cellspacing="0">

        	<tr>
        		<th>No.</th>
        		<th>Aksi</th>
        		<th>Nomor KTP</th>
        		<th>Nama</th>
        		<th>Email</th>
        		<th>Usia</th>
				<th>Profesi</th>
				<th>Keluhan</th>
				<th>Rekomendasi</th>
        	</tr>


        	<?php $i = 1; ?>
        	<?php foreach( $warga as $row ) : ?>

        	<tr>
        		<td><?= $i; ?></td>
        		<td>
        			<a href="ubah.php?id=<?= $row["id"]; ?>">ubah</a>
        			<a href="hapus.php?id=<?= $row["id"]; ?>" onclick="return confirm('yakin?');">hapus</a>
        		</td>
        			<td><?= $row["nrp"]; ?></td>
        			<td><?= $row["nama"]; ?></td>
        			<td><?= $row["email"]; ?></td>
        			<td><?= $row["usia"]; ?></td>
					<td><?= $row["profesi"]; ?></td>
					<td><?= $row["keluhan"]; ?></td>
					<td><?= $row["rekomendasi"]; ?></td>
        	</tr>
        	<?php $i++; ?>
        	<?php endforeach; ?>


        </table>
    </body>
</html>