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
    <title>Project training - Website bán Bánh</title>
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
        $role = "user";

        $newUser = new User($fullname, $username, $password, $address, $phone, $role);

        $result = $newUser->save();
        if($result){
            header("Location: register.php?inserted");
        }else{
            header("Location: register.php?failure");
        }} else {

        }

?>

<?php
    if(isset($_GET["inserted"])){
        echo "<script>alert('Đăng ký thành công')</script>";
        echo '<script>location.replace("ManagerUser.php");</script>';
    }
?>
    <div class="container">
    <div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4">
        <form method="POST" action="register.php">
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
                <input class="btn btn-primary" type="submit" name="submit" value="Đăng ký">
            </div>
        </form>

        <a class="btn btn-primary ml-2" href="index.php">Back</a>
        </div>
        <div class="col-md-4"></div>
    </div>
</div>

</body>
</html>
