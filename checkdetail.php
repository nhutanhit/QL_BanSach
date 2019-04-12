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
                          <form method="POST" action="#" >
                              <div class="form-group" >
                                <label>Mã đơn hàng</label>
                                  <input type="text" class="form-control" name="search" autofocus value="<?php echo !empty($_POST['search']) ? $_POST['search'] : ''; ?>" required>
                              </div>
                              <div class="form-group" style="float:right">
                                  <input class="btn btn-primary" type="submit" name='searchBtn'  value="search" required>
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
                                <th>STT</th>
                                <th>Tên sản phẩm</th>
                                <th>Hình ảnh</th>
                                <th>Số lượng</th>
                                <th>Thành tiền</th>
                            </tr>
                                <?php
                                require_once('config/db.class.php');
                                  $SumQuantity = 0;
                                $SumPrice = 0;
                                if(isset($_POST['searchBtn'])){
                                $db = new Db();
                                $sql = "SELECT orderproduct.Status, product.ProductName,
                                product.ProductID,product.Quantity as QuantitySP,product.Price, product.Picture,
                                orderdetail.OrderID,orderdetail.Quantity FROM orderproduct,
                                orderdetail, product where orderproduct.OrderID = orderdetail.OrderID and
                                product.ProductID =orderdetail.ProductID and orderproduct.OrderID = ".$_POST['search'];
                                $result = $db->select_to_array($sql);
                              
                                $i=1;
                                  foreach($result as $item){
                                  $id = $item["OrderID"];
                                  $SumQuantity += $item["Quantity"];
                                  $SumPrice += $item["Price"]*$item["Quantity"];
                                  $Status = $item["Status"];
                                    echo "
                                      <tr>
                                        <td>".$i++."</td>
                                        <td>".$item["ProductName"]."</td>
                                        <td><img width='200px' height='200px' class='img-responsive'
                                        src='uploads/".$item["Picture"]."'></td>
                                        <td>".$item["Quantity"]."</td>
                                        <td> ".number_format($item["Price"]*$item["Quantity"], 0, '', ',') ."</td>";
                                      $i++;
                                      }
                                    }
                                ?>
                        </table>
                        <table id="t01" border="1" style="width:80%">
                        <tr>
                          <th>Tồng Số lượng: </th>
                          <th> <?php echo"$SumQuantity";?></th>
                          <th>Tổng tiền: </th>
                          <th><?php echo number_format($SumPrice, 0, '', ',');?> VNĐ</td>
                          <th>Trạng thái: </th>
                           <th>
                            <?php
                              if($Status == 0 ){
                                echo "<td style='color: #28a745; '>Chờ xử lý</td>  ";
                              }else  if($Status == 1 ){
                                echo "<td style='color: #ffc107; '>Đã duyệt</td>  ";
                              }else  if($Status== 2 ){
                                echo "<td style='color: red; '>Không duyệt</td>  ";
                              }
                            ?>
                          </th>  
                        </tr>
                        </table>
                      </div>
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
