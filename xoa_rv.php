<?php
		require_once("./connection.php");
        $sql="delete from nhan_xet_nguoi_xem where id_reviewer = ".$_GET['id_reviewer']."";
        $result=$con->query($sql);

        header("Location: danhsachnhanxet.php");

?>