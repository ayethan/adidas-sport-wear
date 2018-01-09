<?php
session_start();
include('conn.php');

if(isset($_POST['btnsubmit']))
{
   $name = $_POST['name'];
   $phone = $_POST['ph'];
   $address = $_POST['address'];
   $pay=$_POST['payment'];
   $cardno=$_POST['cardno'];
	if(empty($name))
	echo "<script>window.alert('Please enter your name')</script>";	
	else if(empty($phone))
	echo"<script>window.alert('Please enter Phone Number')</script>";
	else if(empty($address))
	echo"<script>window.alert('Please enter Address')</script>";	
	else if(empty($pay))
	echo"<script>window.alert('Please Choose Payment')</script>";	
	else if(empty($cardno))
	echo"<script>window.alert('Please enter your Card Number')</script>";	
	
	
	else
	{
 	$query=mysqli_query($conn,"insert into orders(name,phone,address,payment,cardno)values('$name','$phone','$address','$pay','$cardno')") or die("Cant insert");
  $order_id = mysqli_insert_id();

  foreach($_SESSION['cart'] as $id => $qty) {
    mysqli_query($conn,"insert into orderitem(orderid,product_id, qty) values ($order_id,$id,$qty)");
  mysqli_query($conn,"update products set Qty=Qty-$qty where id=$id");
  }

  unset($_SESSION['cart']); 
  echo "<script>window.alert('Your order has been submitted')</script>";
  echo "<script>window.location.href='home.php'</script>";
	}
}
?>
<html>
<head><title></title></head>
<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
<body>
<?php
require('header2.php');
?>
<div id="rcont">
<form action="" method="post">
<table width="500" height="350" align="center" cellpadding="5" cellspacing="1">
	<tr>
    	<td id="pta">Name</td>
        <td><input type="text" name="name"></td>
    </tr>
    <tr>
    	<td id="pta">Phone</td>
        <td><input type="integer" name="ph"></td>
    </tr>
    <tr>
    	<td id="pta">Address</td> 
        <td><textarea name="address"></textarea></td>
    </tr>
    <tr>
    	<td id="pta">Payment</td>
        <td><select name="payment">
        	<option value="Master Card">Master Card</option>
            <option value="Master Card">Viva Card</option>
        </select></td>
    </tr>
    <tr>
    	<td id="pta">Card Number</td>
        <td><input type="integer" name="cardno"></td>
    </tr><br>
    <tr>
    	<td>&nbsp;</td>
    	<td><button type="submit" class="btn btn-primary" name="btnsubmit" value="">Send</button>
      <button type="submit" class="btn btn-primary" name="btncancel" value="">Cancel</button></td>
    </tr>
</table>
</form>
</div>
<?php
require('footer.php');
?>
</body>
</html>