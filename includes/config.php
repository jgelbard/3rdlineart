<!-- DB configuration-->
<?php
$mysql_hostname = "localhost";
//$mysql_user = "3rdlineart_root";
$mysql_user = "root";
$mysql_password = "g3n0typ3";
//$mysql_password = "password";
$mysql_database = "3rdlineart5_db";
$bd = mysqli_connect($mysql_hostname, $mysql_user, $mysql_password, $mysql_database)
or die("Oops some thing went very wrong");
?>
