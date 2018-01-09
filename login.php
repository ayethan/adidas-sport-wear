<?php
//require('conn.php');
$conn = mysqli_connect('localhost','root', '123', 'adidas');
 if(isset($_REQUEST['btnlogin']))
 {
  $username=$_REQUEST['txtusername'];
  $userpassword=$_REQUEST['txtpassword'];
  if(empty($username))
  echo "<script>window.alert('Please enter user name')</script>"; 
  else if (empty($userpassword))
  echo "<script>window.alert('Please enter password')</script>";  
  else
  { $query=mysqli_query($conn,"Select * from user where username='$username' and password='$userpassword'") or die("Cann't Select");
    $num=mysqli_num_rows($query);
  if ($num>0)
  { 
  echo"<script>window.location.href='../home.php'</script>";
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
<table width="500" height="250" align="center"  id="content" cellpadding="5" cellspacing="1">
  <tr>
    <td colspan="2"><h2><strong>Login Here!</strong></h2></td>
  </tr>
  <tr>
    <td><font color="#333333" size="+1">User Name</font></td>
    <td><input name="txtusername" type="text" size="25" maxlength="30"></td>
  </tr>
  <tr>
    <td><font color="#333333" size="+1">Password</font></td>
    <td><input name="txtpassword" type="password" size="25" maxlength="30"></td>
  </tr>
 
  <tr>
    <td>&nbsp;</td>
    <td><button name="btnlogin" class="btn btn-primary" type="submit" value="">Login</button>
    <button name="btncancel" class="btn btn-primary" type="reset" value="Cancel">Cancel</button>
  </tr>
</table>
</form>



</div>     
     
     
     
     
     
     
     
     
     
     
     
     
<?php
require ('footer.php');
?>     
     
</body>
</html>