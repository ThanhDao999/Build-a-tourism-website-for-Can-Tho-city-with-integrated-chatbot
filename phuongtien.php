<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Phương tiện du lịch</title>
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
    <h1>Phương tiện du lịch dành cho du khách tham khảo</h1>
<?php

        require_once("./connection.php");
        $sql="select * from phuongtien ";
        $result=$con->query($sql);
        echo "<table class='table'>";
        echo "<thead class='thead-dark'>";
        echo "<tr>
            <th scope='col'>Tên phương tiện</th>
            <th scope='col'>Hãng phương tiện</th>
            <th scope='col'>Chi phí phương tiện</th>
            <th scope='col'>Địa chỉ hãng phương tiện</th>
            <th scope='col'>Số điện thoại của hãng phương tiện</th>
        </tr>";
        echo "</thead>";
        echo "<tbody>";
        if($result->num_rows > 0){
            while($row=$result->fetch_assoc()){
            
         echo "<tr>
                         <td> ".$row['ten_pt']." </td>
                         <td> ".$row['hang_pt']." </td>
                         <td> ".$row['chiphi_pt']." </td>
                         <td> ".$row['diachi_pt']." </td>
                         <td> ".$row['sdt_pt']." </td>
                     </tr>";
            }}
        echo "</tbody>";
        echo "</table>";         
        $con->close();
          
            


    
        
     
?>
</body>
</html>