<?php
$headers = 'From:kaka12266@gmail.com' ."\r\n".'Content-type:text/html;charset=iso-8859-1';

$from = "tailieu2266@gmail.com";

$to = "kaka12266@gmail.com";

$subject = "Checking PHP mail";

$message = '
<html>
<head>
	<title>abc</title>
	<link rel="stylesheet" type="text/css" href="site.css">
</head>
<body>
	<h1 align="center">Thông tin đặt hàng </h1>

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
  		    <th>Tổng tiền</th>
  		</tr>
    </thead>
      <tr>
   			<th>1</th>
  		    <th>Mập</th>
  		    <th>Địt</th>
  		    <th>1đ</th>
  		    <td><img class="img" src="http://domain.com/absolute/path/to/image/uploads/1.pnj" style="width:100px;height:100px;"/></td>
  		    <td>10</td>
  		    <td>100đ</td>
  		</tr>
  </table>
</div>
</body>
</html> ';



mail($to,$subject,$message,$headers);

echo "The email message was sent.";
 ?>