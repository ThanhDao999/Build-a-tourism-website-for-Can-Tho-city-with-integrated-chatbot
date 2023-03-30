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
            $phone = $_POST['phone1'];
            $address = $_POST['address1'];
            $open = $_POST['opentime1'];
            $author = $_POST['author1'];
            $map = $_POST['map1'];
            $web = $_POST['web1'];
            $province = $_POST['province'];
            $district = $_POST['district'];

        $sql= "insert into baiviet1 (hinhanhbv, tenbv, mota_bv1, noidungbv1,so_dien_thoai_1,dia_chi_1,gio_mo_cua_1,nguoi_viet_nguon_viet_1,vi_tri_ban_do_1,trang_web_1, bv_province, bv_district) values ('$hinhanhbv','$tenbaiviet','$mota_nd','$noidungbv','$phone','$address','$open','$author','$map','$web','$province','$district')";

        $con->query($sql);

    $_SESSION['content'] = $tenbaiviet;
    header('Location: danhsachbaiviet1.php');

    $con->close();





        }




    ?>
</body>
</html>