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

    <title>Laravel Khoa Pham</title>

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
		 
		require 'Entities/product.class.php';
		 
		// Lấy thông tin hiển thị lên để người dùng sửa
		require_once('config/db.class.php');
		    $db2 = new Db();
		    $sql2 = "Select * from category";
		    $result1 = $db2->select_to_array($sql2);

		$id = isset($_GET['ProductID']) ? (int)$_GET['ProductID'] : '';
		if ($id){
		    $datas = Product::get_product($_GET['ProductID']);
		    foreach($datas as $data){
		        $image = $data['Picture'];
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
                        <a href="/ThucHanhPHP/LAB3/login.php">Đăng nhập</a>
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
    	 
        <div class="space20"></div> 

        <div class="row main-left">
            <div class="col-md-3 ">
             <ul class="list-group" id="menu"> 
                    <li href="#" class="list-group-item menu1 active">
                        Loại truyện tranh
                    </li> 
                     <?php
                         foreach ($result1 as $value) {
                            echo "<li href='#' class='list-group-item menu1 '>" .$value["CategoryName"]. "</li>"; 
                        }
                    ?>
                    
                </ul>
            </div>

            <div class="col-md-9">
	            <div class="panel panel-default">            
	            	<div class="panel-heading" style="background-color:#337AB7; color:white;" >
	            		<h2 style="margin-top:0px; margin-bottom:0px;">Chi tiết sản phẩm</h2>
	            	</div>

	            	<div class="panel-body">
                        <?php 
                            foreach($datas as $item){ 
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
                                        <h3>".$item["Price"]."VNĐ</h3>
                                        <a class='btn btn-primary' href=''>Mua hàng<span class='glyphicon glyphicon-chevron-right'></span></a>
                                    </div>
                                    <div class='break'></div>
                                </div>";
                            }
                        ?>
                        
		               <div style="float: right;">
                            <a href="index.php" >>>Back go to home</a>      
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
    
  <?php      
}
}
 
