<!DOCTYPE html>
<html lang="en">

<head>
	<title>Đăng ký</title>
	<meta charset="utf-8">
	<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<style>
	
	
	
			td{
				padding: 10px;
				width: 111px;
			}
			
			table {
			width: 60%;
			border-spacing: 30px;
			border: 1px solid gray ;
			margin-left: 300px;
	}
	
	
	
	</style>
</head>
<body>
<section class="ftco-section">
		<div class="container">
<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">Contact Form #02</h2>
				</div>
			</div>
			<form id="registerForm" onsubmit="return register()" action="xuly_dkythanhvien.php"  method="POST" enctype="multipart/form-data" >
				<table>
				<tr>
					<td>
						<label>Tên đăng nhập</label>
					</td>
					<td>
						<input class="form-control" id="username" name="username" type="text">
					</td>
				</tr>
				<tr>
					<td>
						<label>Mật khẩu</label>
					</td>
					<td>
						<input id="password" name="password" type="password">
					</td>
				</tr>
				<tr>
					<td>
						<label>Gõ lại mật khẩu</label>
					</td>
					<td>
						<input id="repassword" name="repassword" type="password">
					</td>
				</tr>

				<tr>
					<td>
						<label>Giới tính</label>
					</td>
					<td>
						<input type="radio" name="gender" value="Nam" checked>
						<label for="male">Nam</label>
						<input type="radio" name="gender" value="Nữ">
						<label for="female">Nữ</label>
						<input type="radio" name="gender" value="Khác">
						<label for="female">Khác</label>
					</td>
				</tr>
				<tr>
					<td>
						<label>Nghề nghiệp</label>
					</td>
					<td>
						<select  name="job" id="nghe">
							<option  value="Học sinh">Học sinh</option >
							<option  value="Sinh viên">Sinh viên</option >
							<option  value="Giáo viên">Giáo viên</option >
							<option  value="Khác">Khác</option >
						</select >
					</td>
				</tr>
				<tr>
					<td>
						<label>Sở thích</label>
					</td>
					<td>
						<input type="checkbox" id="thethao" name="hobbies[]" value="Thể thao">
						<label for="thethao">Thể thao</label>
						
						<input type="checkbox" id="dulich" name="hobbies[]" value="Du lịch">
						<label for="dulich">Du lịch</label>
						
						<input type="checkbox" id="amnhac" name="hobbies[]" value="Âm nhạc">
						<label for="amnhac">Âm nhạc</label>
						
						<input type="checkbox" id="thoitrang" name="hobbies[]" value="Thời trang">
						<label for="thoitrang">Thời trang</label>
					</td>
				</tr>
				
				<tr>
					<td></td>
					<td>
						<button type="submit" name="btn_submit">Đăng ký</button>
					</td>
				</tr>
				</table>
			</form>



	 <script type="text/javascript">
        
        function register(){

            var username = document.forms['registerForm']['username'].value;
            var password = document.forms['registerForm']['password'].value;
            var repassword = document.forms['registerForm']['repassword'].value;
            var sex = document.forms['registerForm']['gender'].value;
         //   var image = document.forms['registerForm']['image'].value;
            var hobbies = document.getElementsByName('hobbies[]');
            var job = document.forms['registerForm']['job'].value;
            
            var check = true;
            var message = '';

            var reg_username = /^[a-zA-Z][\d\w]{6,15}$/;
            var reg_password = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{6,15}$/;



            //check username
            if (reg_username.test(username)) {
            	console.log('OK');

            }else {
            	console.log('Fail');
            	check = false;
            	message += "Tên đăng nhập phải bắt đầu phải là chữ cái, theo sau có thể là chữ cái hoặc là số; dài từ 6 đến 15 ký tự. ";
        	}


        	//check password
        	if (reg_password.test(password)) {
            	console.log('OK');

            }else {
            	console.log('Fail');
            	check = false;
            	message += " Mật khẩu phải có cả chữ cái và số; không được có ký tự khác ngoài chữ cái và số; dài từ 6 đến 15 ký tự. ";
        	}


        	//check repassword match with password
        	if (password !== repassword) {
        		check = false;
        		message += " Mật khẩu nhập lại không khớp ";
        	}


			//check image
        	if ( image === null || image == "") {
        		check = false;
        		message += " Hình ảnh ";
        	}


        	//check sex
        	if ( sex === null || sex == "") {
        		check = false;
        		message += " Giới tính ";
        	}

        	//check job
        	if ( job == null || job == "") {
        		check = false;
        		message += " Nghề nghiệp ";
        	}


        	//check hobby
        	// if ( hobbies == null || hobbies == "") {
        	// 	check = false;
        	// 	message += " Sở thích ";
        	// }


        	//check hobby
        	var listHobby = "";
			 for (i = 0; i < hobbies.length; i++) {
			    if (hobbies[i].checked) {
			     listHobby += hobbies[i].value + " ";
			    }
			  }
			


        	if(!check){
                alert(message + " bị rỗng hoặc lỗi. Vui lòng nhập lại !!!");

                return false;
            }
            else return true;
    
        }

    </script>

	
	</div>
	</div>
	</div>
					
				</div>
			</div>
			</section>
</body>
</html>