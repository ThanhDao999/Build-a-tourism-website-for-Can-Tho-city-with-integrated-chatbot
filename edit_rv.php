<?php
	require_once("./connection.php");
	session_start();

	$ten_rv = $_POST['ten_rv'];
	$nd_rv = $_POST['nd_rv'];
    $email = $_POST['email'];
    $id = $_GET['id_reviewer'];

	$sql= "update nhan_xet_nguoi_xem set ten_reviewer ='$ten_rv' ,nd_reviewer = '$nd_rv' , email = '$email' where id_reviewer = '$id'";
	$result=$con->query($sql);

	echo "$sql";

//	header('Location: danhsachbaiviet.php');
	
?>