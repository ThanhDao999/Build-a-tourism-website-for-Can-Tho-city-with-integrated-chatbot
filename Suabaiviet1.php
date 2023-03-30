<!DOCTYPE html>
<html>
<head>
	<title>Sửa bài viết về địa điểm ăn uống</title>
	<!--bootstrap -->
	<script src="popper.min.js"></script>
    <script src="jquery-3.5.1.min.js"></script>
    <script src="./bootstrap/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" type="text/css" href="./bootstrap/css/bootstrap.min.css">
</head>

<style type="text/css">
	body {
		background-color: #E0FFFF;
		background-repeat: repeat-y;
    	background-attachment: fixed;
	}
	form{
		
		width: 80rem;
		padding: 5px;
		border: 2px solid gray;
		margin: 0 auto;
		background-color: white;
		border-radius: 25px;
	}
	
	table{
		width:50rem;
		background-color: white;
		border-radius: 25px;
	}

	.label {
		text-align: center;
		font-weight: bold;
	}


	img {
		width: 40%;
		height: auto;
	}
    h1 {
        text-align: center;
        font-family: 'Times New Roman', Times, serif;
    }
	p{
		text-align: center;
        font-family: 'Times New Roman', Times, serif;
	}
</style>

<body>

	<?php

		require_once("./connection.php");
        $sql="select * from baiviet1 where idbv1 = ".$_GET['idbv1']." ";
        $result=$con->query($sql);

        while($row = $result->fetch_assoc()){

				echo "			<h1 class='header'>Admin sửa bài viết địa điểm ăn uống</h1>
								<p class='label'>Vui lòng nhập đầy đủ thông tin bên dưới để sửa bài viết mới</p>
											<div class='table-responsive'>
											<form action='editbv1.php?idbv1=".$_GET['idbv1']."' method='POST' enctype='multipart/form-data' >
												<table class='table'>
												<tr>
													<td>
														<label class='label'>Tên bài viết</label>
													</td>
													<td>
														<input class='form-control'  name='tenbv' type='text' value= '".$row['tenbv']."' >
													</td>
												</tr>

                                                <tr>
													<td>
														<label class='label'>Mô tả sơ lược bài viết</label>
													</td>
													<td>
													
														<input class='form-control' name='mota_bv' type='text' value='".$row['mota_bv1']."' >
														
													</td>
												</tr>

												<tr>
													<td>
														<label class='label'>Nội dung bài viết</label>
													</td>
													<td>
														<input class='form-control' name='noidungbv' type='text' value= '".$row['noidungbv1']."' >
													</td>
												</tr>

												<tr>
													<td>
														<label class='label'>Hình ảnh</label>
													</td>
													<td>
														<input class='form-control' type='file' id='image' name='image' />
													</td>
													
												</tr>

												<tr>
													<td>
													</td>

													<td>
														<img src='".$row['hinhanhbv']."' >
													</td>
												</tr>

												<tr>
													<td>
														<label class='label'>Số điện thoại liên lạc</label>
													</td>

													<td>
														<input class='form-control' name='sdt' type='text' value= '".$row['so_dien_thoai_1']."' >
													</td>
												</tr>

												<tr>
													<td>
														<label class='label'>Địa chỉ</label>
													</td>

													<td>
														<input class='form-control' name='diachi' type='text' value= '".$row['dia_chi_1']."' >
													</td>
												</tr>

												<tr>
													<td>
														<label class='label'>Giờ mở cửa</label>
													</td>

													<td>
														<input class='form-control' name='timeopen' type='text' value= '".$row['gio_mo_cua_1']."' >
													</td>
												</tr>

												<tr>
													<td>
														<label class='label'>Nguồn/Người viết</label>
													</td>

													<td>
														<input class='form-control' name='author' type='text' value= '".$row['nguoi_viet_nguon_viet_1']."' >
													</td>
												</tr>

												<tr>
													<td>
														<label class='label'>Vị trí bản đồ</label>
													</td>

													<td>
														<input class='form-control' name='map' type='text' value= '".$row['vi_tri_ban_do_1']."' >
													</td>
												</tr>

												<tr>
													<td>
														<label class='label'>Trang web</label>
													</td>

													<td>
														<input class='form-control' name='web' type='text' value= '".$row['trang_web_1']."' >
													</td>
												</tr>

												

												<tr>
													<td></td>
													<td>
														<input class='btn btn-light' type='submit' value='Sửa'>
														<input class='btn btn-light' type='reset' value='Làm lại'>
													</td>
												</tr>

												</table>
												
											</form> 
											</div>" ;
			}
	?>


</body>
</html>