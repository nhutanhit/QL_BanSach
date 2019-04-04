<!-- <!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <title>Project training - Website bán Sách</title>
</head>
<body>
 ss

</body>
</html> -->
<!--  -->
<!-- <?php include_once("header.php"); ?>
    <ul class="menu">
        <li>
            <a href="/ThucHanhPHP/LAB3/list_product.php">Danh sách sản phẩm</a>
        </li>
        <li>
            <a href="/ThucHanhPHP/LAB3/add_product.php">Thêm sản phẩm</a>
        </li>
    </ul>
<?php include_once("footer.php") ?> -->

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Bán sách</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/shop-homepage.css" rel="stylesheet">
    <link href="css/my.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
<?php
     require_once("entities/product.class.php");
     require_once("entities/slide.class.php");

     //sp
    $prods =  Product :: list_product();
    require_once('config/db.class.php');
    $db2 = new Db();

    // loại sp
    $sql2 = "Select * from category";
    $result1 = $db2->select_to_array($sql2);

    // slide
      $listSlide =  Slide :: listproduct();

?>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Home</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="/ThucHanhPHP/QL_BanSach/add_product.php">Thêm mới sách</a>
                    </li>
                    <li>
                        <a href="#">Liên hệ</a>
                    </li>
                </ul>

                <form class="navbar-form navbar-left" role="search">
			        <div class="form-group">
			          <input type="text" class="form-control" placeholder="Search">
			        </div>
			        <button type="submit" class="btn btn-default">Submit</button>
			    </form>

			    <ul class="nav navbar-nav pull-right">
                    <li>
                        <a href="#">Đăng ký</a>
                    </li>
                    <li>
                        <a href="login.php">Đăng nhập</a>
                    </li>
                    <li>
                    	<a>
                    		<span class ="glyphicon glyphicon-user"></span>
                    		Bùi Đức Phú
                    	</a>
                    </li>

                    <li>
                    	<a href="#">Đăng xuất</a>
                    </li>

                </ul>
            </div>



            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container">

    	<!-- slider -->
    	<div class="row carousel-holder">
            <div class="col-md-12">
               <!--  <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="item active">
                            <img class="slide-image" src="image/images.jpg" alt="">
                        </div>

                    </div>
                    <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                    </a>
                    <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right"></span>
                    </a>
                </div> -->
               
            </div>
        </div>
        <!-- end slide -->

        <div class="space20"></div>

        <div class="row main-left">



            <div class="col-md-9">
              <?php
                  require_once("Entities/user.class.php");
                  if(isset($_POST["submit"])){

                      $fullname = $_POST["txtName"];
                      $username = $_POST["txtUsername"];
                      $password = $_POST["txtPassword"];
                      $address = $_POST["txtAddress"];
                      $phone = $_POST["txtPhone"];
                      $role = "user";

                      $newUser = new User($fullname, $username, $password, $address, $phone, $role);

                      $result = $newUser->save();
                      if($result){
                          header("Location: register.php?inserted");
                      }else{
                          header("Location: register.php?failure");
                      }} else {

                      }

              ?>

              <?php
                  if(isset($_GET["inserted"])){
                      echo "<script>alert('Đăng ký thành công')</script>";
                      echo '<script>location.replace("ManagerUser.php");</script>';
                  }
              ?>
                  <div class="container">
                  <div class="row">
                  <div class="col-md-4"></div>
                  <div class="col-md-4">
                    <h2>Đăng Ký Tài khoản<h2>
                      <form method="POST" action="register.php">
                          <div class="form-group">
                              <label>Tên user</label>
                              <input type="text" class="form-control" name="txtName" value="<?php echo !empty($_POST['txtName']) ? $_POST['txtName'] : ''; ?>" required>
                          </div>
                          <div class="form-group">
                              <label>Tài khoản</label>
                              <input type="text" class="form-control" name="txtUsername" value="<?php echo !empty($_POST['txtUsername']) ? $_POST['txtUsername'] : ''; ?>" required>
                          </div>
                          <div class="form-group">
                              <label>Mật khẩu</label>
                              <input type="text" name="txtPassword" class="form-control" value="<?php echo !empty($_POST['txtPassword']) ? $_POST['txtPassword'] : '' ?>" required>
                          </div>
                          <div class="form-group">
                              <label>Địa chỉ</label>
                              <input type="text" name="txtAddress" class="form-control" value="<?php echo !empty($_POST['txtAddress']) ? $_POST['txtAddress'] : '' ?>" required>
                          </div>
                          <div class="form-group">
                              <label>SĐT</label>
                              <input type="text" name="txtPhone" class="form-control" value="<?php echo !empty($_POST['txtPhone']) ? $_POST['txtPhone'] : '' ?>" required>
                          </div>
                          <div class="form-group">
                              <input class="btn btn-primary" type="submit" name="submit" value="Đăng ký">
                          </div>
                      </form>

                      <a class="btn btn-primary ml-2" href="index.php">Back</a>
                      </div>
                      <div class="col-md-4"></div>
                  </div>
              </div>

					</div>
	            </div>
        	</div>
        </div>
        <!-- /.row -->
    </div>
    <!-- end Page Content -->

    <!-- Footer -->
    <hr>
    <!-- Footer -->
<footer class="page-footer font-small blue pt-4" style="text-align: center;     background: #222222; color: while">

    <!-- Footer Links -->
    <div class="container-fluid text-center text-md-center">

      <!-- Grid row -->
      <div class="row">

        <!-- Grid column -->
        <div class="col-md-6 mt-md-0 mt-3">

          <!-- Content -->
          <h5 class="text-uppercase">BÁN SÁCH</h5>
          <a href="">
          <p>Anh.Trần | Minh Mẫn | Anh Kiệt | An Khang | Vũ Khanh</p>
            </a>
        </div>
        <!-- Grid column -->

      </div>
      <!-- Grid row -->

    </div>
    <!-- Footer Links -->

    <!-- Copyright -->
    <div class="footer-copyright text-center py-3">© 2018 Copyright:
      <a href="https://mdbootstrap.com/education/bootstrap/"> admin.com</a>
    </div>
    <!-- Copyright -->

  </footer>
  <!-- Footer -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<!-- <script type="text/javascript" src="js/jquery.min.js"></script> -->
