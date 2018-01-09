<?php
  $dbhost = "localhost";
  $dbuser = "root";
  $dbpass = "123";
  $dbname = "adidas";

  $conn = mysqli_connect($dbhost, $dbuser, $dbpass);
  $dbcon = mysqli_select_db($conn,$dbname);
  if ( !$conn ) {
 die("Connection failed : " . mysqli_connect_error());
 }

if ( !$dbcon ) {
 die("Database Connection failed : " . mysqli_connect_error());
 }

?>