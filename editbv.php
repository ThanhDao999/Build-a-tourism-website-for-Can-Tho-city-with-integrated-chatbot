<?php
	require_once("./connection.php");
	session_start();

	$tenbv = $_POST['tenbv'];
	$noidungbv = $_POST['noidungbv'];
	$mota_bv = $_POST['mota_bv'];
    $id = $_GET['idbv'];
	$hinhanh = "./img/" . $_FILES['image']['name'];
    move_uploaded_file($_FILES['image']['tmp_name'],$hinhanh);
	$sdt = $_POST['sdt'];
	$diachi = $_POST['diachi'];
	$timeopen = $_POST['timeopen'];
	$author = $_POST['author'];
	$map = $_POST['map'];
	$web = $_POST['web'];
	$sql= "update baiviet set hinhanhbv = '$hinhanh', tenbv ='$tenbv' ,noidungbv = '$noidungbv', mota_nd ='$mota_bv', so_dien_thoai ='$sdt', dia_chi ='$diachi', gio_mo_cua='$timeopen', nguoi_viet_nguon_viet = '$author', vi_tri_ban_do = '$map', trang_web = '$web'  where idbv = '$id'";
	$result=$con->query($sql);

	echo "$sql";

	header('Location: danhsachbaiviet.php');
	
?>