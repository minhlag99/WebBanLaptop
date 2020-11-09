<?php
include "server.php";
$id= $_GET['id'];
$sql="DELETE FROM product Where ID = $id ";
$query=mysqli_query($conn,$sql);
header('location:Table.php');
?>