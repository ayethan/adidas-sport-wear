<?php
//require('conn.php');
$conn = mysqli_connect('localhost','root', '123', 'adidas');
if(isset($_POST['btnupdate']))
{
	$id=$_POST['id'];
	$name=$_POST['Name'];
	$cat=$_POST['Category'];
	$price=$_POST['Price'];
	$qty=$_POST['Qty'];
	$des=$_POST['Description'];
	$photo=$_FILES['photo']['name'];
	if(empty($photo))
	{
		$do=mysqli_query($conn,"UPDATE products set Name='$name',Category='$cat',Price='$price',Qty='$qty',Description='$des' where id='$id'")
		or
		die ("Cannot update");
		
		if($do)
		{
			echo "<script>window.alert('You successfully updated the products')</script>";	
		}
	}
	else
	{
		$do=mysqli_query($conn,"UPDATE products set Name='$name',Category='$cat',Price='$price',Qty='$qty',Description='$des',photo='$photo' where id='$id'")
		or
		die ("Cann't update");
		move_uploaded_file($_FILES['photo']['tmp_name'],"../images/".$photo);

		if($do)
		{
			echo "<script>window.alert('You successfully updated the products')</script>";	
		}
			
	}
}
if(isset($_GET['id']))
{
	$id=$_GET['id'];
	$update=mysqli_query($conn,"SELECT * from products where id='$id'");
	if($update)
	{
		while($out=mysqli_fetch_array($update))
		{
			$id=$out['id'];
			$name=$out['Name'];
			$category=$out['Category'];
			$price=$out['Price'];
			$qty=$out['Qty'];
			$des=$out['Description'];
			$photo=$out['Photo'];
		}
	}
}

?>

<html>
<head><title></title></head>
<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">

<body>
<?php
require('adminheader.php');
?>
<div id="catcon">
<form action="" method="post" enctype="multipart/form-data">
<?php
	if(!empty($msg))
	{

		echo $msg;
	}
?>
<table width="500" id="c" height="350" align="center" cellpadding="5" cellspacing="1">
<tr>
	 <td colspan="2"><img src="../images/<?php echo $photo ?>" width="100" height="100"></td>
</tr>
<tr>
	 <td>ID</td>
	 <td><input type="text" name="id" value="<?php echo $id ?>" readonly></td>
</tr>
<tr>
	 <td>Name</td>
	 <td><input type="text" name="Name" value="<?php echo $name; ?>"></td>
</tr>
<tr>
	 <td>Category</td>
	 <td><input type="text" name="Category" value="<?php echo $category; ?>"></td>
</tr>
<tr>
	 <td>Price</td>
	 <td><input type="integer" name="Price" value="<?php echo $price; ?>"></td>
</tr>
<tr>
	 <td>Qty</td>
	 <td><input type="integer" name="Qty" value="<?php echo $qty; ?>"></td>
</tr>
<tr>
	 <td>Description</td>
	 <td><textarea name="Description"><?php echo $des; ?></textarea></td>
</tr>
<tr>
	 <td colspan="2"><input type="file" name="photo" value=""/></td>
</tr>
<tr>
	 <td><button type="submit" class="btn btn-info" name="btnupdate" value="">Update</button>
	 <button type="reset" class="btn btn-info" name="cancel" value="">Cancel</button></td>
</tr>
</table>
</form>






</div>
</body>
</html>