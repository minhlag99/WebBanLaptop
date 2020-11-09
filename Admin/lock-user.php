<?php
include "server.php";
$id = $_GET['id']; 
$query ="SELECT status FROM user WHERE ID = '$id'";
$data=mysqli_query($conn,$query);
while($row=mysqli_fetch_assoc($data)){
    if ($row['status']=='LOCK') {
        $sql="UPDATE user set status = 'ACTIVE' Where ID = '$id' ";
        if(mysqli_query($conn,$sql)){
            echo "<script>alert('Khoá thành công');window.location.href='table-user.php';</script>";
        }
        else
        {
            echo "<script>alert('Có lỗi xảy ra trong quá trình thực hiện');window.history.go(-1);</script>";
        }
    }
    if ($row['status']=='ACTIVE') {
        $sql="UPDATE user set status = 'LOCK' Where ID = '$id' ";
        if(mysqli_query($conn,$sql)){
            echo "<script>alert('Mở khoá thành công');window.location.href='table-user.php';</script>";
        }
        else
        {
            echo "<script>alert('Có lỗi xảy ra trong quá trình thực hiện');window.history.go(-1);</script>";
        }
    }
}
?>