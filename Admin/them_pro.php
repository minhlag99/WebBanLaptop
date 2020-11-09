
<!DOCTYPE html>
<html lang="en">
<?php
    include "server.php";
                                
    $query="SELECT * FROM catalog ";
    $data1 =mysqli_query($conn,$query);
    if(isset($_POST['sbm'])){
        $name_pro=$_POST['name'];
        $price_pro=$_POST['price'];
        $image_pro=$_POST['image'];
        $content=$_POST['content'];
        $catalog=$_POST['id_catalog'];
        $sql="INSERT INTO product( Catalog_ID, Name, Price, Image_link ,Content) VALUES('$catalog','$name_pro','$price_pro','$image_pro','$content')";
        $data2 =mysqli_query($conn,$sql);
        header('location:Table.php');

    }
   
    ?>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Register</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">

                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Thêm Sản Phẩm</h1>
                            </div>
                            <form method ="POST" class="user">
                                <div class="form-group row" >
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" name="name" placeholder=" Name">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user" name="price" placeholder=" Price">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" name="image" placeholder="Image Link">
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" name="content" placeholder="Content">
                                    </div>
                                   
                                </div>
                               
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label for="">Category Product</label>
                                        <select name="id_catalog">
                                            <?php
                                            while($row=mysqli_fetch_assoc($data1))
                                            {?>
                                            <option value="<?php echo $row['ID']?>"><?php echo $row['Name']?></option>
                                            <?php
                                        }?>
                                        </select>
                                    </div>
                                   
                                </div>
                               <button name="sbm" type="submit" class="btn btn-primary btn-user btn-block">ADD</button>
                </a>
                               
                            </form>
                            <hr>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>