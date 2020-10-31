<?php session_start(); 
 
if (isset($_SESSION['Name'])){
    unset($_SESSION['Name']); // xóa session login
}
?>
<?php
    echo "<script>alert('Đăng xuất thành công');window.location.href='index.php';</script>";
?>