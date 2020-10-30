<?php session_start(); 
 
if (isset($_SESSION['Name'])){
    unset($_SESSION['Name']); // xóa session login
}
?>
<a href="index1.php">HOME</a>