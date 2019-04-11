 
<?php session_start()?>
<?php if($_SESSION["logged"] != 'admin' &&  $_SESSION["logged"] == 'user'){ ?>
         echo "<script>window.location.href = 'all_in_one.php'; </script>";
<?php } ?>
 
<script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>
    <script src="js/sb-admin.min.js"></script>
    <script src="js/demo/datatables-demo.js"></script>
    <script src="js/demo/chart-area-demo.js"></script>
      <style type="text/css">
        tr:hover {
        background-color: yellow;
    }
  </style>
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
          <a class="nav-link" href="ManagerUser.php">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Quản lý tài khoản</span></a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="all_in_one.php">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Quản lý truyện </span></a>
        </li>

         <li class="nav-item active">
          <a class="nav-link" href="all_in_one_category.php">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Quản lý thể loại truyện </span></a>
        </li>
         <li class="nav-item active">
         <a class="nav-link" href="ListDetail.php">
           <i class="fas fa-fw fa-chart-area"></i>
           <span>Quản lý đơn hàng </span></a>
       </li>
        <li class="nav-item active">
          <a class="nav-link" onclick="userlogout()" href="#">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Đăng xuất </span></a>
        </li>
      </ul>
      
 <script>
    function userlogout() {
        var r = confirm("Bạn có muốn thoát!");
        if (r == true) { 
            //unset($_SESSION['fullname']); 
            //window.location.href = "index.php";
             window.location.href = "Index.php?Logout=true";
        }
    }
</script>
    <?php
        // mở khóa 
        if(isset($_GET['Logout'])){
            require_once("Entities/user.class.php");  
            $UserID =  $_SESSION["userid"];
            $result = User::Logout($UserID);
            if(!$result){
                echo "<script>window.location.href = 'Login.php?'; </script>";
            }else{
                unset($_SESSION['fullname']); 
                echo "<script>window.location.href = 'Login.php?'; </script>";
            }
        }
    ?>
<?php include_once("header.php"); ?>

