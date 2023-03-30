<?php
    require_once("./connection.php");

    $sql = "SELECT * FROM province";
    $result=$con->query($sql);
    $data = [];
    while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
        $data[]= array(
            'idprovince' => $row['id'],
            'nameprovince' => $row['_name_province']
        );
    }
?>