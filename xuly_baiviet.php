<?php
    session_start();    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xulybaiviet</title>
</head>
<body>
    <?php
        require_once("./connection.php");
        if (isset($_POST["btn_submit"])){
            $tenbaiviet = $_POST['tenbv'];
            $hinhanhbv ="./img/" . $_FILES['image']['name'];
            move_uploaded_file($_FILES['image']['tmp_name'],$hinhanhbv);
            $mota_nd = $_POST['mota_nd'];
            $noidungbv = $_POST['noidung'];
            $phone = $_POST['phone'];
            $address = $_POST['address'];
            $open = $_POST['opentime'];
            $author = $_POST['author'];
            $map = $_POST['map'];
            $web = $_POST['web'];
            $province = $_POST['province'];
            $district = $_POST['district'];
        $sql= "insert into baiviet (hinhanhbv, tenbv, noidungbv, mota_nd,so_dien_thoai,dia_chi,gio_mo_cua,nguoi_viet_nguon_viet,vi_tri_ban_do,trang_web, bv_province, bv_district) 
        values ('$hinhanhbv','$tenbaiviet','$noidungbv','$mota_nd','$phone','$address','$open','$author','$map','$web', '$province', '$district')";

        $con->query($sql);

    $_SESSION['content'] = $tenbaiviet;
    header('Location: danhsachbaiviet.php');

    $con->close();
 }
 ?>
</body>
</html>