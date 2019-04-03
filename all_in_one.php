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
    <a class="navbar-brand mr-1" href="index.php">Admin</a>
    <!-- Navbar Search -->
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
  </nav>
<script type="text/javascript" src="js/noel.js"></script>
  <div id="wrapper">
    <ul class="sidebar navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="all_in_one.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Quản lý sản phẩm</span>
          </a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="all_in_one_category.php">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Quản lý thương hiệu</span></a>
        </li>
      </ul>


<?php
    require_once("Entities/product.class.php");

    if(isset($_POST["submit"])){

        $uploaddir1 = 'uploads/';
        $uploadfile1 = $uploaddir1.basename($_FILES['fpic']['name']);
        $productName = $_POST["txtName"];
        $cateID = $_POST["txtCateID"];
        $price = $_POST["txtprice"];
        $quantity = $_POST["txtquantity"];
        $description = $_POST["txtdesc"];
        $picture =  basename($_FILES['fpic']['name']);

        $newProduct = new Product($productName, $cateID, $price, $quantity, $description, $picture);

        $result = $newProduct->save();
        if($result && move_uploaded_file($_FILES["fpic"]["tmp_name"], $uploadfile1)){
            header("Location: all_in_one.php?inserted");
        }else{
            header("Location: all_in_one.php?failure");
        }} else {

        }

?>

<?php include_once("header.php"); ?>

<?php
    if(isset($_GET["inserted"])){
        echo "<script>alert('Thêm sản phẩm thành công')</script>";
    }
    if(isset($_GET["deleted"])){
        echo "<script>alert('Xóa sản phẩm thành công')</script>";
    }
    if(isset($_GET["updated"])){
        echo "<script>alert('Cập nhật sản phẩm thành công')</script>";
    }
?>


<?php
    require_once('config/db.class.php');
    $db2 = new Db();
    $sql2 = "Select * from category";
    $result1 = $db2->select_to_array($sql2);
    if(isset($_GET['edit'])){
    $id = isset($_GET['ProductID']) ? (int)$_GET['ProductID'] : '';
    $datas = Product::get_product($id);
    foreach($datas as $data){
            $image = $data['Picture'];
    ?>
    <div class="container">
      <div class="col-md-2"></div>
        <div class="row">
        <div class="col-md-8"><center>
            <form method="post"  enctype="multipart/form-data">
                    <div class="form-group">
                      <h1>Thông tin sản phẩm</h1>
                        <label>Tên sản phẩm</label>
                        <input type="text" class="form-control" name="txtName" value="<?php echo isset($data['ProductName']) ? $data['ProductName'] : '' ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Mô tả sản phẩm</label>
                        <textarea name="txtdesc" class="form-control" required><?php echo isset($data['Description']) ? $data['Description'] : '' ?></textarea>
                    </div>
                    <div class="form-group">
                        <label>Số lượng sản phẩm</label>
                        <input type="text" class="form-control" name="txtquantity" value="<?php echo isset($data['Quantity']) ? $data['Quantity'] : '' ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Giá bán</label>
                        <input type="text" class="form-control" name="txtprice" value="<?php echo isset($data['Price']) ? $data['Price'] : '' ?>"required>
                    </div>
                    <div class="form-group">
                        <label>Chọn loại sản phẩm</label>
                        <select name="txtCateID" class="form-control">
                        <?php
                        foreach($result1 as $item){
                            if($data['CateID'] == $item["CateID"]){
                                echo '<option value="'.$item["CateID"].'" selected>'.$item["CategoryName"].'</option>';
                            }else {
                                echo '<option value="'.$item["CateID"].'">'.$item["CategoryName"].'</option>';
                            }
                            }
                        ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Đường dẫn hình</label>
                        <input type="file" name="fpic" id="fpic" class="form-control">
                        <img class="round img-thumbnail"  src="uploads/<?php echo $data['Picture']?>" style="width:100px; height:100px"/>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" name="btnsubmit" value="Sửa sản phẩm">
                    </div>
            </form></center>
        <a class="btn btn-primary ml-2" href="all_in_one.php">Back</a>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>
     <?php
    }}else {?>
    <div class="container">
    <div class="row">
    <div class="col-md-8"><center>
        <form method="post" enctype="multipart/form-data">
                <div class="form-group">
                  <h1>Thông tin sản phẩm</h1>
                    <label>Tên sản phẩm</label>
                    <input type="text" class="form-control" name="txtName" value="<?php echo isset($_POST['txtName']) ? $_POST['txtName'] : '' ?>" required>
                </div>
                <div class="form-group">
                    <label>Mô tả sản phẩm</label>
                    <textarea name="txtdesc" class="form-control" required><?php echo isset($_POST['txtdesc']) ? $_POST['txtdesc'] : '' ?></textarea>
                </div>
                <div class="form-group">
                    <label>Số lượng sản phẩm</label>
                    <input type="text" name="txtquantity" class="form-control" value="<?php echo isset($_POST['txtquantity']) ? $_POST['txtquantity'] : '' ?>" required>
                </div>
                <div class="form-group">
                    <label>Giá bán</label>
                    <input type="text" name="txtprice" class="form-control" value="<?php echo isset($_POST['txtprice']) ? $_POST['txtprice'] : '' ?>" required>
                </div>
                <div class="form-group">
                    <label>Chọn loại sản phẩm</label>
                    <select name="txtCateID" class="form-control">
                    <?php
                        foreach($result1 as $item){
                        echo '<option value="'.$item["CateID"].'">'.$item["CategoryName"].'</option>';
                        }
                    ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Đường dẫn hình</label>
                    <input type="file" name="fpic" id="fpic" class="form-control">
                </div>
                <div class="form-group">
                    <input class="btn btn-primary" type="submit" name="submit" value="Thêm sản phẩm">
                </div>
        </form></center>

        <a class="btn btn-primary ml-2" href="all_in_one.php">Back</a>
        </div>
        <div class="col-md-12"></div>
    </div>
</div>
    <?php
    }
     ?>
