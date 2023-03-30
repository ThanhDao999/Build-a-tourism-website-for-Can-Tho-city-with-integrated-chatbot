<?php
	require_once("./connection.php");
	session_start();

	$tendangnhap = $_POST['tendangnhap'];
	$matkhau = md5($_POST['matkhau']);
    $gioitinh = $_POST['gender'];
    $nghenghiep = $_POST['job'];
    $sothich = implode(', ',$_POST['hobbies']);
    $phanquyen = $_POST['phanquyen'];
    $id = $_GET['id'];

	$sql= "update thanhvien set tendangnhap ='$tendangnhap' , matkhau = '$matkhau', gioitinh ='$gioitinh', nghenghiep ='$nghenghiep', sothich ='$sothich', phanquyen ='$phanquyen' where id = '$id'";
	$result=$con->query($sql);

	echo "$sql";

	//header('Location: danhsachnguoidung.php');
	
?>