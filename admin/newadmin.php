<?php
//require('conn.php');
$conn = mysqli_connect('localhost','root', '123', 'adidas');
if(isset($_REQUEST['btnsave']))
 {
 	$adminname=$_REQUEST['txtaname'];
	$password=$_REQUEST['txtpassword'];
	if(empty($adminname))
	echo "<script>window.alert('Please enter Admin name')</script>";	
	else if (empty($password))
	echo "<script>window.alert('Please enter password')</script>";	
	else
	{ $query=mysqli_query($conn,"Select * from admin where aname='$adminname' & password='$password'") or die("Cann't Select".mysqli_error($conn));
	$num=mysqli_num_rows($conn,$query);
	if ($num>0)
	{ $msg="This Record is Already Exit!";}
	else{$query=mysqli_query($conn,"insert into admin(aname,password)values('$adminname','$password')");
	if ($query)
		{ $msg="Save Successfully Record";
		$adminname="";
		$password="";
		
		}
		}
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

<form action="" method="post" name="user">
<table width="500" height="350" align="center" cellpadding="5" cellspacing="1">
  <tr>
    <td colspan="2"><h2>Add New Admin!</h2></td>
  </tr>
  <tr>
    <td><font color="#333333" size="+1">New Admin Name</font></td>
    <td><input name="txtaname" type="text" size="25" maxlength="30" value=""></td>
  </tr>
  <tr>
    <td><font color="#333333" size="+1">Password</font></td>    
    <td><input name="txtpassword" type="password" size="25" maxlength="30" value=""></td>
  </tr>
 
  
 
  <tr>
    <td>&nbsp;</td>
    <td><button name="btnsave" class="btn btn-info" type="submit" value="">Save</button>
    <button name="btncancel" class="btn btn-info" type="reset" value="">Cancel</button></td>
  </tr>
</table>
</form>



</div>  


<?php
require('footer.php');
?>
</body>
</html>