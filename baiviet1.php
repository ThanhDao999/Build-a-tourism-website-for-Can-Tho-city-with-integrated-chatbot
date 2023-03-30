<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản trị bài viết địa điểm tham quan</title>
    <link rel="stylesheet" href="./css/styleform.css">
    <link rel="stylesheet" type="text/css" href="./bootstrap/css/bootstrap.min.css">
    <script src="jquery-3.5.1.min.js"></script>
       <!--font awesome cdn file link-->
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>
<style>
  body{
    background-image: url("./img/boat.jpg");
    background-repeat: repeat-y;
    background-attachment: fixed;
    font-family: 'Times New Roman', serif;
  }
  h1 {
    margin-top: 1rem;
    color: white;
    text-align: center;
    text-shadow: 2px 2px 5px plum;
    
  }
  .form-group {
    margin-left: 200px;
    margin-right: 200px;
  }
  .btn-group {
    margin-left: 200px;
    width: 100px;
  }
  .btn-primary {
 
    color: black;
    background-color: white ;
    border: 1px solid black;
  }
  .btn-primary:hover{
    background-color: plum ;
  }

</style>

    <h1>Quản lý bài viết địa điểm ăn uống</h1>
    <form action="xuly_baiviet1.php" method="POST" enctype="multipart/form-data">

        <div class="form-group">
            <label>Tiêu đề bài viết</label>
            <input class="form-control" placeholder="nhập tiêu đề bài viết" type="text" name="tenbv">
        </div>

        
        <div class="form-group">
            <label>Hình ảnh</label>
            <input class="form-control" placeholder="ảnh đại diện" type='file' id='image' name='image' />
        </div>


        <div class="form-group">
            <label for="exampleFormControlTextarea1" class='label'>Mô tả sơ lược</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" name='mota_nd' id='mota_nd' placeholder='mô tả sơ lược bài viết'></textarea>
        </div>

        <div class="form-group">
            <label for="exampleFormControlTextarea1" class='label'>Nội dung</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="10"  name='noidung' id='noidung' placeholder='nội dung chi tiết bài viết'></textarea>
        </div>

        <div class="form-group">
          <label>Số điện thoại liên hệ(nếu có)</label>
          <input class="form-control" placeholder="nhập số điện thoại" type="text" name="phone1">
        </div>

        <div class="form-group">
          <label>Địa chỉ</label></td>
          <input class="form-control" placeholder="nhập địa chỉ" type="text" name="address1">
        </div>

        <div class="form-group">
          <label>Giờ mở cửa(nếu có)</label>
          <input class="form-control" placeholder="nhập giờ mở cửa" type="time" name="opentime1">
        </div>

        <div class="form-group">
          <label>Người viết/Nguồn bài viết</label>
          <input class="form-control" placeholder="nhập tác giả bài viết" type="text" name="author1">
        </div>

        <div class="form-group">
          <label>Vị trí trên bản đồ</label></td>
          <textarea class="form-control" id="exampleFormControlTextarea1" rows="10" name='map' id='noidung' placeholder='vị trí trên bản đồ'></textarea>
        </div>

        <div class="form-group">
          <label>Trang web của địa điểm (nếu có)</label></td>
          <input class="form-control" placeholder="nhập đường dẫn trang web" type="text" name="web1"></td>
        </div>

        <div class="form-group">
        <?php
            //truy vấn dữ liệu tỉnh thành
            require_once("province.php");
        ?>
        <label for="province">TỈNH/THÀNH PHỐ</label>
        <select class="form-control" id="province" name="province">
            <option>Chọn Tỉnh/Thành phố</option>
                <?php foreach ($data as $province) : ?>
                    <option value="<?= $province['idprovince'] ?>"><?= $province['nameprovince'] ?></option>
                <?php endforeach; ?>
        </select>
        
        </div>

        <div class="form-group">
        <label for="district">QUẬN HUYỆN</label>
            <select class="form-control" id="district" name="district">
                <option>Chưa chọn Tỉnh/Thành phố</option>
            </select>
        </div>
        <script>
          jQuery(document).ready(function($){
            $("#province").change(function(event){
              provinceID = $("#province").val();
              $.post('district.php',{
                  "provinceid" : provinceID
              }, function(data){
                  $("#district").html(data);
              })
            })
                                    
          })
        </script> 

        <div class="btn-group">
          <input class="btn btn-primary" type='submit' name="btn_submit" value='Lưu bài viết'>
          <input class="btn btn-primary" type='reset' name="btn_reset" value='Làm lại'>
          <a class="btn btn-primary" href="./danhsachbaiviet1.php" role="button">Danh sách bài viết</a>
        </div>










    </from>
</body>
</html>