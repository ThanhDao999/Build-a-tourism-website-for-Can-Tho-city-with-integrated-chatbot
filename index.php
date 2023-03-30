<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DU LỊCH CẦN THƠ</title>

    <!--font awesome cdn file link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!--custom css file link-->
    <link rel="stylesheet" href="css/style.css">
    <!--bootstrap -->
    <script src="popper.min.js"></script>
    <script src="jquery-3.5.1.min.js"></script>
    <script src="./bootstrap/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" type="text/css" href="./bootstrap/css/bootstrap.min.css">
</head>
<body>
    <!--header section starts-->
    <header>
        <a href="#" class="logo">Du lịch<span>.</span> </a>

        <nav class="navbar">
            <ul>
                <li><a data-scroll="home" href="#home" class="active">Trang chủ</a></li>
                <li><a data-scroll="feature" href="#feature">Địa điểm nổi bật</a></li>
                <li><a data-scroll="food" href="#food">Địa điểm ăn uống</a></li>
            <!--    <li><a data-scroll="review" href="#review">Nhận xét</a></li> -->
                <li><a data-scroll="contact" href="#contact">Liên hệ</a></li>
                <li><a data-scroll="khachsan" href="khachsan.php">Địa điểm nơi ở</a>
                <li><a data-scroll="phuongtien" href="phuongtien.php">Phương tiện đi lại</a>
                <?php
                    session_start();
                    if(isset($_SESSION['admin']) && $_SESSION['admin']  == 'admin'){
                        echo "<li><a href='danhsachnguoidung.php' >Quản trị tài khoản</a></li>
                              <li><a href='danhsachnhanxet.php' >Quản trị nhận xét</a></li>
                              <li><a href='baiviet1.php' >Quản trị bài viết ăn uống</a></li>
                              <li><a href='baiviet.php'>Quản trị bài viết địa điểm</a></li>
                              <li><a data-scroll='log in' href='dangxuat1.php'>Đăng xuất</a></li>
                              ";
                    }else if(isset($_SESSION["username"])){
                        echo "<li><a data-scroll='log in' href='dangxuat.php'>Đăng xuất</a></li>";
                        echo "&nbsp&nbsp&nbsp&nbsp";
                        echo "<div style='font-size: 2rem; color:red'>";
                        echo "Chào mừng ".$_SESSION["username"];
                        echo "</div";
                        
                    }else{
                        echo "<li><a data-scroll='log in' href='Dangnhap.php'>Đăng nhập</a></li>
                        <li><a data-scroll='log in' href='dangky.php'>Đăng ký</a></li>";
                    }
                ?>
                

             </ul>
        </nav>
        <div class="fas fa-bars"></div>
    </header>
    <!--header section ends-->

    <!-- home section starts-->
    <section class="home" id="home">

    <div class="video">
        <video src="img/video.mp4" loop muted autoplay></video>
    </div>

    <div class="content">
        <h1>DU LỊCH CẦN THƠ</h1>
        <p>Cần Thơ gạo trắng nước trong, ai đi đến đó lòng không muốn về...</p>
    </div>
    </section>
<!--home section ends-->

