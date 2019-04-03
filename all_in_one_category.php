<?php 
    require_once("Entities/category.class.php");

    if(isset($_POST["submit"])){
        
        
        $CategoryName = $_POST["txtName"];
        $CateID = $_POST["txtCateID"];
        $Description = $_POST["txtdesc"];

        $newCategory = new Category($CategoryName, $Description);
        
        $result = $newCategory->save();
        if($result){
            header("Location: all_in_one_category.php?inserted");
        }else{
            header("Location: all_in_one_category.php?failure");
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
    if(isset($_GET['edit'])){
    $id = isset($_GET['CateID']) ? (int)$_GET['CateID'] : '';
    $datas = Category::get_category($id);
    foreach($datas as $data){
    ?>
    <div class="container">
        <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <form method="post"  enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Tên sản phẩm</label>
                        <input type="text" class="form-control" name="txtName" value="<?php echo isset($data['CategoryName']) ? $data['CategoryName'] : '' ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Mô tả sản phẩm</label>
                        <textarea name="txtdesc" class="form-control" required><?php echo isset($data['Description']) ? $data['Description'] : '' ?></textarea>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" name="btnsubmit" value="Sửa sản phẩm">
                    </div>
            </form> 
        <a class="btn btn-primary ml-2" href="all_in_one_category.php">Back</a>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>
     <?php      
    }}else {?>
    <div class="container">
    <div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4">
        <form method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Tên sản phẩm</label>
                    <input type="text" class="form-control" name="txtName" value="<?php echo isset($_POST['txtName']) ? $_POST['txtName'] : ''; ?>" required>
                </div>
                <div class="form-group">
                    <label>Mô tả sản phẩm</label>
                    <textarea name="txtdesc" class="form-control" required><?php echo isset($_POST['txtdesc']) ? $_POST['txtdesc'] : '' ?></textarea>
                </div>
                <div class="form-group">
                    <input class="btn btn-primary" type="submit" name="submit" value="Thêm sản phẩm">
                </div>
        </form>
        
        <a class="btn btn-primary ml-2" href="all_in_one_category.php">Back</a>
        </div>
        <div class="col-md-4"></div>
    </div>
</div>
    <?php 
    }
     ?>
<?php 
    require_once("Entities/category.class.php");
?>

<?php 
	$cates = Category::list_category();
	require_once('config/db.class.php');
?>
<table class="table table-bordered mt-3"> 
	<thead class="thead-dark">
 		<tr>
 			<th>CateID</th>
		    <th>CategoryName</th>
		    <th>Description</th>
			<th>Sửa</th>
			<th>Xóa</th>
		</tr>
	</thead>
<?php
    foreach($cates as $item){
		$id = $item["CateID"];
			echo "
			<tr>
				<td>".$item["CateID"]."</td>
				<td>".$item["CategoryName"]."</td>";
			echo "	<td>".$item["Description"]."</td>
				<td><a class='btn btn-warning' href='all_in_one_category.php?edit=true&CateID=".$item["CateID"]."'>Sửa</a></td>
				<td><a class='btn btn-danger' href='all_in_one_category.php?delete=true&CateID=".$item["CateID"]."'>Xóa</a></td>
			</tr>";
		
    }
?>
</table>
<?php
if(isset($_GET['delete'])){
require_once("Entities/category.class.php");

$cates = Category::get_category($_GET['CateID']);
    foreach($cates as $cate){
            $CategoryName = $cate['CategoryName'];
            $Description = $cate['Description'];
            $newCategory = new Category($CategoryName,  $Description);

            $result = $newCategory->delete($cate['CateID']);
            if(!$result){
                echo "<script>window.location.href = 'all_in_one_category.php?failure'; </script>";
            }else{
                echo "<script>window.location.href = 'all_in_one_category.php?deleted'; </script>";
            }
    }
    
}
if (isset($_POST['btnsubmit']))
if(isset($_GET['edit']))
{
    
        $CategoryName = $_POST["txtName"];
        $Description = $_POST["txtdesc"];
            $newCategory = new Category($CategoryName, $Description);
            $result = $newCategory->update($_GET['CateID']);

            if($result ){
                
                echo "<script>window.location.href = 'all_in_one_category.php?updated'; </script>";
            }else{
                echo "<script>window.location.href = 'all_in_one_category.php?failure'; </script>";
            }

            
    } else {
}
?>
<?php include_once("footer.php"); ?>