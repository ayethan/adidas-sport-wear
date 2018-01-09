<?php
//require('conn.php');
$conn = mysqli_connect('localhost','root', '123', 'adidas');
?>
<html>
<head><title></title></head>
<link rel="stylesheet" type="text/css" href="style.css">

<body>
<?php
require('header2.php');
?>
<div id="main">
<div id="cont">
 <?php $query=mysqli_query($conn, "SELECT * FROM products");
  while($row=mysqli_fetch_array($query)){ ?>
  <table width="250" align="center" id="utbg" style="position:relative;float:left;">

  <tr>
    <td><fieldset><legend>Adidas</legend>
        <img src="images/<?php echo $row['Photo']?>" width="180" height="190"><br>
     <p><?php echo $row['Name'] ?><br>
     <?php echo $row['Category'] ?><br>
     $<?php echo $row['Price'] ?><br>
      <a href="addtocart.php?id=<?php echo $row['id']?>"><img src="images/atc.png" width="200" height="40"></a> 
     <br>
     <?php echo $row['Description'] ?></p>

    </fieldset></td>
    </tr>
    </table>
 <?php } ?>





</div>
</div>
<?php
require('footer.php');
?>
</body>
</html>