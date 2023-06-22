<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://fonts.googleapis.com/css2?family=Raleway:wght@100;400&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Titillium+Web:wght@200;300;400;600;700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
	<link rel="stylesheet" href="assets/css/base.css">
	<link rel="stylesheet" href="assets/css/login.css">
	<title>Register</title>
</head>
<body>
	<div class="forms__container">
        <div class="forms__container-signup">
          <!-- Form Đăng Ký -->
          <form action="register.php" class="sign__up-form" method="post">
	            <h2 class="sign__up-title">Đăng ký</h2>
	            <h3>
	            	<?php 
												// kết nối đến file connect
												require_once("connect.php");
												// Kiểm tra thông tin người dùng nhập
												if (isset($_POST['btnRegister'])) {
													$username = $_POST["username"];
													$password = $_POST["password"];
													$email = $_POST["email"];
													$full_name = $_POST["full_name"];
													// Kiểm tra điều kiện bắt buộc đối với các field không được bỏ trống
													if ($username == "" || $password == "" || $email == "" || $full_name == "") {
														echo 'Bạn vui lòng nhập đầy đủ thông tin';
													}else {
														// kiểm tra tài khoản đã tồn tại chưa
														$sql="select * from users where username='$username'";
														$kt = mysqli_query($conn, $sql);
														if (mysqli_num_rows($kt) > 0) {
															echo 'Tài khoản đã tồn tại';
														}else {
															//thực hiện lưu trữ vào db
															$sql = "INSERT INTO users(username, password, full_name, email) VALUES (
												    					'$username',
												    					'$password',
																	    '$full_name',
												    					'$email'
												    					)";
															// thực thi câu $sql với biến conn lấy từ file connection.php
											   						mysqli_query($conn,$sql);
															   		echo "chúc mừng bạn đã đăng ký thành công";
															   		header('Location: login.php');
														}
													}
												}


	 								?>

	            </h3>
	            <div class="input-field">
	              <i class="fas fa-user"></i>
	              <input type="text" name="username" placeholder="Tên Đăng Nhập"/>
	            </div>
	           <div class="input-field">
	              <i class="fas fa-lock"></i>
	              <input type="password" name="password" placeholder="Mật Khẩu"/>
	            </div>
	            <div class="input-field">
	              <i class="fas fa-envelope"></i>
	              <input type="email" name="email" placeholder="Email"/>
	            </div>
	            <div class="input-field">
	              <i class="fas fa-user-edit"></i>
	              <input type="text" name="full_name" placeholder="Tên Đầy Đủ"/>
	            </div>
	            <input type="submit" name="btnRegister" class="btn__register" value="Đăng Ký" />
	            <p class="social-text">Hoặc Đăng nhập bằng các nền tảng xã hội</p>
	            <div class="social-media">
	              <a href="#" class="social-icon">
	                <i class="fab fa-facebook-f"></i>
	              </a>
	              <a href="#" class="social-icon">
	                <i class="fab fa-twitter"></i>
	              </a>
	              <a href="#" class="social-icon">
	                <i class="fab fa-google"></i>
	              </a>
	              <a href="#" class="social-icon">
	                <i class="fab fa-linkedin-in"></i>
	              </a>
	            </div>
          </form>
 
        
        </div>
      </div>
</body>
</html>