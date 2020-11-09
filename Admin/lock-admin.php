<?php
include "server.php";
$id = $_GET['id'];
$query ="SELECT status from admin where ID = '$id'";
$dataa=mysqli_query($conn,$query);
while($row=mysqli_fetch_assoc($dataa)){
if ($row['status']=='LOCK') {
    $sql="UPDATE admin set status = 'ACTIVE' Where ID = $id ";
    if(mysqli_query($conn,$sql)){
        echo "<script>alert('Mở khoá thành công');window.location.href='table-admin.php';</script>";
    }
    else
    {
        echo "<script>alert('Có lỗi xảy ra trong quá trình thực hiện');window.history.go(-1);</script>";
    }
}
if ($row['status']=='ACTIVE') {
    $sql5="UPDATE admin set status = 'LOCK' Where ID = '$id' ";
    if(mysqli_query($conn,$sql5)){
        echo "<script>alert('Khoá thành công');window.location.href='table-admin.php';</script>";
    }
    else
    {
        echo "<script>alert('Có lỗi xảy ra trong quá trình thực hiện');window.history.go(-1);</script>";
    }
}
}
?>