<?php
include('conn.php');
$id=$_GET['id'];
$query=mysqli_query($conn,"delete from products where id='$id'");
if($query){
echo "<script>window.alert('Delete Successful!')</script>";	
echo '<script>window.location.href="../admin/products.php"</script>'; 	
	}

?>