<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nhận xét khách hàng</title>
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
    <h1>Danh sách bài viết nhận xét của thành viên</h1>
<?php
    if (isset($_SESSION['admin'])) {
        require_once("./connection.php");
        $sql="select * from nhan_xet_nguoi_xem ";
        $result=$con->query($sql);
        echo "<table class='table'>";
        echo "<thead class='thead-dark'>";
        echo "<tr>
            <th scope='col'>Tên người dùng</th>
            <th scope='col'>Sửa</th>
            <th scope='col'>Xóa</th>
        </tr>";
        echo "</thead>";
        echo "<tbody>";
        if($result->num_rows > 0){
            while($row=$result->fetch_assoc()){
            
         echo "<tr>
                         <td> ".$row['ten_reviewer']." </td>
                         <td> <a href='sua_rv.php?id_reviewer=".$row['id_reviewer']." '> <img src='./img/edit.png' style='width:20px'> </a> </td>
                         <td> <a href='xoa_rv.php?id_reviewer=".$row['id_reviewer']."'> <img src= './img/delete.png' style='width:20px'> </a> </td>
                     </tr>";
            }}
        echo "</tbody>"; 
        echo "</table>";  
             
        $con->close();
    }      
            


    
        
     
?>
</body>
</html>