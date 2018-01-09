<?php
//require('conn.php');
$conn = mysqli_connect('localhost','root', '123', 'adidas');
if(isset($_REQUEST['btnlogin']))
 {
 	$aname=$_REQUEST['txtaname'];
	$password=$_REQUEST['txtpassword'];
	if(empty($aname))
	echo "<script>window.alert('Please enter your name')</script>";	
	else if (empty($password))
	echo "<script>window.alert('Please enter Password')</script>";	
	else
	{ $query=mysqli_query($conn,"SELECT * from admin where aname='$aname' and password='$password'") or die("Cann't Select");
		$num=mysqli_num_rows($query);
	if ($num>0)
	{	
	echo"<script>window.location.href='../admin/products.php'</script>";
	}
	}
 }
?>
<html>
<head><title>Adidas</title></head>
<style type="text/css">
body{ background-image:url(../images/k1gwQ49.jpg); background-attachment:fixed; background-repeat:no-repeat; background-position:center;}
#content{ width:1000px; height:500px; background-color:#CCC; padding-top:100; background-color:rgba(173,168,168,0.8); border-radius:15px 40px 15px 40px; padding-top:50;  margin-left:150;}
h2{ font-family:"Palatino Linotype", "Book Antiqua", Palatino, serif; text-align:center; color:#333333;}
</style>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">

<body>
<div id="content">
<form action="" method="post" name="user">
<table width="500" height="350" align="center" cellpadding="5" cellspacing="1">
  <tr>
    <td colspan="2"><h2>Admin Login!</h2></td>
  </tr>
  <tr>
    <td><font color="#333333" size="+2">Admin Name</font></td>
    <td><input name="txtaname" type="text" size="25" maxlength="30" value=""></td>
  </tr>
  <tr>
    <td><font color="#333333" size="+2">Password</font></td>    
    <td><input name="txtpassword" type="password" size="25" maxlength="30" value=""></td>
  </tr>
 
  
 
  <tr>
    <td>&nbsp;</td>
    <td><button name="btnlogin" class="btn btn-primary" type="submit" value="">login</button>
    <button name="btncancel" class="btn btn-primary" type="reset" value="">Cancel</button></td>
  </tr>
</table>
</form>


</div>
</body>
</html>