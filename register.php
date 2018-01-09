<?php
 require('conn.php');
 if(isset($_REQUEST['btnsave']))
 {
 	$username=$_REQUEST['txtusername'];
	$userpassword=$_REQUEST['txtpassword'];
	$usercpassword=$_REQUEST['txtcpassword'];
	$email=$_REQUEST['txtemail'];
	if(empty($username))
	$msg="Please Enter user Name";
	else if (empty($userpassword))
	$msg="Please Enter User Password";
	else if (empty($usercpassword))
	$msg="Please Confirm Your Password";
	else if (empty($email))
	$msg="Please Enter Email";
	else
	{ $query=mysqli_query($conn,"Select * from user where username='$username' & password='$userpassword'") or die("Cann't Select".mysql_error());
	$num=mysqli_num_rows($conn,$query);
	if ($num>0)
	{ $msg="This Record is Already Exit!";}
	else{$query=mysqli_query($conn,"insert into user(username,password,email)values('$username','$userpassword','$email')");
	if ($query)
		{ $msg="Save Successfully Record";
		$username="";
		$userpassword="";
		$usercpassword="";
		$email="";
		}
		}
		
		
		
		}
	 
	 
	 
	 
	 
	 
	 }
	 ?>
<html>
<head><title>Adidas</title></head><link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
<body>

<?php
require ('header.php');
?> 
<div id="rcont">

<form action="" method="post" name="user">
<table width="500" height="350" align="center" cellpadding="5" cellspacing="1">
  <tr>
    <td colspan="2"><h2><b>Register Here!</b></h2></td>
  </tr>
  <tr>
    <td><font color="#333333" size="+1">User Name</font></td>
    <td><input name="txtusername" type="text" size="25" maxlength="30" value="" required="required"></td>
    
  </tr>
  <tr>
    <td><font color="#333333" size="+1">Password</font></td>    
    <td><input name="txtpassword" type="password" size="25" maxlength="30" value="" required="required"></td>
  </tr>
 
  <tr>
    <td><font color="#333333" size="+1">Confirm Password</font></td>
    <td><input name="txtcpassword" type="password" size="25" maxlength="30" value="" required="required"></td>
  </tr>
 
 <tr>
    <td><font color="#333333" size="+1">Email</font></td>
    <td><input name="txtemail" type="text" size="25" maxlength="30" value="" required="required"></td>
  </tr>
 
  <tr>
    <td>&nbsp;</td>
    <td><button name="btnsave" class="btn btn-primary" type="submit" value="">Save</button>
    <button name="btncancel" type="reset" class="btn btn-primary" value="">Cancel</button>
  </tr>
</table>
</form>



</div>     
     
     
     
     
     
     
     
     
     
     
     
     
<?php
require ('footer.php');
?>     
     
</body>
</html>