<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <title>Project training - website bán hàng</title>
</head>
<body>
<?php 
    require_once("Entities/user.class.php");
    if(isset($_POST["submit"])){
        
        $fullname = $_POST["txtName"];
        $username = $_POST["txtUsername"];
        $password = $_POST["txtPassword"];
        $address = $_POST["txtAddress"];
        $phone = $_POST["txtPhone"];
        $role =  $_POST["txtRole"];

        $newUser = new User($fullname, $username, $password, $address, $phone, $role);
        
        $result = $newUser->save();
        if($result){
            header("Location: ManagerUser.php?inserted");
        }else{
            header("Location: ManagerUser.php?failure");
        }} else {

        }
    
?>


<?php 
    if(isset($_GET["inserted"])){
        echo "<script>alert('Thêm user thành công')</script>";
        echo '<script>location.replace("ManagerUser.php");</script>';
    }
    if(isset($_GET["deleted"])){
        echo "<script>alert('Xóa user thành công')</script>";
        echo '<script>location.replace("ManagerUser.php");</script>';
    }
    if(isset($_GET["updated"])){
        echo "<script>alert('Cập nhật user thành công')</script>";
        echo '<script>location.replace("ManagerUser.php");</script>';
    }
?>

<?php 
    require_once('config/db.class.php');
    if(isset($_GET['edit'])){
    $id = isset($_GET['UserID']) ? (int)$_GET['UserID'] : '';
    $datas = User::get_user($id);
    foreach($datas as $data){
    ?>
    <div class="container">
        <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <form method="post">
                    <div class="form-group">
                        <label>Tên user</label>
                        <input type="text" class="form-control" name="txtName" value="<?php echo isset($data['FullName']) ? $data['FullName'] : '' ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Tài khoản</label>
                        <input type="text" class="form-control" name="txtUsername" value="<?php echo isset($data['Username']) ? $data['Username'] : '' ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Mật khẩu</label>
                        <input type="text" class="form-control" name="txtPassword" value="<?php echo isset($data['Password']) ? $data['Password'] : '' ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Địa chỉ</label>
                        <input type="text" class="form-control" name="txtAddress" value="<?php echo isset($data['Address']) ? $data['Address'] : '' ?>"required>
                    </div>
                    <div class="form-group">
                        <label>SĐT</label>
                        <input type="text" class="form-control" name="txtPhone" value="<?php echo isset($data['Phone']) ? $data['Phone'] : '' ?>"required>
                    </div>
                    <div class="form-group">
                        <label>Quyền</label>
                        <input type="text" class="form-control" name="txtRole" value="<?php echo isset($data['Role']) ? $data['Role'] : '' ?>"required>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" name="btnsubmit" value="Sửa user">
                    </div>
            </form> 
        <a class="btn btn-primary ml-2" href="ManagerUser.php">Back</a>
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
        <form method="POST" action="ManagerUser.php">
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
                <label>Quyền</label>
                <input type="text" name="txtRole" class="form-control" value="<?php echo !empty($_POST['txtRole']) ? $_POST['txtRole'] : '' ?>" required>
            </div>
            <div class="form-group">
                <input class="btn btn-primary" type="submit" name="submit" value="Thêm User">
            </div>
        </form>
        
        <a class="btn btn-primary ml-2" href="ManagerUser.php">Back</a>
        </div>
        <div class="col-md-4"></div>
    </div>
</div>
    <?php 
    }
     ?>
<?php 
    require_once("Entities/user.class.php");
?>

<?php 
	$users = user::list_user();
	require_once('config/db.class.php');
?>
<table class="table table-bordered mt-3"> 
	<thead class="thead-dark">
 		<tr>
 			<th>Tên user</th>
		    <th>Tài khoản</th>
		    <th>Mật khẩu</th>
		    <th>Địa chỉ</th>
		    <th>SĐT</th>
		    <th>Quyền</th>
			<th>Sửa</th>
			<th>Xóa</th>
		</tr>
	</thead>
<?php
    foreach($users as $user){
		$id = $user["UserID"];
			echo "
			<tr>
				<td>".$user["UserID"]."</td>
                <td>".$user["Username"]."</td>
                <td>".$user["Password"]."</td>
				<td>".$user["Address"]."</td>
                <td>".$user["Phone"]."</td>
                <td>".$user["Role"]."</td>
                <td><a class='btn btn-warning' href='ManagerUser.php?edit=true&UserID=".$user["UserID"]."'>Sửa</a></td>
                <td><button class='btn btn-danger' onclick='myFunction(".$user["UserID"].")'>Xóa</button></td>
			</tr>";
    }
?>
</table>
<script>
    function myFunction(id) {
        var r = confirm("Bạn có muốn xóa!");
        if (r == true) {
            window.location.href = "ManagerUser.php?delete=true&UserID="+id;
        }
    }
</script>
<?php
if(isset($_GET['delete'])){
    require_once("Entities/user.class.php");

    $users = User::get_user($_GET['UserID']);

    $result = User::delete($_GET['UserID']);
    if(!$result){
        echo "<script>window.location.href = 'ManagerUser.php?failure'; </script>";
    }else{
        echo "<script>window.location.href = 'ManagerUser.php?deleted'; </script>";
    }
}
if (isset($_POST['btnsubmit']))
if(isset($_GET['edit']))
{
    $fullName = $_POST["txtName"];
    $username = $_POST["txtUsername"];
    $password = $_POST["txtPassword"];
    $address = $_POST["txtAddress"];
    $phone = $_POST["txtPhone"];
    $role = $_POST["txtRole"];
    $newUser = new User($fullName, $username, $password, $address, $phone, $role);

    $result = $newUser->update($_GET['UserID']);

    if($result){
        
        echo "<script>window.location.href = 'ManagerUser.php?updated'; </script>";
    }else{
        echo "<script>window.location.href = 'ManagerUser.php?failure'; </script>";
    }
}
?>
</body>
</html>