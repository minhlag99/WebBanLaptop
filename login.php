<?php
//Khai báo sử dụng session
session_start();
 
//Khai báo utf-8 để hiển thị được tiếng việt
 
//Xử lý đăng nhập
if (isset($_POST['login'])) 
{
    //Kết nối tới database
    include "server.php";
    //Lấy dữ liệu nhập vào
    $username = addslashes($_POST['email']);
    $password = addslashes($_POST['pass']);
     
    //Kiểm tra đã nhập đủ tên đăng nhập với mật khẩu chưa
    if (!$username || !$password) {
		echo "<script>alert('Xin vui lòng điền đủ thông tin');window.history.go(-1);</script>";
        exit;
    }
    $queryy ="SELECT status FROM user WHERE Name='$username'";
	$dataa =mysqli_query($conn,$queryy);
	$row=mysqli_num_rows($dataa);
	if ($row=='LOCK') {
		echo "<script>alert('Tài khoản của bạn đã bị khoá.');history.go(-1);</script>";
		die();
	};
     
    // mã hóa pasword
     
	//Kiểm tra tên đăng nhập có tồn tại không
	$query ="SELECT Name FROM user WHERE Name='$username'";
	$data =mysqli_query($conn,$query);
    if (mysqli_num_rows($data) == 0) {
        echo "<script>alert('Tên đăng nhập này không tồn tại');history.go(-1);</script>";
        exit;
    }
     
	//Lấy mật khẩu trong database ra
	$query1 ="SELECT Password FROM user WHERE Name='$username'";
	$data1 =mysqli_query($conn,$query1);
    $row1 = mysqli_fetch_array($data1);
     
    //So sánh 2 mật khẩu có trùng khớp hay không
    if ($password != $row1['Password']) {	
		//echo "Mật khẩu không đúng. Vui lòng nhập lại. <a href='text/javascript: history.go(-1)'>Trở lại</a>";
        exit;
    }
    //Lưu tên đăng nhập
    $_SESSION['Name'] = $username;
	echo "<script>alert('Đăng nhập thành công');window.location.href='index.php';</script>";
    die();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V11</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="login/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="login/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/css/util.css">
	<link rel="stylesheet" type="text/css" href="login/css/main.css">
<!--===============================================================================================-->
<!--===============================================================================================-->	
<script src="login/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="login/vendor/bootstrap/js/popper.js"></script>
	<script src="login/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="login/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="login/js/main.js"></script>

</head>
<body>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-l-50 p-r-50 p-t-77 p-b-30">
				<form action='login.php' class="login100-form validate-form" method='POST'>
					<span class="login100-form-title p-b-55">
						Login
					</span>
					<div class="wrap-input100 validate-input m-b-16" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="email" placeholder="Email">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<span class="lnr lnr-envelope"></span>
						</span>
					</div>

					<div class="wrap-input100 validate-input m-b-16" data-validate = "Password is required">
						<input class="input100" type="password" name="pass" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<span class="lnr lnr-lock"></span>
						</span>
					</div>

					<div class="contact100-form-checkbox m-l-4">
						<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
						<label class="label-checkbox100" for="ckb1">
							Remember me
						</label>
					</div>
					
					<div class="container-login100-form-btn p-t-25">
						<button type='submit' class="login100-form-btn" name ="login">
							Login
						</button>
					</div>

					<div class="text-center w-full p-t-42 p-b-22">
						<span class="txt1">
							Or login with
						</span>
					</div>

					<a href="#" class="btn-face m-b-10">
						<i class="fa fa-facebook-official"></i>
						Facebook
					</a>

					<a href="#" class="btn-google m-b-10">
						<img src="images/icons/icon-google.png" alt="GOOGLE">
						Google
					</a>
					<div class="text-center w-full p-t-115">
						<span class="txt1">
							Not a member?
						</span>
						<a class="txt1 bo1 hov1" href="register.php">
							Sign up now							
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>