<?php
    if(isset($_GET["inserted"])){
        echo "<script>alert('Thêm user thành công')</script>";
        // echo '<script>location.replace("ManagerUser.php");</script>';
    }
    if(isset($_GET["deleted"])){
        echo "<script>alert('Xóa user thành công')</script>";
        // echo '<script>location.replace("ManagerUser.php");</script>';
    }
    if(isset($_GET["updated"])){
        echo "<script>alert('Cập nhật user thành công')</script>";
        // echo '<script>location.replace("ManagerUser.php");</script>';
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
            <h1>Quản lý User</h1>
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
                    <h1>Quản lý User</h1>
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

                <a class="btn btn-primary ml-2" href="ManagerUser.php">Add</a>
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
    rsort($users);
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
			<th> </th>
			<th> </th>
            <th>Trạng thái</th> 
            <th>Trạng thái đăng nhập</th>
            <th>Lượt truy cập</th>
		</tr>
	</thead>
<?php
    $i = 1;
     $luottruycap = 0 ; 
    foreach($users as $user){
        $id = $user["UserID"];
       
         $luottruycap+=$user["countlogin"];
        if($i == 1 && isset($_GET['inserted'])){
            
			echo "
			<tr style='background-color: #1ec908'>
				<td>".$user["FullName"]."</td>
                <td>".$user["Username"]."</td>
                <td>".$user["Password"]."</td>
				<td>".$user["Address"]."</td>
                <td>".$user["Phone"]."</td>
                <td>".$user["Role"]."</td> 
                ";
                if($user["Status"] !== 2 ){
                    echo "<td><a class='btn btn-warning' href='ManagerUser.php?edit=true&UserID=".$user["UserID"]."'>Sửa</a></td>
                          <td><button class='btn btn-danger' onclick='myFunction(".$user["UserID"].")'>Xóa</button></td>";
                }
                else if ($user["Status"] == 1 ){
                    $stat = 'đã duyệt'; 
                    echo "<td style='color: #155ab3;'>".$stat."</td>";
                }else if($user["Status"] == 2){
                     echo "<td><button class='btn btn-danger' onclick='mokhoa(".$user["UserID"].")'>Mở Khóa</button></td>";
                }
                    else{
                        echo "<td><button class='btn btn-danger' onclick='verify(".$user["UserID"].")'>Duyệt</button></td>";
                    }

                 if($user["loginstatus"] == 1){
                    echo "<td style='color: #155ab3;'>Đang truy cập</td>";
                 }else{
                     echo "<td style='color: #155ab3;'>Đang offline</td>";
                 }
                 echo "<td style='color: #155ab3;'>".$user["countlogin"]."</td>";
            echo "</tr>";
        } else {
            echo "
			<tr>
				<td>".$user["FullName"]."</td>
                <td>".$user["Username"]."</td>
                <td>".$user["Password"]."</td>
				<td>".$user["Address"]."</td>
                <td>".$user["Phone"]."</td>
                <td>".$user["Role"]."</td>
                 ";

                if($user["Status"] != 2 ){
                    echo "<td><a class='btn btn-warning' href='ManagerUser.php?edit=true&UserID=".$user["UserID"]."'>Sửa</a></td>
                          <td><button class='btn btn-danger' onclick='myFunction(".$user["UserID"].")'>Xóa</button></td>";
                }
                
                if ($user["Status"] == 1 ){
                     $stat = 'đã duyệt'; 
                      echo "<td style='color: #155ab3;'>".$stat."</td>";
                  }else if($user["Status"] == 2){
                     echo "<td><button class='btn btn-danger' onclick='mokhoa(".$user["UserID"].")'>Mở Khóa</button></td>";
                }
                    else{
                        echo "<td><button class='btn btn-danger' onclick='verify(".$user["UserID"].")'>Duyệt</button></td>";
                    }
                     if($user["loginstatus"] == 1){
                    echo "<td style='color: #155ab3;'>Đang truy cập</td>";
                 }else{
                     echo "<td style='color: #155ab3;'>Đang offline</td>";
                 }
                  echo "<td style='color: #155ab3;'>".$user["countlogin"]."</td>";
            echo "</tr>";
        }
        $i++;
    }
?>
<tr>
    <th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th> <th></th>   
    <th>Tổng lượt đã truy cập: <?php echo  $luottruycap?></th>
</tr>
</table>
<script>
    function myFunction(id) {
        var r = confirm("Bạn có muốn xóa!");
        if (r == true) {
            window.location.href = "ManagerUser.php?delete=true&UserID="+id;
        }
    }
    // Duyet
     function verify(id) {
        var r = confirm("Bạn có muốn duyệt tài khoản này!");
        if (r == true) {
            window.location.href = "ManagerUser.php?verify=true&UserID="+id;
        }
    }
    // mở khóa 
    function mokhoa(id){
        var r = confirm("Bạn có muốn mở khóa tài khoản này!");
        if (r == true) {
            window.location.href = "ManagerUser.php?mokhoa=true&UserID="+id;
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

// duyệt 
if(isset($_GET['verify'])){
    require_once("Entities/user.class.php");

    $users = User::get_user($_GET['UserID']); 
    $result = User::verify($_GET['UserID']);
    if(!$result){
        echo "<script>window.location.href = 'ManagerUser.php?verifyfailure'; </script>";
    }else{
        echo "<script>window.location.href = 'ManagerUser.php?verifysuccess'; </script>";
    }
}


// mở khóa 
if(isset($_GET['mokhoa'])){
    require_once("Entities/user.class.php");

    $users = User::get_user($_GET['UserID']); 
    $result = User::verify($_GET['UserID']);
    if(!$result){
        echo "<script>window.location.href = 'ManagerUser.php?mokhoafailure'; </script>";
    }else{
        echo "<script>window.location.href = 'ManagerUser.php?mokhoasuccess'; </script>";
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
<?php include_once("footer.php"); ?>
