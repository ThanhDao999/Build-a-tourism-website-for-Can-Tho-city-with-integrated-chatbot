<?php
		require_once("./connection.php");
        $sql="delete from thanhvien where id = ".$_GET['id']."";
        echo $sql;
        $result=$con->query($sql);

        header("Location: danhsachnguoidung.php");

?>