<!--province--district-->


        <form name="my-form" onsubmit="" action="index.php" method="POST">
                                <?php
                                    //truy vấn dữ liệu tỉnh thành
                                    require_once("province.php");
                                ?>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="province" style="font-size: 2rem; color: #0098a1">TỈNH/THÀNH PHỐ</label>
                                            <select class="form-control" id="province" name="province">
                                                <option style="font-size: 2rem; color: #0098a1">Chọn Tỉnh/Thành phố</option>
                                                <?php foreach ($data as $province) : ?>
                                                    <option value="<?= $province['idprovince'] ?>"><?= $province['nameprovince'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="district" style="font-size: 2rem; color: #0098a1">QUẬN HUYỆN</label>
                                            <select class="form-control" id="district" name="district">
                                                <option style="font-size: 2rem; color: #0098a1">Chưa chọn Tỉnh/Thành phố</option>
                                            </select>
                                        </div>
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
                                </div>
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary" name="search">
                                        Tìm kiếm
                                    </button>
                                </div>
                </form>
                <?php
                    // Nếu người dùng đã bấm tìm kiếm
                    if(isset($_POST['search'])) {
                        //Truy vấn vào database để so sánh và tìm kiếm
                        // Mở CSDL
                            require_once ('./connection.php');
                        //
                    }
                ?>


<!--end-->


<!--feature section starts-->
    
    <section class="feature" id="feature">
        <h1 class="heading"><span>Địa điểm nổi bật</span></h1>
        <div class="card-container">
            <?php
            
                $con = mysqli_connect('localhost', 'root', '', 'dulichcantho');

                // BƯỚC 2: TÌM TỔNG SỐ RECORDS
                //Biến con nay la ở dau
                $result = mysqli_query($con, 'select count(idbv) as total from baiviet');
                $row = mysqli_fetch_assoc($result);
                $total_records = $row['total'];
 
                // BƯỚC 3: TÌM LIMIT VÀ CURRENT_PAGE
                $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
                $limit = 4;
 
                // BƯỚC 4: TÍNH TOÁN TOTAL_PAGE VÀ START
                // tổng số trang
                $total_page = ceil($total_records / $limit);
 
                // Giới hạn current_page trong khoảng 1 đến total_page
                if ($current_page > $total_page){
                $current_page = $total_page;
                }
                else if ($current_page < 1){
                $current_page = 1;
                }

                // Tìm Start
        $start = ($current_page - 1) * $limit;
 
        // BƯỚC 5: TRUY VẤN LẤY DANH SÁCH TIN TỨC
        // Có limit và start rồi thì truy vấn CSDL lấy danh sách tin tức
        if(isset($_POST['search'])){  
        $pro = $_POST['province'];
        $dis = $_POST['district'];
        $result = mysqli_query($con, "SELECT * FROM baiviet WHERE (bv_province = '$pro' AND bv_district = '$dis') OR (bv_province = '$pro') LIMIT $start, $limit"); 
            $num_rows=$result->num_rows;
           	    if($result->num_rows > 0){
                    while($row=$result->fetch_assoc()){
                        echo "
                        <div class='card'>
                            <img src='". $row['hinhanhbv'] ."' alt=''>
                            <div class='content'>
                                <h3 class='title'> '".$row['tenbv']."' </h3>
                                <p>'".$row['mota_nd']."'</p>
                                <a href='xemthem.php?idbv=".$row['idbv']."'><button class='btn'>Xem thêm!</button></a>
                            </div>
                        </div>";
                    }
                }

        } 
        else{

            $result = mysqli_query($con, "SELECT * FROM baiviet LIMIT $start, $limit");
            $num_rows=$result->num_rows;
           	    if($result->num_rows > 0){
                    while($row=$result->fetch_assoc()){
                        echo "
                        <div class='card'>
                            <img src='". $row['hinhanhbv'] ."' alt=''>
                            <div class='content'>
                                <h3 class='title'> '".$row['tenbv']."' </h3>
                                <p>'".$row['mota_nd']."'</p>
                                <a href='xemthem.php?idbv=".$row['idbv']."'><button class='btn'>Xem thêm!</button></a>
                            </div>
                        </div>";
                    }
                }

        }         
        ?>
        </div>
        <div class="pagination" style="margin-left : 700px; font-size:20px">
           <?php 
            // PHẦN HIỂN THỊ PHÂN TRANG
            // BƯỚC 7: HIỂN THỊ PHÂN TRANG
 
            // nếu current_page > 1 và total_page > 1 mới hiển thị nút prev
            if ($current_page > 1 && $total_page > 1){
                echo '<a href="index.php?page='.($current_page-1).'">Trước</a> | ';
            }
 
            // Lặp khoảng giữa
            for ($i = 1; $i <= $total_page; $i++){
                // Nếu là trang hiện tại thì hiển thị thẻ span
                // ngược lại hiển thị thẻ a
                if ($i == $current_page){
                    echo '<span>'.$i.'</span> | ';
                }
                else{
                    echo '<a href="index.php?page='.$i.'">'.$i.'</a> | ';
                }
            }
 
            // nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
            if ($current_page < $total_page && $total_page > 1){
                echo '<a href="index.php?page='.($current_page+1).'">Sau</a> | ';
            }
           ?>
        </div>  
    </section>
<!--feature section ends-->

<!--food section starts-->
<section class="food" id="food">
        <h1 class="heading"><span>Địa điểm ăn uống</span></h1>

        <div class="card-container1">
        <?php
                $con = mysqli_connect('localhost', 'root', '', 'dulichcantho');
                // BƯỚC 2: TÌM TỔNG SỐ RECORDS
                //Biến con nay la ở dau
                $result = mysqli_query($con, 'select count(idbv1) as total from baiviet1');
                $row = mysqli_fetch_assoc($result);
                $total_records = $row['total'];
 
                // BƯỚC 3: TÌM LIMIT VÀ CURRENT_PAGE
                $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
                $limit = 4;
 
                // BƯỚC 4: TÍNH TOÁN TOTAL_PAGE VÀ START
                // tổng số trang
                $total_page = ceil($total_records / $limit);
 
                // Giới hạn current_page trong khoảng 1 đến total_page
                if ($current_page > $total_page){
                $current_page = $total_page;
                }
                else if ($current_page < 1){
                $current_page = 1;
                }

                // Tìm Start
                $start = ($current_page - 1) * $limit;
                // BƯỚC 5: TRUY VẤN LẤY DANH SÁCH TIN TỨC
                // Có limit và start rồi thì truy vấn CSDL lấy danh sách tin tức
                if(isset($_POST['search'])){  
                $pro = $_POST['province'];
                $dis = $_POST['district'];
                $result = mysqli_query($con, "SELECT * FROM baiviet1 WHERE (bv_province = '$pro' AND bv_district = '$dis') OR (bv_province = '$pro') LIMIT $start, $limit");
                    $num_rows=$result->num_rows;
           	            if($result->num_rows > 0){
                            while($row=$result->fetch_assoc()){
                                echo "
                                <div class='card1'>
                                    <img src='". $row['hinhanhbv'] ."' alt='Chùa Phật Học'>
                                    <div class='content1'>
                                        <h3 class='title1'> '".$row['tenbv']."' </h3>
                                        <p>'".$row['mota_bv1']."'</p>
                                        <a href='xemthem1.php?idbv1=".$row['idbv1']."'><button class='btn'>Xem thêm!</button></a>
                                    </div>
                                </div>";
                    }
                   }

                }
                else {
                    $result = mysqli_query($con, "SELECT * FROM baiviet1 LIMIT $start, $limit");
                    $num_rows=$result->num_rows;
                           if($result->num_rows > 0){
                            while($row=$result->fetch_assoc()){
                                echo "
                                <div class='card1'>
                                    <img src='". $row['hinhanhbv'] ."' alt=''>
                                    <div class='content1'>
                                        <h3 class='title1'> '".$row['tenbv']."' </h3>
                                        <p>'".$row['mota_bv1']."'</p>
                                        <a href='xemthem1.php?idbv1=".$row['idbv1']."'><button class='btn'>Xem thêm!</button></a>
                                    </div>
                                </div>";
                            }
                        }                    
                }
                 ?>
        </div>
       <div class="pagination" style="margin-left : 700px; font-size:20px">
           <?php 
            // PHẦN HIỂN THỊ PHÂN TRANG
            // BƯỚC 7: HIỂN THỊ PHÂN TRANG
 
            // nếu current_page > 1 và total_page > 1 mới hiển thị nút prev
            if ($current_page > 1 && $total_page > 1){
                echo '<a href="index.php?page='.($current_page-1).'">Trước</a> | ';
            }
 
            // Lặp khoảng giữa
            for ($i = 1; $i <= $total_page; $i++){
                // Nếu là trang hiện tại thì hiển thị thẻ span
                // ngược lại hiển thị thẻ a
                if ($i == $current_page){
                    echo '<span>'.$i.'</span> | ';
                }
                else{
                    echo '<a href="index.php?page='.$i.'">'.$i.'</a> | ';
                }
            }
 
            // nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
            if ($current_page < $total_page && $total_page > 1){
                echo '<a href="index.php?page='.($current_page+1).'">Sau</a> | ';
            }
           ?>
        </div>  
    </section>


<!--food section ends-->




<!--contact section starts-->
<section class="contact" id="contact">
    <h1 class="heading"><span>L</span>iên <span>h</span>ệ</h1>

    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15715.366078851608!2d105.76186052604051!3d10.029933585289376!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31a0895a51d60719%3A0x9d76b0035f6d53d0!2zxJDhuqFpIGjhu41jIEPhuqduIFRoxqE!5e0!3m2!1svi!2s!4v1621224337428!5m2!1svi!2s" width="100%" height="300" style="border:0; outline: none;" allowfullscreen="" loading="lazy"></iframe>

    <div class="row">
        <div class="contact-info">
            <div class="box">
                <h3><i class="fas fa-home"></i>Địa chỉ</h3>
                <p>Khu 2,<br>
                Đ.3/2,<br>
                Xuân Khánh,Ninh Kiều</p>
            </div>

            <div class="box">
                <h3><i class="fas fa-evelope"></i>e-mail</h3>
                <p>thanhdao20899@gmail.com</p>
            </div>

            <div class="box">
                <h3><i class="fas fa-phone"></i>Điện thoại liên hệ</h3>
                <p>0899506577</p>
            </div>
        </div>

        <div class="contact-form-container">
            <form action="xuly_review.php" method="POST" enctype="multipart/form-data" >

                <h3>Cảm nhận</h3>

                <div class="inputBox">
                    <input type="text" name="fullname" placeholder="full name">
                    <input type="email" name="email" placeholder="email">
                    <?php
                    if(isset($_SESSION['username'])){
                        echo "<input type='text' name='thanhvien' value='".$_SESSION['username']."' hidden>";
                    }else{
                        echo "<input type='text' name='thanhvien' value='' hidden>";
                    }
                    ?>
                </div>

                <textarea name="boxmess" id="" cols="30" rows="10" placeholder="message"></textarea>

                <input type="submit" value="message" name="btn_rv">
            </form>
        </div>
    </div>
</section>
<!--contact section ends-->

<section class="footer">
    <h1 class="credit"><span>DU LỊCH CẦN THƠ</span></h1>

    <div class="icons">
        <a href="#" class="fab fa-facebook-f"></a>
        <a href="#" class="fab fa-twitter"></a>
        <a href="#" class="fab fa-instagram"></a>
        <a href="#" class="fab fa-github"></a>
    </div>
</section>



























    <!--jquery cdn link-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!--custom js file link-->
    <script src="js/main.js"></script>
</body>
</html>