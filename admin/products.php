<?php
//require('conn.php');
$conn = mysqli_connect('localhost','root', '123', 'adidas');

?>
<html>
<head><title>Adidas</title></head>
<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">

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
    <th>Photo</th>
    <th>Category</th>
    <th>Name</th>
    <th>Price</th>
    <th>Qty</th>
    <th>Description</th>
    <th>Action</th>
  </tr>
  
  <?php $products=mysqli_query($conn ,"SELECT * from products");
while($out=mysqli_fetch_array($products)){
echo '<tr>';
echo '<td id="pta">'.$out['id'].'</td>';
echo '<td id="pta"><img src="../images/'.$out['Photo'].'" width="100" height="100"></td>';
echo '<td id="pta">'.$out['Name'].'</td>';
echo '<td id="pta">'.$out['Category'].'</td>';
echo '<td id="pta">'.$out['Price'].'</td>';
echo '<td id="pta">'.$out['Qty'].'</td>';
echo '<td id="pta">'.$out['Description'].'</td>';
 echo '<td id="pta"><a  href="edit.php?id='.$out['id'].'" ><span class="glyphicon glyphicon-pencil"></span></a>/<a href="delete.php?id='.$out['id'].'"><span class="glyphicon glyphicon-trash"></span></a></td>';
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