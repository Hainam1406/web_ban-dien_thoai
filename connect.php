<?php 
$username = "root"; // thông tin đăng nhập host
$password = "hainam01"; // mật khẩu, trong trường hợp này là trống
$host = "localhost"; // host là localhost
$database = 'laravel_demo'; // database là website

// Tạo kết nối đến database dùng mysqli_connect()
$conn = mysqli_connect($host,$username,$password,$database) or die("không thể kết nối tới database");
// Thiết lập kết nối ủa chúng ta khi truy vấn là dạng UTF8 trong trường hợp dữ liệu là tiếng việt có dâu
mysqli_query($conn,"SET NAMES 'UTF8'");



 ?>