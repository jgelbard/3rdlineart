<?php
echo $_SERVER['SERVER_ADDR'].':'.$_SERVER['SERVER_HOST'];
$rooturl = $_SERVER['SERVER_ADDR']."/3rdlineart5/";
$path = $_SERVER['DOCUMENT_ROOT']."/3rdlineart5";
$cpath = $path."/includes/config.php";
echo('including: '.$cpath);

echo '
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta name="apple-mobile-web-app-capable" content="yes"> 
    
<link href="http://'.$rooturl.'css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="http://'.$rooturl.'css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css" />

<link href="http://'.$rooturl.'css/font-awesome.css" rel="stylesheet">
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet">
    
<link href="http://'.$rooturl.'css/style.css" rel="stylesheet" type="text/css">
<link href="http://'.$rooturl.'css/pages/signin.css" rel="stylesheet" type="text/css">
<link href="http://'.$rooturl.'css/pages/dashboard.css" rel="stylesheet">
<script src="http://'.$rooturl.'js/jquery.min.js"></script>
<script src="http://'.$rooturl.'dist/jquery.date-dropdowns.js"></script>

<link rel="stylesheet" href="css/jquery-ui.css">
';
include_once($cpath);
?>
