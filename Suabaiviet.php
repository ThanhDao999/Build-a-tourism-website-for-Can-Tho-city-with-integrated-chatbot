<!DOCTYPE html>
<html>
<head>
	<title>Sửa bài viết về địa điểm tham quan</title>
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

    h1 {
        text-align: center;
        font-family: 'Times New Roman', Times, serif;
    }
	img {
		width: 40%;
		height: auto;
	}
	p{
		text-align: center;
        font-family: 'Times New Roman', Times, serif;
	}

</style>

<body>

	<?php

		require_once("./connection.php");
        $sql="select * from baiviet where idbv = ".$_GET['idbv']." ";
        $result=$con->query($sql);

        while($row = $result->fetch_assoc()){

				echo "			<h1 class='header'>Admin sửa bài viết địa điểm tham quan</h1>
								<p class='label'>Vui lòng nhập đầy đủ thông tin bên dưới để sửa bai viet mới</p>
								<div class='table-responsive'>
											<form action='editbv.php?idbv=".$_GET['idbv']."' method='POST' enctype='multipart/form-data' >
											
												<table class='table'>
												<tr>
													<td>
														<label class='label'>Tên bài viết</label>
													</td>
													<td>
														<input class='form-control' name='tenbv' type='text' value= '".$row['tenbv']."' >
													</td>
												</tr>

												<tr>
													<td>
														<label class='label'>Mô tả sơ lược bài viết</label>
													</td>
													<td>
													
														<input class='form-control' name='mota_bv' type='text' value='".$row['mota_nd']."' >
														
													</td>
												</tr>


												<tr>
													<td>
														<label class='label'>Nội dung bài viết</label>
													</td>
													<td>
													
														<input class='form-control' name='noidungbv' type='text' value='".$row['noidungbv']."' >
														
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
													<input class='form-control' name='sdt' type='text' value= '".$row['so_dien_thoai']."' >
												</td>
											</tr>

											<tr>
												<td>
													<label class='label'>Địa chỉ</label>
												</td>

												<td>
													<input class='form-control' name='diachi' type='text' value= '".$row['dia_chi']."' >
												</td>
											</tr>

											<tr>
												<td>
													<label class='label'>Giờ mở cửa</label>
												</td>

												<td>
													<input class='form-control' name='timeopen' type='text' value= '".$row['gio_mo_cua']."' >
												</td>
											</tr>

											<tr>
												<td>
													<label class='label'>Nguồn/Người viết</label>
												</td>

												<td>
													<input class='form-control' name='author' type='text' value= '".$row['nguoi_viet_nguon_viet']."' >
												</td>
											</tr>

											<tr>
												<td>
													<label class='label'>Vị trí bản đồ</label>
												</td>

												<td>
													<input class='form-control' name='map' type='text' value= '".$row['vi_tri_ban_do']."' >
												</td>
											</tr>

											<tr>
												<td>
													<label class='label'>Trang web</label>
												</td>

												<td>
													<input class='form-control' name='web' type='text' value= '".$row['trang_web']."' >
												</td>
											</tr>


												<tr>
													<td></td>
													<td>
														<input class='btn btn-light' type='submit' value='Sửa'>
														<input class='btn btn-light' type='reset' value='Hủy'>
													</td>
												</tr>

												</table>
												</div>
											</form> 
											</div>" ;
			}
	?>


</body>
</html>