<?php
//require('conn.php');
$conn = mysqli_connect('localhost','root', '123', 'adidas');
if(isset($_POST['btnsave']))
{  
	$catname=$_POST['Categoryname'];
	if(empty($catname))
	{ echo "<script>window.alert('Please enter Category name! ')</script>";	}
	else
	{ $query=mysqli_query($conn, "SELECT * from category where Categoryname='$catname'") or die("Cann't Select".mysqli_error($conn));
	$num=mysqli_num_rows($conn, $query); 
	if ($num>0)
	{ echo "<script>window.alert('This Record is Already Exit! ')</script>";	 }
	else
	$do=mysqli_query($conn, "INSERT into category (categoryname)values('$catname')");
	if ($do){ echo "<script>window.alert('Save Successful! ')</script>";	}
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
<div id="cate">
<form action="" method="post" enctype="multipart/form-data">
<table width="400" height="200" align="center" cellpadding="8" cellspacing="3" id="tb">
	<tr>
    <td colspan="2"><h2>Add New Category</h2></td>
    </tr>


  <tr>
    <td><font color="#333333" size="+1">Category Name</font></td>
    <td><input type="text" name="Categoryname" required=""></td>
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