<?php
    require_once("Entities/product.class.php");
?>

<?php
	$prods = Product::list_product();
	require_once('config/db.class.php');
    $db2 = new Db();
    $sql2 = "Select * from category";
    $result1 = $db2->select_to_array($sql2);
?>
<div class="col-sm-12">
  <?php
      if(isset($_GET["inserted"])){
          echo "<h2 class='text-success text-center' >Thêm sản phẩm thành công</h2>";
      }
      if(isset($_GET["deleted"])){
          echo "<h2 class='text-success text-center'>Xóa sản phẩm thành công</h2>";
      }
      if(isset($_GET["updated"])){
          echo "<h2 class='text-success text-center'>Cập nhật sản phẩm thành công</h2>";
      }
  ?>
</div>
<div class="col-sm-1" > </div>
<div class="col-sm-10">
  <table class="table table-bordered mt-3">
  	<thead class="thead-dark">
   		<tr>
   			<th>Product ID</th>
  		    <th>Product Name</th>
  		    <th>Product Type</th>
  		    <th>Description</th>
  		    <th>Price</th>
  		    <th>Picture</th>
  			<th>Sửa</th>
  			<th>Xóa</th>
  		</tr>
  	</thead>
    <?php
        foreach($prods as $item){
    		$id = $item["ProductID"];
    			echo "
    			<tr>
    				<td>".$item["ProductID"]."</td>
    				<td>".$item["ProductName"]."</td>";
    			foreach ($result1 as $value) {
    				if($value['CateID'] == $item['CateID'])
    					echo "<td>".$value["CategoryName"]."</td>";
    			}


    			echo "	<td>".$item["Description"]."</td>
    				<td>".number_format($item["Price"])."</td>
    				<td><img src='uploads/".$item["Picture"]."' style='width:100px;height:100px'/></td>
    				<td><a class='btn btn-warning' href='all_in_one.php?edit=true&ProductID=".$item["ProductID"]."'>Sửa</a></td>
    				<td><a class='btn btn-danger' href='all_in_one.php?delete=true&ProductID=".$item["ProductID"]."'>Xóa</a></td>
    			</tr>";

        }
    ?>
    </table>
</div>
<div class="col-sm-1" > </div>


<script>
function deletePost() {
    var ask = window.confirm("Are you sure you want to delete this post?");
    if (ask) {
        window.location.href = "delete_product.php?ProductID=".$id;
    } else {

	}
}
</script>
<?php
if(isset($_GET['delete'])){
require_once("Entities/product.class.php");

$prods = Product::get_product($_GET['ProductID']);
    foreach($prods as $prod){
            $productName = $prod['ProductName'];
            $cateID = $prod['CateID'];
            $price = $prod['Price'];
            $quantity = $prod['Quantity'];
            $description = $prod['Description'];
            $picture = $prod['Picture'];
            $newProduct = new Product($productName, $cateID, $price, $quantity, $description, $picture);

            $result = $newProduct->delete($prod['ProductID']);
            if(!$result){
                echo "<script>window.location.href = 'all_in_one.php?failure'; </script>";
            }else{
                echo "<script>window.location.href = 'all_in_one.php?deleted'; </script>";
            }
    }

}
if (isset($_POST['btnsubmit']))
if(isset($_GET['edit']))
{

        $uploaddir1 = 'uploads/';
        $uploadfile1 = $uploaddir1.basename($_FILES['fpic']['name']);
        $productName = $_POST["txtName"];
        $cateID = $_POST["txtCateID"];
        $price = $_POST["txtprice"];
        $quantity = $_POST["txtquantity"];
        $description = $_POST["txtdesc"];
        if(basename($_FILES['fpic']['name']) != ""){
            $picture = basename($_FILES['fpic']['name']) ;
            $newProduct = new Product($productName, $cateID, $price, $quantity, $description, $picture);

            $result = $newProduct->update($_GET['ProductID']);

            if($result && move_uploaded_file($_FILES["fpic"]["tmp_name"], $uploadfile1)){

                echo "<script>window.location.href = 'all_in_one.php?updated'; </script>";
            }else{
                echo "<script>window.location.href = 'all_in_one.php?failure'; </script>";
            }
        }else{
            $picture = $image;
            $newProduct = new Product($productName, $cateID, $price, $quantity, $description, $picture);

            $result = $newProduct->update($_GET['ProductID']);

            if($result){

                echo "<script>window.location.href = 'all_in_one.php?updated'; </script>";
            }else{
                echo "<script>window.location.href = 'all_in_one.php?failure'; </script>";
            }
        }
    } else {


}
?>
<?php include_once("footer.php"); ?>
