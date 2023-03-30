<?php
		require_once("./connection.php");
        $sql="delete from baiviet where idbv = ".$_GET['idbv']."";
        $result=$con->query($sql);

        header("Location: danhsachbaiviet.php");

?>