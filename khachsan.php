<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Địa điểm nghỉ ngơi</title>
    <!--bootstrap -->
    <script src="popper.min.js"></script>
    <script src="jquery-3.5.1.min.js"></script>
    <script src="./bootstrap/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" type="text/css" href="./bootstrap/css/bootstrap.min.css">
</head>
<style>
    table {
        width: 100%;
    }
    h1 {
        text-align: center;
        font-family: 'Times New Roman', Times, serif;
    }
</style>
<body>
    <h1>Địa điểm nghỉ ngơi dành cho du khách tham khảo</h1>
<?php

        require_once("./connection.php");
        $sql="select * from khachsan_bv ";
        $result=$con->query($sql);
        echo "<table class='table'>";
        echo "<thead class='thead-dark'>";
        echo "<tr>
            <th scope='col'>Tên khách sạn</td>
            <th scope='col'>Địa chỉ</td>
            <th scope='col'>Số điện thoại</td>
        </tr>";
        echo "</thead>";
        echo "<tbody>";
        if($result->num_rows > 0){
            while($row=$result->fetch_assoc()){
            
         echo "<tr>
                         <td> ".$row['tenks']." </td>
                         <td> ".$row['diachi']." </td>
                         <td> ".$row['sdt']." </td>
                     </tr>";
            }}
        echo "</tbody>";
        echo "</table>";         
        $con->close();
          
            


    
        
     
?>
</body>
</html>