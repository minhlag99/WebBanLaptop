<?php
 
    // Nếu không phải là sự kiện đăng ký thì không xử lý
    //if (!isset($_POST['register'])){
        //die('');
    //}

    //Nhúng file kết nối với database
    include "server.php";
          
    //Khai báo utf-8 để hiển thị được tiếng việt
    //Lấy dữ liệu từ file dangky.php
    $username   = addslashes($_POST['email_user']);
    $password   = addslashes($_POST['pass']);
    $repass      = addslashes($_POST['re_pass']);
    $fullname   = addslashes($_POST['name']);
    $address   = addslashes($_POST['address']);
    //$sex        = addslashes($_POST['txtSex']);
          
    //Kiểm tra người dùng đã nhập liệu đầy đủ chưa
    if (!$username || !$password || !$repass || !$fullname || !$address)
    {
        echo "<script>alert('Xin vui lòng điền đủ thông tin');window.history.go(-1);</script>";
        exit;
    }
    // Mã khóa mật khẩu
    //$password = md5($password);
    $queryy = "SELECT Email FROM user WHERE Email='$username'";
    $dataa = mysqli_query($conn,$queryy);
    //Kiểm tra tên đăng nhập này đã có người dùng chưa
    if ( mysqli_num_rows($dataa) > 0){
        echo "<script>alert('Tên đăng nhập này đã có người dùng');window.history.go(-1);</script>";
        exit;
    }
          
    //Kiểm tra email có đúng định dạng hay không
    //if (!eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$", $email))
    //{
        //echo "Email này không hợp lệ. Vui long nhập email khác. <a href='javascript: history.go(-1)'>Trở lại</a>";
        //exit;
    //}
        //$query1="SELECT Email FROM user WHERE Email='$email";
        //$data1=mysqli_query($conn,$query1);
    //Kiểm tra email đã có người dùng chưa
    //if (mysqli_num_rows($data1) > 0)
    //{
        //echo "Email này đã có người dùng. Vui lòng chọn Email khác. <a href='javascript: history.go(-1)'>Trở lại</a>";
        //exit;
    //}
    //Kiểm tra dạng nhập vào của ngày sinh
    //if (!preg_match("^[0-9]+/[0-9]+/[0-9]{2,4}", $birthday))
    //{
            //echo "Ngày tháng năm sinh không hợp lệ. Vui long nhập lại. <a href='javascript: history.go(-1)'>Trở lại</a>";
            //exit;
        //}
          
    //Lưu thông tin thành viên vào bảng
    $sql = "INSERT INTO user (Name, Email, Password, Address) 
    VALUES ('{$fullname}','{$username}','{$password}','{$address}')";
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Đăng ký thành công');window.location.href='index.php';</script>";
      }
      else {
        echo "Có lỗi xảy ra trong quá trình đăng ký. <script>window.history.go(-1);}</script>";
      }
                          
    //Thông báo quá trình lưu
?>