<?php

// koneksi ke database
$conn = mysqli_connect("localhost", "root", "daniel123", "phpfreecodecamp");

function query($query) {
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];
	while( $row = mysqli_fetch_assoc($result) ){
		$rows[] = $row;
	}
	return $rows;
}


function tambah($data){
	global $conn;
	 // ambil data dari tiap elemen dalam form
    $nrp = htmlspecialchars($data["nrp"]);
    $nama = htmlspecialchars($data["nama"]);
    $email = htmlspecialchars($data["email"]);
    $usia = htmlspecialchars($data["usia"]);
    $profesi = htmlspecialchars($data["profesi"]);
    $keluhan = htmlspecialchars($data["keluhan"]);
    $rekomendasi = htmlspecialchars($data["rekomendasi"]);

    // query insert data
    $query = "INSERT INTO warga VALUES ('', '$nama', '$nrp', '$email', '$usia', '$profesi', '$keluhan', 
    '$rekomendasi')";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function ubah($data){
    global $conn;
	 
    $id = $data["id"];
    $nrp = htmlspecialchars($data["nrp"]);
    $nama = htmlspecialchars($data["nama"]);
    $email = htmlspecialchars($data["email"]);
    $usia = htmlspecialchars($data["usia"]);
    $profesi = htmlspecialchars($data["profesi"]);
    $keluhan = htmlspecialchars($data["keluhan"]);
    $rekomendasi = htmlspecialchars($data["rekomendasi"]);

    // query insert data
    $query = "UPDATE warga SET nama = '$nama', nrp = '$nrp', email = '$email', usia = '$usia', 
    profesi = '$profesi', keluhan = '$keluhan', rekomendasi = '$rekomendasi' where id = $id
    ";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function cari($keyword){
    $query = "SELECT * FROM warga 
    WHERE
    nama LIKE '%$keyword%' OR
    nrp LIKE '%$keyword%' OR
    email LIKE '%$keyword%' OR
    usia LIKE '%$keyword%' OR
    profesi LIKE '%$keyword%' OR
    keluhan LIKE '%$keyword%' OR
    rekomendasi LIKE '%$keyword%'
    ";
    return query($query);
}

function registrasi($data){
    global $conn;

    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);

    // cek username sudah ada atau belum
    $result = mysqli_query($conn, "SELECT username FROM admin WHERE username = '$username'");

    if( mysqli_fetch_assoc($result) ){
        echo"<script>
        alert('konfirmasi password tidak sesuai!');
        </script>";
        return false;
    }

    // cek konfirmasi
    if( $password !== $password2 ){
        echo "<script>
        alert('konfirmasi password tidak sesuai!');
        </script>";
        
        return false;
    }

    // enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);
    

    // tambahkan userbaru ke database
    mysqli_query($conn, "INSERT INTO admin VALUES('', '$username', '$password')");

    return mysqli_affected_rows($conn);
}


?>