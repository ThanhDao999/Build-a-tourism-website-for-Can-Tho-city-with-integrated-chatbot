<?php
//  Include thư viện PHPExcel_IOFactory vào
include 'Classes/PHPExcel/IOFactory.php';

if(isset($_POST["btnGui1"])) {
    $inputFileName =  basename($_FILES["file1"]["name"]);
}

//  Tiến hành đọc file excel
try {
    $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
    $objReader = PHPExcel_IOFactory::createReader($inputFileType);
    $objPHPExcel = $objReader->load($inputFileName);
} catch(Exception $e) {
    die('Lỗi không thể đọc file "'.pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage());
}

//  Lấy thông tin cơ bản của file excel

// Lấy sheet hiện tại
$sheet = $objPHPExcel->getSheet(0); 

// Lấy tổng số dòng của file, trong trường hợp này là 6 dòng
$highestRow = $sheet->getHighestRow(); 

// Lấy tổng số cột của file, trong trường hợp này là 4 dòng
$highestColumn = $sheet->getHighestColumn();

// Khai báo mảng $rowData chứa dữ liệu

//  Thực hiện việc lặp qua từng dòng của file, để lấy thông tin
for ($row = 2; $row <= $highestRow; $row++){ 
    // Lấy dữ liệu từng dòng và đưa vào mảng $rowData
    $rowData[] = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row, NULL, TRUE,FALSE);
}
require_once("../connection.php");
for ($row1 = 0; $row1 < count($rowData); $row1++){ 
    $ten_pt =  $rowData[$row1][0][0];
    $hang_pt = $rowData[$row1][0][1];
    $chiphi_pt = $rowData[$row1][0][2];
    $diachi_pt = $rowData[$row1][0][3];
    $sdt_pt  = $rowData[$row1][0][4];
    $sql= "insert into phuongtien (ten_pt, hang_pt, chiphi_pt, diachi_pt, sdt_pt) values ('$ten_pt','$hang_pt','$chiphi_pt','$diachi_pt','$sdt_pt')";
    $con->query($sql);
    
}
$con->close();
 echo "<pre>";
 print_r($rowData);
 echo "</pre>";
?>
