<!DOCTYPE html>
<html>
<head>
	<title>Sửa thông tin thành viên</title>
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
        $sql="select * from thanhvien where id = ".$_GET['id']."";
        $result=$con->query($sql);
        while($row = $result->fetch_assoc()){
	?>
		<h1 class='header'>Admin sửa thông tin thành viên</h1>
		<p class='label'>Vui lòng nhập đầy đủ thông tin bên dưới để sửa nhận xét mới</p>
		<div class='table-responsive'>
			<form action='edit_tv.php?id=<?php echo $_GET['id']; ?>' method='POST' enctype='multipart/form-data' >
				<table class="table">	
					<tr>
						<td>
							<label class='label'>Tên thành viên</label>
						</td>
						<td>
							<input class='form-control' name='tendangnhap' type='text' value= '<?php echo $row['tendangnhap']; ?>' >
						</td>
					</tr>

					<tr>
						<td>
							<label class='label'>Mật khẩu</label>
						</td>
						<td>
							<input class='form-control' name='matkhau' type='password' value= '<?php echo $row['matkhau']; ?>' >
						</td>
					</tr>

                    <tr>
						<td>
							<label class='label'>Giới tính</label>
						</td>
						<td>
							<input class='form-control' type='radio' name='gender' value='Nam' <?php  echo ($row['gioitinh']== "Nam" ? 'checked' : ''); ?>>
							<label for='male'>Nam</label>
							<input class='form-control' type='radio' name='gender' value='Nữ' <?php  echo ($row['gioitinh']== "Nữ" ? 'checked' : ''); ?>>
							<label for='female'>Nữ</label>
						</td>
				    </tr>
                                                
                    <tr>
						<td>
							<label class='label'>Nghề nghiệp</label>
						</td>
						<td>
							<select  name='job' id='nghe'>
								<option  value='Học sinh'>Học sinh</option >
								<option  value='Sinh viên'>Sinh viên</option >
								<option  value='Giáo viên'>Giáo viên</option >
								<option  value='Khác'>Khác</option >
							</select >
						</td>
					</tr>
					<tr>
						<td>
							<label class='label'>Sở thích</label>
						</td>
						<td>
							<input class='form-control' type='checkbox' id='thethao' name='hobbies[]' value='Thể thao' <?php  echo ($row['sothich']== "Thể thao" ? 'checked' : ''); ?> >
							<label for='thethao'>Thể thao</label>
						
							<input class='form-control' type='checkbox' id='dulich' name='hobbies[]' value='Du lịch' <?php  echo ($row['sothich']== "Du lịch" ? 'checked' : ''); ?> >
							<label for='dulich'>Du lịch</label>
						
							<input class='form-control' type='checkbox' id='amnhac' name='hobbies[]' value='Âm nhạc' <?php  echo ($row['sothich']== "Âm nhạc" ? 'checked' : ''); ?> >
							<label for='amnhac'>Âm nhạc</label>
						
							<input class='form-control' type='checkbox' id='thoitrang' name='hobbies[]' value='Thời trang' <?php  echo ($row['sothich']== "Thời trang" ? 'checked' : ''); ?> >
							<label for='thoitrang'>Thời trang</label>
						</td>
					</tr>

					<tr>
						<td>
							<label class='label'>Phân quyền</label>
						</td>
						<td>
							<input class='form-control' name='phanquyen' type='text' value='<?php echo $row['phanquyen']; ?>' >
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
			</div>
		<?php } ?>
</body>
</html>