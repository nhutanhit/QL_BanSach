<?php session_start()?>
 <?php if($_SESSION["logged"] == 'user'){ ?>
         echo "<script>window.location.href = 'index.php'; </script>";
    <?php } ?>
<?php include_once("bar.php") ?>
<script type="text/javascript" src="js/noel.js"></script>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=2.0">
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
    <link href="css/sb-admin.css" rel="stylesheet">
    <title>Website bán hàng</title>
</head>
<style type="text/css">
        tr:hover {
        background-color: yellow;
    }
  </style>
<?php
    require_once('config/db.class.php');
    $db2 = new Db();
    $sql2 = "SELECT user.UserID, user.FullName, user.Phone , orderproduct.OrderID, orderproduct.OrderDate, orderproduct.ShipAddress, orderproduct.Status FROM `orderproduct`, `user` WHERE orderproduct.UserID = user.UserID";
    $result1 = $db2->select_to_array($sql2);
?>
<div class="col-md-10 ml-5" align="center">
<h1>Quản lý đơn hàng</h1>
<?php 
    if(isset($_GET["duyetsuccess"])){
        echo "<script>alert('Duyệt đơn hàng thành công')</script>";
        // echo '<script>location.replace("ManagerUser.php");</script>';
    }
    if(isset($_GET["huysuccess"])){
        echo "<script>alert('Hủy đơn hàng thành công')</script>";
        // echo '<script>location.replace("ManagerUser.php");</script>';
    }
    
?>
  <table id="t02" class="table table-bordered md-3 m-auto" style="width:100%" >
  	<thead class="thead-dark text-center">
   		<tr>
   			  <th>STT</th>
  		    <th>Mã Đơn Hàng</th>
          <th>Khách hàng</th>
          <th>SĐT</th>
  		    <th>Ngày đặt</th> 
  		    <th>Địa chỉ</th> 
          <th>Trạng thái</th>
          <th></th>
  		</tr>
      <?php
        $i=1; 
         foreach($result1 as $item){
          $id = $item["OrderID"];
           {
          echo "
          <tr>
            <td>".$i++."</td>
            <td>".$item["OrderID"]."</td>
            <td>".$item["FullName"]."</td>
            <td>".$item["Phone"]."</td>  
            <td>".$item["OrderDate"]."</td>  
            <td>".$item["ShipAddress"]."</td> ";
            if($item["Status"] == 0 ){
              echo "<td style='color: #28a745; '>Chờ xử lý</td>  ";
            }
            else  if($item["Status"] == 1 ){
              echo "<td style='color: #ffc107; '>Đã duyệt</td>  ";
            }
             else  if($item["Status"] == 2 ){
              echo "<td style='color: red; '>Không duyệt</td>  ";
            }
           
            echo "<td><a class='btn btn-warning' href='Orderdetail.php?OrderID=".$item["OrderID"]."'>Xem Chi Tiết</a></td>   </tr>";
            } 
            $i++;
        }
      ?>
      

    </thead>
  </table>
<div class="row" style="margin-top: 30px"></div>
</div>
