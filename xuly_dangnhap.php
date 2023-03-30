<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>? nhập</title>
</head>
<body>
<?php
    
    require_once("./connection.php");
	if (isset($_POST["btn_submits"])) {
		$username = $_POST["username"];
		$password = md5($_POST["password"]);
		if ($username == "" || $password =="") {
			echo "username hoặc password bạn không được để trống!";
		}else{
			$sql = "select * from thanhvien where tendangnhap = '$username' and matkhau = '$password' ";
            $result=$con->query($sql);

            $num_rows=$result->num_rows;
			if ($num_rows > 0) {
				while ($row=$result->fetch_assoc()) {
					echo $row['phanquyen'];
					if($row['phanquyen'] == 1){
					$_SESSION['admin'] = $username;
					echo "1";
					}
				}
				if($row['phanquyen'] == 0){
					$_SESSION['username'] = $username; 
				}
				echo "2";
				header('Location: index.php');
			}else{
				echo "3";
				header('Location: Dangnhap.php');
			}
		}
	}
?>
</body>
</html>	