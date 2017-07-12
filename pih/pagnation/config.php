<?php

$mysqli_hostname = "localhost";
$mysqli_user = "root";
$mysqli_password = "g3n0typ3";
$mysqli_database = "world";
$bd = mysqli_connect($mysql_hostname, $mysql_user, $mysql_password) or die("Opps some thing went wrong");
mysqli_select_db($mysql_database, $bd) or die("Error on database connection");

?>