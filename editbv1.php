<?php
	require_once("./connection.php");
	session_start();

	$tenbv = $_POST['tenbv'];
	$noidungbv = $_POST['noidungbv'];
	$mota_bv = $_POST['mota_bv'];
    $id = $_GET['idbv1'];
	$hinhanh = "./img/" . $_FILES['image']['name'];
    move_uploaded_file($_FILES['image']['tmp_name'],$hinhanh);
	$sdt = $_POST['sdt'];
	$diachi = $_POST['diachi'];
	$timeopen = $_POST['timeopen'];
	$author = $_POST['author'];
	$map = $_POST['map'];
	$web = $_POST['web'];
	$sql= "update baiviet1 set hinhanhbv = '$hinhanh', tenbv ='$tenbv' ,noidungbv1 = '$noidungbv' , mota_bv1 ='$mota_bv', so_dien_thoai_1 ='$sdt', dia_chi_1 ='$diachi', gio_mo_cua_1='$timeopen', nguoi_viet_nguon_viet_1 = '$author', vi_tri_ban_do_1 = '$map', trang_web_1 = '$web' where idbv1 = '$id'";
	$result=$con->query($sql);

	echo "$sql";

	header('Location: danhsachbaiviet1.php');
	
?>