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
                <a class="navbar-brand" href="index.php">Home</a>
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
                    		KhanhDV
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
            </div>
        </div>
        <!-- end slide -->
        <div class="space20"></div>
        <div class="row main-left">
            <div class="col-md-9">
                  <div class="container">
                  <div class="row">
                  <div class="col-md-4"></div>
                  <div class="col-md-4" style="margin-top: 100px;">
                      <form method="POST" action="register.php">
                          <div class="form-group">
                              <label>Mã đơn hàng</label>
                              <input type="text" class="form-control" name="txtMadonhang" autofocus value="<?php echo !empty($_POST['txtMadonhang']) ? $_POST['txtMadonhang'] : ''; ?>" required>
                          </div>
                          <div class="form-group">
                            <input class="btn btn-primary" type="submit" name="submit" value="Tìm kiếm">
                          </div>
                      </form>
                      </div>
                      <div class="col-md-4"></div>
                  </div>
              </div>
					</div>
	            </div>
        	</div>
        </div>
    </div>
    <hr>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<!-- <script type="text/javascript" src="js/jquery.min.js"></script> -->
