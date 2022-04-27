<?php

session_start();

if( !isset($_SESSION['login'])  ){
	header("location: login.php");
	exit;
}

include_once("functions.php");

$id= $_GET['id'];

$query="DELETE from warga WHERE id=$id";

$hasil=mysqli_query($conn,$query);

if($hasil){
	header('Location:index.php');
}else{
	echo "Hapus data gagal";
}

?>