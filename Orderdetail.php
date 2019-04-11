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
   require 'Entities/orderProduct.class.php'; 
    
    $id = isset($_GET['OrderID']) ? (int)$_GET['OrderID'] : '';
    if ($id){
        $datas = OrderProduct::get_orderproducr($_GET['OrderID']);
    }
     
?>
<div class="col-md-10 ml-5" align="center">
<h1>Chi tiết đơn hàng</h1>
  <table id="t02" class="table table-bordered md-3 m-auto" style="width:100%" >
  	<thead class="thead-dark text-center">
   		<tr>
   			  <th>STT</th>
  		    <th>Tên sản phẩm</th>
          <th>Số lượng</th>
          <th>Thành Tiền</th>
  		    <th>Hình ảnh</th>   
          <th></th>
  		</tr>
      <?php
        $i=1; 
        $SumQuantity = 0; 
         $SumPrice = 0;
         foreach($datas as $item){
          $id = $item["OrderID"];
          $SumQuantity += $item["Quantity"]; 
          $SumPrice += $item["Price"]*$item["Quantity"]; 

           {
          echo "
          <tr>
            <td>".$i++."</td>
            <td>".$item["ProductName"]."</td>
            <td>".$item["Quantity"]."</td>
            <td>" ;
            echo  number_format($item["Price"]*$item["Quantity"])." VNĐ</td>  ";

            echo "<td><img width='200px' height='200px' class='img-responsive' src='uploads/".$item["Picture"]."'></td>    ";
            // if($item["Status"] == 0 ){
            //   echo "<td style='color: #28a745; '>Chờ xử lý</td>  ";
            // }
            // else  if($item["Status"] == 1 ){
            //   echo "<td style='color: #ffc107; '>Đã duyệt</td>  ";
            // }
            //  else  if($item["Status"] == 2 ){
            //   echo "<td style='color: red; '>Không duyệt</td>  ";
            // }
           
            echo "<td><a class='btn btn-warning' onclick='KiemTraDonHang(".$item["QuantitySP"].",".$item["Quantity"].")'  >Kiểm tra đơn hàng</a></td>   </tr>";
            } 
            $i++;
        }
      ?>
      <tr>
        <td></td><td></td>
        <td>Tổng Số Lượng: <?php echo"$SumQuantity";?></td>
        <td>Tổng Tiền: <?php echo number_format($SumPrice, 0, '', ',');?> VNĐ</td>
      </tr>
    </thead>
  </table>
  <div class="row" style="margin-top: 30px">
    <div class="col-sm-8"> 
    </div>
    <div class="col-sm-4">
      <div class="col-sm-6" style="float: right;">
      <a class='btn btn-success' <?php echo " onclick='Huy($id)' "; ?> >Hủy Đơn Hàng</a>
      </div>
      <div class="col-sm-6" style="float: right;">
        <a class='btn btn-info' <?php echo " onclick='Duyet($id)' "; ?> >Duyệt Đơn Hàng</a>
      </div>
    </div>
    
     <div class="col-sm-12" style="float: right;">
       <a href="ListDetail.php">Trở về </a>
    </div>
   
  </div>
</div>
<script type="text/javascript">
   function Duyet(id) {
        var r = confirm("Duyệt đơn hàng này!");
        if (r == true) {
            window.location.href = "Orderdetail.php?DuyetDonHang=true&OrderID="+id;
        }
    }
// hủy
     function Huy(id) {
        var r = confirm("Hủy đơn hàng này!");
        if (r == true) {
            window.location.href = "Orderdetail.php?HuyDonHang=true&OrderID="+id;
        }
    }
     // Kiểm tra số lượng tốn
    function KiemTraDonHang(SL_SP, SL){ 
        
      if(SL_SP <SL){ 
        alert("Cảnh báo. Không đủ số lượng tốn");
         
        }else{
            alert("Số lượng hàng trong kho vẫn còn đủ.");
        }
    }
</script>
<?php
// Kiểm tra sl lồn 
 
if(isset($_GET['KiemTraDonHang'])){   
  $id = isset($_GET['OrderID']) ? (int)$_GET['OrderID'] : '';
    if ($id){
        $datas = OrderProduct::get_orderproducr($_GET['OrderID']);
    }
}

// duyệt 
if(isset($_GET['DuyetDonHang'])){
    require_once("Entities/orderProduct.class.php"); 
    $result = OrderProduct::capnhatDonHang($_GET['OrderID'],1);
    if(!$result){
        echo "<script>window.location.href = 'ListDetail.php?duyetfailure'; </script>";
    }else{
        echo "<script>window.location.href = 'ListDetail.php?duyetsuccess'; </script>";
    }
}
// hủy 
if(isset($_GET['HuyDonHang'])){
    require_once("Entities/orderProduct.class.php"); 
    $result = OrderProduct::capnhatDonHang($_GET['OrderID'],2);
    if(!$result){
        echo "<script>window.location.href = 'ListDetail.php?huyfailure'; </script>";
    }else{
        echo "<script>window.location.href = 'ListDetail.php?huysuccess'; </script>";
    }
}

?>
