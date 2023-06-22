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
    <title>Login</title>
</head>
<body>
    <div class="forms__container">
        <div class="forms__container-signup">
          <!-- Form Đăng Nhập -->
          <form action="login.php" class="sign__up-form" method="post">
                <h2 class="sign__up-title">Đăng nhập</h2>
                <h3>
                  <?php 
                    //kết nối db
                    require_once("connect.php");
                    // Kiểm tra nếu người dùng đã ân nút đăng nhập thì mới xử lý
                  if (isset($_POST["btnLogin"])) {
                    // lấy thông tin người dùng
                    $username = $_POST["username"];
                    $password = $_POST["password"];
                    //làm sạch thông tin, xóa bỏ các tag html, ký tự đặc biệt 
                    //mà người dùng cố tình thêm vào để tấn công theo phương thức sql injection
                    $username = strip_tags($username);
                    $username = addslashes($username);
                    $password = strip_tags($password);
                    $password = addslashes($password);
                    if ($username == "" || $password =="") {
                      echo "username hoặc password bạn không được để trống!";
                    }else{
                      $sql = "select * from users where username = '$username' and password = '$password' ";
                      $query = mysqli_query($conn,$sql);
                      $num_rows = mysqli_num_rows($query);
                      if ($num_rows==0) {
                        echo "tên đăng nhập hoặc mật khẩu không đúng !";
                      }else{
                        // Lấy ra thông tin người dùng và lưu vào session
                        while ( $data = mysqli_fetch_array($query) ) {
                          $_SESSION["user_id"] = $data["id"];
                          $_SESSION['username'] = $data["username"];
                          $_SESSION["email"] = $data["email"];
                          $_SESSION["full_name"] = $data["fullname"];
                          }
                        
                                  // Thực thi hành động sau khi lưu thông tin vào session
                                  // ở đây mình tiến hành chuyển hướng trang web tới một trang gọi là index.php
                        header('Location: index.html');
                      }
                    }
                  }

            ?>
                </h3>
                <div class="input-field">
                  <i class="fas fa-user"></i>
                  <input type="text" name="username" placeholder="Tên Đăng Nhập"  />
                </div>
               <div class="input-field">
                  <i class="fas fa-lock"></i>
                  <input type="password" name="password" placeholder="Mật Khẩu"  />
                </div>
                <input type="submit" name="btnLogin" class="btn__register" value="Đăng Ký" />
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