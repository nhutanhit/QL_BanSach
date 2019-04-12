<?php session_start(); ?>
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
          <th>Số lượng</th>
          <th>Cập nhật</th>
    			<th>Xóa</th>
  		</tr>
    </thead>
    <?php  
    
      require 'Entities/product.class.php';
      require_once('config/db.class.php');
		    $db2 = new Db();
		    $sql2 = "Select * from category";
		    $result1 = $db2->select_to_array($sql2);
      if(isset($_SESSION['products'])) {
        $sl = 0;
        $totalPrice = 0;
        foreach($_SESSION['products'] as $item){ 
      $datas = Product::get_product($item['id']);
      foreach($datas as $data){
      
      ?>
      <tr>
   			  <th><?php echo $data['ProductID'] ?></th>
          <th><?php echo $data['ProductName'] ?></th>
          <?php foreach ($result1 as $value) { 
              if($value['CateID'] == $data['CateID']){?>
            <th><?php echo $value['CategoryName'] ?></th>
          <?php }} ?>
  		    <th id="price"><?php echo $data['Price'] ?></th>
          <td><img src='uploads/<?php echo $data["Picture"]?>' style='width:100px;height:100px'/></td>
          <th><?php echo $item['quantity'] ?></th>
          <td><a class='btn btn-warning' onclick="document.getElementById('quantity').value*" href="#">Cập nhật</a></td>
    			<td><a onclick='myFunction(".$item["ProductID"].");' class='btn btn-danger' >Xóa</a></td>
      </tr>
    <?php 
          $sl += $item['quantity'];
          $totalPrice += $data['Price']*$item['quantity']; }}} ?>
  </table>

  <table id="t01" border="1" style="width:25%">
  <tr>
    <th>Số lượng: </th>
    <th><?php echo $sl?></th>
      <th>Tổng tiền: </th>
      <th><?php echo $totalPrice?></th>
  </tr>
</table>
</div>
<!-- <script>
function totalByProcd(){
  quantity = document.getElementById('quantity').value;
  price = document.getElementById('price').innerText;
  document.getElementById("tt").innerText = quantity*price;
}
</script> -->
<div class="row" style="margin-top: 30px"></div>
<form action="#" method="post">
  <input type="hidden" name="sl" value="<?php echo $sl?>">
  <input type="hidden" name="totoalPrice" value="<?php echo $totalPrice?>">
  <input type="submit" class="btn btn-primary" name="thanhtoan" value="Thanh Toán">
</form>
<a class="btn btn-primary ml-2" href="index.php">Quay lại</a>
</div>
<?php 
  require 'Entities/orderproduct.class.php';
  require_once('config/db.class.php');
  if(isset($_POST['thanhtoan']) && $_SESSION["logged"] == 'user'){
    $db  = new Db();
    $sql3 = "insert into orderproduct (OrderDate, ShipDate, ShipAddress, Status, UserID) values ('".date("Y-m-d h:i:sa")."','".date("Y-m-d h:i:sa")."','".$_SESSION['Address']."',1,".$_SESSION['userid'].")";
    $result1 = $db3->query_execute($sql3);
    foreach($_SESSION['products'] as $item){ 
    $db4 = new Db();
     $sql4 = "INSERT INTO orderdetail (OrderID, ProductID, Quantity) VALUES (".$db3->connect()->insert_id.",".$item['id'].",".$item['quantity'].")";
     $result2 = $db4->query_execute($sql4);
    }
  }
?>
</center>
</div>
