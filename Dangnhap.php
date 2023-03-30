<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
</head>
<style>
    .dn {
        margin-left: 500px;
    }
</style>

<body>

    <div style="width: 500px; border: 1px solid black" class="dn">
        <h1 align="center">Đăng Nhập</h1>
        <form id="loginForm" method="POST" onsubmit="return login()" action="xuly_dangnhap.php" >
            <table align="center" cellspacing="30">
                <tr>
                    <td class="label">Tên đăng nhập</td>
                    <td><input id="username" type="text" name="username" size="30"></td>
                </tr>
                <tr>
                    <td class="label">Mật khẩu</td>
                    <td><input id="password" type="password" name="password" size="30"></td>
                </tr>
                <tr>
                    <td colspan="2" align="center"> <button type="submit" name="btn_submits">Đăng nhập</button> </td>
                </tr>
            </table>
        </form>
    </div>

    
    <script type="text/javascript">
        
        function login(){

            var username = document.forms['loginForm']['username'].value;
            var password = document.forms['loginForm']['password'].value;
            var check = true;
            var message = '';

            if ( (username == null || username == '') ) {
                message += " username ";
                check = false;
            }

            if((password == null || password == '' )){
                message += " password ";
                check = false;
            }


            if(!check){
                alert(message + " is null. Please input !!!");
                return false;
            }
            return true;
    
        }

    </script>
    
</body>

</html>