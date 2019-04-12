<script type="text/javascript" src="js/noel.js"></script>
<?php include_once("bar.php"); ?>
<style type="text/css">
    tr:hover {
        background-color: yellow;
    }
</style>

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
        echo "<script>alert('Thêm thể loại truyện thành công')</script>";
        // echo '<script>location.replace("ManagerUser.php");</script>';
    }
    if(isset($_GET["deleted"])){
        echo "<script>alert('Xóa thể loại truyện thành công')</script>";
        // echo '<script>location.replace("ManagerUser.php");</script>';
    }
    if(isset($_GET["updated"])){
        echo "<script>alert('Cập nhật thể loại truyện thành công')</script>";
        // echo '<script>location.replace("ManagerUser.php");</script>';
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
                    <div class="col-md-5">
                        <form method="post"  enctype="multipart/form-data">
                            <div class="form-group">
                              <center><h1>Thông tin thể loại truyện</h1></center>
                              <label>Tên thể loại truyện</label>
                              <input type="text" class="form-control" name="txtName" value="<?php echo isset($data['CategoryName']) ? $data['CategoryName'] : '' ?>" required>
                          </div>
                          <div class="form-group">
                            <label>Mô tả thể loại truyện</label>
                            <textarea name="txtdesc" class="form-control" required><?php echo isset($data['Description']) ? $data['Description'] : '' ?></textarea>
                        </div>
                        <div class="form-group">
                            <center><input type="submit" class="btn btn-primary" name="btnsubmit" style="margin-left: -231px;margin-top: 8px" value="Sửa thể loại truyện"></center>
                            <center><a class="btn btn-primary ml-2" href="all_in_one_category.php" style="margin-bottom: -6px;margin-top: -39px">Trở lại</a><center>
                            </div>
                        </form>
                        
                    </div>
                    <div class="col-md-4"></div>
                </div>
            </div>
            <?php
        }}else {?>
            <div class="container">
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-5">
                        <form method="POST" enctype="multipart/form-data">
                            <div class="form-group"><center><h1>Thông tin thể loại truyện</h1></center>
                                <label>Tên thể loại truyện</label>
                                <input type="text" class="form-control" name="txtName" value="<?php echo isset($_POST['txtName']) ? $_POST['txtName'] : ''; ?>" required>
                            </div>
                            <div class="form-group">
                                <label>Mô tả thể loại truyện</label>
                                <textarea name="txtdesc" class="form-control" required><?php echo isset($_POST['txtdesc']) ? $_POST['txtdesc'] : '' ?></textarea>
                            </div><center>
                                <div class="form-group">
                                    <center>
                                        <input class="btn btn-primary" type="submit" name="submit" value="Thêm thể loại truyện" style="margin-left: -231px;margin-top: 8px"></center>
                                        <div style="margin-left: 10px">

                                            <center>
                                                <a class="btn btn-primary ml-2" href="all_in_one_category.php" style="margin-bottom: -6px;margin-top: -38px">Trở lại</a></center>    
                                            </div>
                                        </div></center>

                                    </form>

                                    
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
                    rsort($cates);
                    require_once('config/db.class.php');
                    ?>
                    <div class="col-sm-12">
                      <?php
                      if(isset($_GET["inserted"])){
                          echo "<h2 class='text-success text-center' >Thêm thể loại truyện thành công</h2>";
                      }
                      if(isset($_GET["deleted"])){
                          echo "<h2 class='text-success text-center'>Xóa thể loại truyện thành công</h2>";
                      }
                      if(isset($_GET["updated"])){
                          echo "<h2 class='text-success text-center'>Cập nhật thể loại truyện thành công</h2>";
                      }
                      ?>
                  </div>
                  <div class="col-sm-1" > </div>
                  <div class="col-sm-10" style="margin-left: 10px">
                    <table class="table table-bordered sm-3">
                       <thead class="thead-dark">
                         <tr>
                            <th>ID</th>
                            <th>Tên thể loại truyện</th>
                            <th>Mô tả thể loại truyện</th>
                            <th>Sửa</th>
                            <th>Xóa</th>
                        </tr>
                    </thead>
                    <?php
                    $i = 1;
                    foreach($cates as $item){
                      $id = $item["CateID"];
                      if($i == 1 && isset($_GET['inserted'])){
                          echo "
                          <tr style='background-color: #1ec908'>
                          <td <a>".$item["CateID"]."</td>
                         <td><a class='btn btn-defulf' href='all_in_one_category.php?detailCate=true&CateID=".$item["CategoryName"]."'>".$item["CategoryName"]."</a></td>";
                          echo "    <td>".$item["Description"]."</td>
                          <td><a class='btn btn-warning' href='all_in_one_category.php?edit=true&CateID=".$item["CateID"]."'>Sửa</a></td>
                          <td><button class='btn btn-danger' onclick='myFunction(".$item["CateID"].")' >Xóa</button></td>
                          </tr>";
                      } else {
                        echo "
                        <tr>
                        <td>".$item["CateID"]."</td>
                         <td><a class='btn btn-defulf' href='all_in_one_category.php?detailCate=true&CateID=".$item["CategoryName"]."'>".$item["CategoryName"]."</a></td>";
                        echo "    <td>".$item["Description"]."</td>
                        <td><a class='btn btn-warning' href='all_in_one_category.php?edit=true&CateID=".$item["CateID"]."'>Sửa</a></td>
                        <td><button class='btn btn-danger' onclick='myFunction(".$item["CateID"].")' >Xóa</button></td>
                        </tr>";

                    }
                    $i++;
                }
                ?>
            </table>
        </div>
        <div class="col-sm-1" > </div>
        <script>
            function myFunction(id) {
                var r=confirm("Bạn có muốn xóa?");
                if (r == true) {
                    window.location.href="all_in_one_category.php?delete=true&CateID="+id;
                }

            }
        </script>
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
