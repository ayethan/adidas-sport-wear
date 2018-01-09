<?php
session_start();
//require('conn.php');
$conn = mysqli_connect('localhost','root', '123', 'adidas');

 if(!isset($_SESSION['cart'])) {
    header("location: home.php");
    exit();
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
<table width="950" align="center">
	<tr>
    	<th>Product Photo</th>
        <th>Product Name</th>
        <th>Qty</th>
        <th>Unit Pricd</th>
        <th>Price</th>
        <th>Action</th>
    </tr>
     
      <?php
          $total = 0;
          foreach($_SESSION['cart'] as $id => $qty):
          $result = mysqli_query($conn, "SELECT * FROM products WHERE id=$id");
          $row = mysqli_fetch_assoc($result);
          $total += $row['Price'] * $qty;
      ?>
      <tr>
      	<td><img src="images/<?php echo $row['Photo'] ?>" width="100" height="100" /></td>
        <td><?php echo $row['Name'] ?></td>
        <td><input type="text" value="<?php echo $qty ?>" name="qty"/></td>
        <td>$<?php echo $row['Price'] ?></td>
        <td>$<?php echo $row['Price'] * $qty ?></td>
        <td>
        
        <a href="deleteitem.php?id=<?php echo $row['id'] ?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash">Trash</span></a></td>
      </tr>
      <?php endforeach; ?>
      <tr>
        <td colspan="5" align="right"><b>Total:</b></td>
        <td>$<?php echo $total; ?></td>
      </tr>
    </table><br>
    <buttton> <a href="checkout.php" class="btn btn-primary btn-lg">Checkout</a></button>






</div>
<?php
require('footer.php'); 
?>
</body>
</html>