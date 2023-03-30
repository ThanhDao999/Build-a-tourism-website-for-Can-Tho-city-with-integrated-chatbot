<?php 
    session_start();
?>
<?php
    if (isset($_POST["btn_rv"])) {
        $ten = $_POST['fullname'];
        $email = $_POST['email'];
        $mess = $_POST['boxmess'];
        $thanhvien = $_POST['thanhvien'];
        if(($ten == "") && ($email == "") && ($mess == "")){
            echo "<script>alert('ten dang nhap bị trống')</script>";
            //header("Location: dangky.php");
        }

    require_once("./connection.php");
    $sql1 = "select id from thanhvien where tendangnhap = '$thanhvien'";
    $result1 = mysqli_query($con, $sql1);
 
    if (mysqli_num_rows($result1) > 0) {
        $row = mysqli_fetch_assoc($result1);
        $id_thanhvien = $row["id"];
        echo 
        $sql= "insert into nhan_xet_nguoi_xem (ten_reviewer,email, nd_reviewer,id_tv) values ('$ten','$email','$mess','$id_thanhvien')";
        $con->query($sql);
    } 
    

    // setcookie("user", "$tendangnhap", time()+600);
    $_SESSION['fullname'] = $ten;

    $con->close();
  //  header('Location: Dangnhap.php');
    }


?>