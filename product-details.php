<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>Laptop Store | Website</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/owl.css">
  </head>

  <body>

    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>  
    <!-- ***** Preloader End ***** -->

    <!-- Header -->
    <div class="sub-header">
      <div class="container">
        <div class="row">
          <div class="col-md-8 col-xs-12">
            <ul class="left-info">
              <li><a href="#"><i class="fa fa-envelope"></i>contact@company.com</a></li>
              <li><a href="#"><i class="fa fa-phone"></i>123-456-7890</a></li>
            </ul>
          </div>
          <div class="col-md-4">
            <ul class="right-icons">
              <li><a href="#"><i class="fa fa-facebook"></i></a></li>
              <li><a href="#"><i class="fa fa-twitter"></i></a></li>
              <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>

    <header class="">
      <nav class="navbar navbar-expand-lg">
        <div class="container">
          <a class="navbar-brand" href="index.php"><h2>Laptop Store<em>.Website</em></h2></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item active">
                <a class="nav-link" href="index.php">Trang Chủ
                  <span class="sr-only">(current)</span>
                </a>
              </li>
              <li class="nav-item dropdown">
			            <a class="dropdown-toggle nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Hãng sản xuất</a>
			            <div class="dropdown-menu">
				  <?php
				  include "server.php";
				  $query="SELECT * from catalog";
				  $data =mysqli_query($conn,$query);
				  while($row=mysqli_fetch_array($data))
				  {
				  ?>
                    <a class="dropdown-item" href="products_brand.php?ID=<?php echo$row['Parent_ID'];?>"><?php echo $row['Name']?></a>
          <?php
          }
          ?>
				  </div>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="products.php?page=1">Sản phẩm</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="checkout.php">Thanh toán</a>
              </li>
              <li class="nav-item">
              <?php 
                if (isset($_SESSION['Name']) && $_SESSION['Name']){
                  echo 'Xin chào '.$_SESSION['Name']."<br/>";
                  echo '<a href="logout.php" class="filled-button">Đăng xuất</a>';
                }
                else{
                  echo '<a href="login.php" class="filled-button">Đăng nhập</a>';
              }
              ?>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </header>
    <!-- Page Content -->
     <?php 
         include "server.php";
         $detail=$_GET['sanpham'];
         $query="SELECT * FROM product Where ID= $detail";
         $data=mysqli_query($conn,$query);
         $row=mysqli_fetch_array($data)
       
        ?>
    <div class="page-heading header-text">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h1><sup>VNĐ</sup><?php echo $row['Price'];?></h1>
          </div>
        </div>
      </div>
    </div>

    <div class="services">
    
      <div class="container">
      
        <div class="row">
          <div class="col-md-7">
            <div>
              <img src="<?php echo $row['Image_link'];?>" alt="" class="img-fluid wc-image">
            </div>

            <br>


            <br>
          </div>

          <div class="col-md-5">
            <div class="sidebar-item recent-posts">
              <div class="sidebar-heading">
                <h4><?php echo $row['Name'];?></h4>
              </div>

              <div class="content">
                <p><?php echo $row['short_description'];?></p>
              </div>
            </div>
            <br>
            <br>
          
            <h4>Thêm vào giỏ hàng</h4>

            <br>

            <form action="" method="post">

              <div class="row">
                <div class="col-md-6 col-sm-12">
                  <div class="form-group">
                    <label for=""></label>
                    <input type="number" id="quantity" name="quantity" min="1" max="5" class="form-control">
                  </div>
                </div>
                <div class="col-lg-12">
                  <div class="form-group">
                    <a href="#"class="filled-button">Thêm vào giỏ hàng</a>
                  </div>
                </div>
              </div>
            </form>

            <br>
            
          </div>
          
        </div>
        
        <br>

        <h4>Description</h4>
        <li><?php echo $row['Content'];?></li>
        <br>
        <br>
        <br>
      </div>
    </div>

    <!-- Footer Starts Here -->
    <footer>
      <div class="container">
        <div class="row">
          <div class="col-md-3 footer-item">
            <h4>Laptop Store</h4>
            <p></p>
            <ul class="social-icons">
              <li><a rel="nofollow" href="#" target="_blank"><i class="fa fa-facebook"></i></a></li>
              <li><a href="#"><i class="fa fa-twitter"></i></a></li>
              <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
            </ul>
          </div>
          <div class="col-md-3 footer-item">
            <h4>Useful Links</h4>
            <ul class="menu-list">
              <li><a href="#"></a></li>
              <li><a href="#"></a></li>
              <li><a href="#"></a></li>
              <li><a href="#"></a></li>
              <li><a href="#"></a></li>
            </ul>
          </div>
          <div class="col-md-3 footer-item">
            <h4>Additional Pages</h4>
            <ul class="menu-list">
              <li><a href="#">Products</a></li>
              <li><a href="#">About Us</a></li>
              <li><a href="#">Blog</a></li>
              <li><a href="#">Contact Us</a></li>
              <li><a href="#">Terms</a></li>
            </ul>
          </div>
          <div class="col-md-3 footer-item last-item">
            <h4>Contact Us</h4>
            <div class="contact-form">
              <form id="contact footer-contact" action="" method="post">
                <div class="row">
                  <div class="col-lg-12 col-md-12 col-sm-12">
                    <fieldset>
                      <input name="name" type="text" class="form-control" id="name" placeholder="Full Name" required="">
                    </fieldset>
                  </div>
                  <div class="col-lg-12 col-md-12 col-sm-12">
                    <fieldset>
                      <input name="email" type="text" class="form-control" id="email" pattern="[^ @]*@[^ @]*" placeholder="E-Mail Address" required="">
                    </fieldset>
                  </div>
                  <div class="col-lg-12">
                    <fieldset>
                      <textarea name="message" rows="6" class="form-control" id="message" placeholder="Your Message" required=""></textarea>
                    </fieldset>
                  </div>
                  <div class="col-lg-12">
                    <fieldset>
                      <button type="submit" id="form-submit" class="filled-button">Send Message</button>
                    </fieldset>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </footer>
    
    <div class="sub-footer">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <p>
                Copyright © 2020 Company Name
                - Template by: <a href="https://www.phpjabbers.com/"></a>
            </p>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Additional Scripts -->
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/owl.js"></script>
    <script src="assets/js/slick.js"></script>
    <script src="assets/js/accordions.js"></script>

    <script language = "text/Javascript"> 
      cleared[0] = cleared[1] = cleared[2] = 0; //set a cleared flag for each field
      function clearField(t){                   //declaring the array outside of the
      if(! cleared[t.id]){                      // function makes it static and global
          cleared[t.id] = 1;  // you could use true and false, but that's more typing
          t.value='';         // with more chance of typos
          t.style.color='#fff';
          }
      }
    </script>

  </body>
</html>