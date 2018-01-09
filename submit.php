<?php
  session_start();
  include("conn.php");

  $name = $_POST['name'];
  $phone = $_POST['ph'];
  $address = $_POST['address'];
  $pay=$_POST['payment'];
  $cardno=$_POST['cardno'];
	if(empty($name))
	{
		echo "<script>window.alert('hi')</script>";	
	}
  mysql_query("insert into order(name,phone,address,payment,cardno) values ('$name','$phone','$address','$pay','$cardno')");
  $order_id = mysql_insert_id();

  foreach($_SESSION['cart'] as $id => $qty) {
    mysql_query("insert into orderitem(orderid,product_id, qty) values ($order_id,$id,$qty)");
  mysql_query("update products set Qty=Qty-$qty where id=$id");
  }

  unset($_SESSION['cart']);
?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
  <meta charset="UTF-8">
  <title>Order Submitted</title>

</head>
<body>
<div style="width:100%;margin:100px auto;background:#125;color:#fff;text-align:center;">
  <h1>Order Submitted</h1>
  
  <div class="msg">

    Your order has been submitted. We'll deliver the items soon.Thanks!.
    <a href="home.php" class="done" style="color:red;">Back home</a>
  </div>

 </div>

</body>
</html>
