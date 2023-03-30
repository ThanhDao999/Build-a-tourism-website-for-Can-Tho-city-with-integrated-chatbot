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
<style>
    h1 {
        text-align: center;
        font-family: 'Times New Roman', Times, serif;
        font-size: 4rem;
        padding-top: 4rem;
        color: #0098a1;
    }
    table{
		width:10rem;
		background-color: white;
		border-radius: 25px;
        text-align: center;
        font-size: 1.5rem;
	}
    img {
		width: 100rem;
		height: auto;
	}
</style>
<body>
    <!--header section starts-->
    <header>
        <a href="#" class="logo">Du lịch<span>.</span> </a>

        <nav class="navbar">
            <ul>

                <?php
                    session_start();
                    if(isset($_SESSION['admin']) && $_SESSION['admin']  == 'admin'){
                        echo "<li><a>Quản trị tài khoản</a></li>
                              <li><a href='baiviet.php'>Quản trị bài viết</a></li>";
                    }else if(isset($_SESSION["username"])){
                        echo "<li><a data-scroll='log in' href='dangxuat.php'>Đăng xuất</a></li>";
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

<!--content starts-->
        <?php
                require_once("./connection.php");
                $sql = "select * from baiviet where idbv = ".$_GET['idbv']."";
                $result=$con->query($sql);
                $num_rows=$result->num_rows;
           	    if($result->num_rows > 0){
                    while($row=$result->fetch_assoc()){
                        echo "
                        
                        <h1 class='heading' style='text-align:center;'><span>".$row['tenbv']."</span></h1>;
                        
                        <div class='table-responsive'>
                        
                        <table class='table'>
                        <tr>
                        <td> 
                            <img src='". $row['hinhanhbv'] ."' alt='' style='margin-left:50px; width:50rem '>
                        </td>
                        </tr>

                        <tr>
                        <td>
                            '".$row['noidungbv']."'
                        </td>
                        </tr>

                        <tr>
                        <td>
                          ".$row['vi_tri_ban_do'].";
                        </td>
                        </tr>
               
                        <tr>
                        <td style='text-align: right'>
                            Địa chỉ:  '".$row['dia_chi']."'
                        </td>
                    </tr>

                    <tr>
                        <td style='text-align: right'>
                            Số điện thoai liên hệ: '".$row['so_dien_thoai']."'
                        </td>
                    </tr>

                    <tr>
                        <td style='text-align: right'>
                        Trang web liên hệ của địa điểm: '".$row['trang_web']."'
                        </td>
                    </tr>

                    <tr>
                        <td style='text-align: right'>
                            Người viết bài(Nguồn): '".$row['nguoi_viet_nguon_viet']."';
                        </td>
                    </tr>

                        </table>
                        </div>
                       
                      ";
                    }
                   }
                
            ?>
    
    
<!--content ends-->

<!--contact section starts-->
<section class="contact" id="contact">
    <h1 class="heading"><span>L</span>iên <span>h</span>ệ</h1>

    <div class="row">
        <div class="contact-info">
            <div class="box">
                <h3><i class="fas fa-home"></i>Địa chỉ</h3>
                <p>wertty,<br>
                mmgfmdfd,<br>
                4354546.</p>
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
            <form action="">

                <h3>Cảm nhận</h3>

                <div class="inputBox">
                    <input type="text" placeholder="full name">
                    <input type="email" placeholder="email">
                </div>

                <textarea name="" id="" cols="30" rows="10" placeholder="message"></textarea>

                <input type="submit" value="message">
            </form>
        </div>
    </div>
</section>
<!--contact section ends-->




























    <!--jquery cdn link-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!--custom js file link-->
    <script src="js/main.js"></script>
</body>
</html>