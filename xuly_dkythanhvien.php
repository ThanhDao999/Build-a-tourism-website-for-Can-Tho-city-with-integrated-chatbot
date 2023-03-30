<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
</head>
<body>
<?php
       if (isset($_POST["btn_submit"])) {
        $tendangnhap = $_POST['username'];
        $matkhau =md5($_POST['password']);
        $gioitinh = $_POST['gender'];
        $nghenghiep = $_POST['job'];
        $sothich = implode(', ',$_POST['hobbies']);
        if($tendangnhap == ""){
            echo "<script>alert('ten dang nhap bị trống')</script>";
            //header("Location: dangky.php");
        }

    require_once("./connection.php");

    $sql= "insert into thanhvien (tendangnhap, matkhau, gioitinh, nghenghiep, sothich) values ('$tendangnhap','$matkhau','$gioitinh','$nghenghiep','$sothich')";

    $con->query($sql);

    // setcookie("user", "$tendangnhap", time()+600);
    $_SESSION['user'] = $tendangnhap;

    $con->close();
    header('Location: Dangnhap.php');
    }
?>

</body>
</html>