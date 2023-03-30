<html>

<head>
	<title>Sửa nhận xét thành viên</title>
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
        $sql="select * from nhan_xet_nguoi_xem where id_reviewer = ".$_GET['id_reviewer']." ";
        $result=$con->query($sql);

        while($row = $result->fetch_assoc()){

				echo "			<h1 class='header'>Admin sửa thông tin của người dùng đã nhận xét</h1>
								<p class='label'>Vui lòng nhập đầy đủ thông tin bên dưới để sửa bai viet mới</p>
								<div class='table-responsive'>
											<form action='edit_rv.php?id_reviewer=".$_GET['id_reviewer']."' method='POST' enctype='multipart/form-data' >
												<table class='table'>
												<tr>
													<td>
														<label class='label'>Tên người nhận xét</label>
													</td>
													<td>
														<input class='form-control' name='ten_rv' type='text' value= '".$row['ten_reviewer']."' >
													</td>
												</tr>

												<tr>
													<td>
														<label class='label'>Noi dung bai viet</label>
													</td>
													<td>
														<input class='form-control' name='nd_rv' type='text' value= '".$row['nd_reviewer']."' >
													</td>
												</tr>

												<tr>
													<td>
														<label class='label'>Email</label>
													</td>
													<td>
														<input class='form-control' type='text' name='email' value='".$row['email']."' />
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
			;}
	?>


</body>
</html>