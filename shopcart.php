<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="vendor/chart.js/Chart.min.js"></script>
<script src="vendor/datatables/jquery.dataTables.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.js"></script>
<script src="js/sb-admin.min.js"></script>
<script src="js/demo/datatables-demo.js"></script>
<script src="js/demo/chart-area-demo.js"></script>
<nav class="navbar navbar-expand navbar-dark bg-dark static-top">
<div class="col-md-6">
<a class="navbar-brand mr-1" href="index.php">Home</a>
<a class="navbar-brand mr-1" href="shopcart.php">Giỏ hàng</a>
</div>
<!-- Navbar Search -->
<script type="text/javascript" src="js/noel.js"></script>
<form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
  <div class="input-group">
    <input type="text" class="form-control" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
    <div class="input-group-append">
      <button class="btn btn-primary" type="button">
        <i class="fas fa-search"></i>
      </button>
    </div>
  </div>
</form>
</nav

<?php include_once("header.php") ?><br>

<div class="col-md-12" style="margin-top: 100px">
<center><div class="col-sm-8">
<h1>Giỏ hàng</h1>
<div class="row">
  <table class="table table-bordered sm-3" style="width:100%" >
  	<thead class="thead-dark">
   		<tr>
   			<th>Product ID</th>
  		    <th>Product Name</th>
  		    <th>Product Type</th>
  		    <th>Price</th>
  		    <th>Picture</th>
          <th>Cập nhật</th>
    			<th>Xóa</th>
  		</tr>
    </thead>
      <tr>
   			<th>1</th>
  		    <th>Mập</th>
  		    <th>Địt</th>
  		    <th>1đ</th>
  		    <td><img src='uploads/".$item["Picture"]."' style='width:100px;height:100px'/></td>
          <td><a class='btn btn-warning' href="#">Cập nhật</a></td>
    			<td><a onclick='myFunction(".$item["ProductID"].");' class='btn btn-danger' >Xóa</a></td>
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
</div>
</center>
</div>
