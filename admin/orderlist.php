<?php
//require('conn.php');
$conn = mysqli_connect('localhost','root', '123', 'adidas');
if(isset($_GET['id']))
{
	$id=$_GET['id'];
	mysqli_query($conn, "Delete from orders where id='$id'") or die("cann't delete");	
}
?>
<html>
<head><title>Adidas</title></head>
<link rel="stylesheet" type="text/css" href="style.css">
<body>
<?php
require('adminheader.php');
?>
<div id="MC">
<div id="content">

<table width="1050" align="center" >
<tr>
<td colspan="8" align="right"><a href="newadmin.php"><img src="../images/abtn.png" width="200" height="50" id="abtn"></a><a href="add.php"><img src="../images/pbtn.png" width="200" height="50"></a></td>
</tr>
<tr>
    <th>ID</th>
    <th>Name</th>
    <th>Phone</th>
    <th>Address</th>
    <th>Payment</th>
    <th>Cardno</th>
    
    <th>Action</th>
  </tr>
  
  <?php $orders=mysqli_query($conn, "SELECT * from orders");
while($out=mysqli_fetch_array($orders)){
echo '<tr>';
echo '<td id="pta">'.$out['id'].'</td>';
echo '<td id="pta">'.$out['name'].'</td>';
echo '<td id="pta">'.$out['phone'].'</td>';
echo '<td id="pta">'.$out['address'].'</td>';
echo '<td id="pta">'.$out['payment'].'</td>';
echo '<td id="pta">'.$out['cardno'].'</td>';
echo '<td id="pta"><a href="orderlist.php?id='.$out['id'].'"><img src="../images/cancella.png" width="30" height="30"></a></td>';
echo '  </tr>';
}?>
</table>

<table width="1050" align="center" >
</table>

<table width="1050" align="center" >
</table>

<table width="1050" align="center" >
</table>


</div>
</div>
<?php
require('footer.php');
?>


</body>
</html>