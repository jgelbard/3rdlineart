<!-- DB configuration-->
<?php
$mysql_hostname = "localhost";
//$mysql_user = "3rdlineart_root";
$mysql_user = "root";
<<<<<<< HEAD
//$mysql_password = "g3n0typ3";
$mysql_password = "password";
$mysql_database = "3rdlineart5_db";
=======
$mysql_password = "password";
$mysql_database = "3rdlineart_db";
// $bd = mysqli_connect($mysql_hostname, $mysql_user, $mysql_password)
>>>>>>> 6efad32ac1db985d04e400ec932fc4f3ad788296
$bd = mysqli_connect($mysql_hostname, $mysql_user, $mysql_password, $mysql_database)
or die("Oops some thing went very wrong");
?>
