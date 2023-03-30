<?php
		require_once("./connection.php");
        $sql="delete from baiviet1 where idbv1 = ".$_GET['idbv1']."";
        $result=$con->query($sql);

        header("Location: danhsachbaiviet1.php");

?>