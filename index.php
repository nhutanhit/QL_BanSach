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
                        <a href="register.php">Đăng ký</a>
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
                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                  <!-- Indicators -->
                  <ol class="carousel-indicators">
                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#myCarousel" data-slide-to="1"></li>
                    <li data-target="#myCarousel" data-slide-to="2"></li>
                  </ol>

                  <!-- Wrapper for slides -->
                  <div class="carousel-inner">
                    <!-- <div class="item active ">
                      <img src="image/images.jpg" alt="Los Angeles">
                    </div>

                    <div class="item ">
                      <img src="image/images.jpg" alt="Chicago">
                    </div>

                    <div class="item">
                      <img src="image/images.jpg" alt="New York">
                    </div> -->
                    <?php

                         for($i=0; $i<count($listSlide); $i++){
                            if($i == 0){
                                echo " <div class='item active'>
                                <img style = 'width: 100%;' src='image/".$listSlide[$i]['slidename']."'> </div>";
                            }else{
                                echo " <div class='item'><img style = 'width: 100%;' src='image/".$listSlide[$i]['slidename']."'> </div>";
                            }
                         }
                    ?>
                  </div>

                  <!-- Left and right controls -->
                  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                    <span class="sr-only">Previous</span>
                  </a>
                  <a class="right carousel-control" href="#myCarousel" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right"></span>
                    <span class="sr-only">Next</span>
                  </a>
                </div>
            </div>
        </div>
        <!-- end slide -->

        <div class="space20"></div>

        <div class="row main-left">
            <div class="col-md-3 ">
                <ul class="list-group" id="menu">
                    <li href="#" class="list-group-item menu1 active">
                    	Loại truyện tranh
                    </li>
                     <?php
                         foreach ($result1 as $value) {
                            echo "<a href='productbycategory.php?CateID=".$value["CateID"]."'><li href='#' class='list-group-item menu1 '>" .$value["CategoryName"]. "</li>";
                        }
                    ?>

                </ul>
            </div>

            <div class="col-md-9">
	            <div class="panel panel-default">
	            	<div class="panel-heading" style="background-color:#337AB7; color:white;" >
	            		<h2 style="margin-top:0px; margin-bottom:0px;">Truyện mới nhất</h2>
	            	</div>

	            	<div class="panel-body">
                        <?php
                            foreach($prods as $item){
                                echo "<div class='row-item row'>
                                    <div class='col-md-3'>
                                        <a href='detail.html'>
                                            <br>
                                            <img width='200px' height='200px' class='img-responsive' src='uploads/".$item["Picture"]."'>
                                        </a>
                                    </div>
                                    <div class='col-md-9'>
                                        <h3>".$item["ProductName"]."</h3>";
                                        foreach ($result1 as $value) {
												if($value['CateID'] == $item['CateID'])
													echo "<h4> Thể loại:".$value["CategoryName"]."</h4>";
											}

                                     echo "  <p>Nội dung: ".$item["Description"]."</p>
                                        <h3>".number_format($item["Price"],0)." VNĐ</h3>
                                        <a class='btn btn-primary' href='productdetail.php?ProductID=".$item["ProductID"]."'>Xem chi tiết<span class='glyphicon glyphicon-chevron-right'></span></a>
                                    </div>

                                    <div class='break'></div>
                                </div>";
                            }
                        ?>


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
