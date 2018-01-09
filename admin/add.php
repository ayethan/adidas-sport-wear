<?php
//require('conn.php');
$conn = mysqli_connect('localhost','root', '123', 'adidas');
if(isset($_POST['btnsave']))
{
	$name=$_POST['productname'];
	$catname=$_POST['cat'];
	$price=$_POST['price'];
	$qunatity=$_POST['quantity'];
	$description=$_POST['description'];
	$photo=$_FILES['photo']['name'];
	 
	$do=mysqli_query($conn,"insert into products(Photo,Category,Name,Price,Qty,Description)values('$photo','$catname','$name','$price','$qunatity','$description')");	
	if($do){
	move_uploaded_file($_FILES['photo']['tmp_name'],"../images/".$photo);
	$msg="Success";
	}
		
}
?>
<html>
<head><title>Adidas</title></head>
<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">

<body>
<?php
require('adminheader.php');
?>
<div id="catcon">
<form action="" method="post" enctype="multipart/form-data">
<table width="500" height="400" align="center" cellpadding="10" cellspacing="10">
	<tr>
    <td colspan="2"><h2>Add New Products</h2></td>
    </tr>


  <tr>
    <td><font color="#333333" size="+1">Product Name</font></td>
    <td><input type="text" name="productname"></td>
  </tr>
  <tr>
    <td><font color="#333333" size="+1">Category</font></td>
    <td>
    <select name="cat">
    <?php
		$category=mysqli_query($conn, "select * from category");
	?>
    <?php
		while($out=mysqli_fetch_assoc($category)):
		$cat=$out['Categoryname'];
	?>
    <option value="<?php echo $cat ?>"><?php echo $cat ?></option>
    <?php endwhile; ?>
	</select>
</td>
  </tr>
  
  <tr>
    <td><font color="#333333" size="+1">Price</font></td>
    <td><input type="text" name="price"></td>
  </tr>
  <tr>
    <td><font color="#333333" size="+1">Quantity</font></td>
    <td><input type="text" name="quantity"></td>
  </tr>
  <tr>
    <td><font color="#333333" size="+1">Description</font></td>
    <td><label for="textarea"></label>
      <textarea name="description" cols="25" rows="3"></textarea></td>
  </tr>
  <tr>
    <td><font color="#333333" size="+1">Photo</font></td>
    <td><input type="file" name="photo"></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><button type="submit" class="btn btn-info" value="" name="btnsave">Save</button>
    <button type="reset" class="btn btn-info" value="" name="btnclear">Clear</button>
 </td>
  </tr>
</table>

</form>









</div>
<?php
require('footer.php');
?>
</body>
</html>