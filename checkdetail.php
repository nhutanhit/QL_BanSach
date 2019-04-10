<!-- <?php include_once("header.php"); ?>
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
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/shop-homepage.css" rel="stylesheet">
    <link href="css/my.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
<script type="text/javascript" src="js/noel.js"></script>
</head>
<body>
<?php
     require_once("entities/product.class.php");
     require_once("entities/slide.class.php");
?>
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Home</a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="/ThucHanhPHP/QL_BanSach/add_product.php">Thêm mới sách</a>
                    </li>
                    <li>
                        <a href="#">Liên hệ</a>
                    </li>
                </ul>
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
                    		KhanhDV
                    	</a>
                    </li>
                    <li>
                    	<a href="#">Đăng xuất</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
    	<div class="row carousel-holder">
                <div class="row main-left">
                    <div class="col-md-4"></div>
                      <div class="col-md-4" style="margin-top: 100px;">
                          <form method="get" action="checkdetail.php" >
                              <div class="form-group" >
                                <label>Mã đơn hàng</label>
                                  <input type="text" class="form-control" name="txtMadonhang" autofocus value="<?php echo !empty($_POST['txtMadonhang']) ? $_POST['txtMadonhang'] : ''; ?>" required>
                              </div>
                              <div class="form-group" style="float:right">
                                  <input class="btn btn-primary" type="submit" name="search1" value="Tìm kiếm" required>
                              </div>
                          </form>
                      </div>
                      <div class="col-md-4"></div>
                  <div class="col-md-12">
                  <center>
                      <h1>Thông tin đơn hàng</h1>
                      <div class="row">
                        <table class="table table-bordered sm-3" style="width:100%">
                            <tr>
                                <th>Product ID</th>
                                <th>Product Name</th>
                                <th>Product Type</th>
                                <th>Price</th>
                                <th>Picture</th>
                            </tr>

                            <?php
                              if (isset($_REQUEST['search1'])){
                                $search = addslashes($_GET['search']);
                                $query = "select * from orderdetail where OrderID like '%$search%'";
                                mysql_connect("localhost", "root", "ecommerce", "orderdetail");
                                $sql = mysql_query($query);
                                $num = mysql_num_rows($sql);
                                if ($num > 0 && $search != "")
                                {
                                      echo "
                            			       <tr style='background-color: #1ec908'>
                            				        <td>".$orderdetail["OrderID"]."</td>
                                            <td>".$orderdetail["ProductID"]."</td>
                                            <td>".$orderdetail["Quantity"]."</td>
                                          </tr>";
                                }
                                }
                            ?>

                            <tr>
                              <th>001</th>
                                <th>Đắc nhân tâm</th>
                                <th>Sách</th>
                                <th>99000đ</th>
                                <td><img src='uploads/".$item["Picture"]."' style='width:100px;height:100px'/></td>
                            </tr>
                        </table>
                        <table id="t01" border="1" style="width:25%">
                        <tr>
                          <th>Số lượng: </th>
                          <th>?? </th>
                            <th>Tổng tiền: </th>
                            <th>??</th>
                        </tr>
                      </table>
                      </div>
                      <div class="row" style="margin-top: 30px"></div>
                      <a class="btn btn-primary ml-2" href="#">Thanh toán</a>
                      <a class="btn btn-primary ml-2" href="index.php">Quay lại</a>
                  </center>
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
