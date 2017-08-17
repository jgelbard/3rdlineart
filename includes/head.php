<?php
echo $_SERVER['SERVER_ADDR'].':'.$_SERVER['SERVER_HOST'];
// $serveraddr = $_SERVER['SERVER_ADDR'];
$serveraddr='localhost'; // genotype-PowerEdge-T130';
// $serveraddr = '168.253.229.30';
$rooturl = $serveraddr."/3rdlineart6/";
$path = $_SERVER['DOCUMENT_ROOT']."/3rdlineart6";
$cpath = $path."/includes/config.php";
echo('including: '.$cpath);

echo '
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta name="apple-mobile-web-app-capable" content="yes"> 
    
<link href="http://'.$rooturl.'css/font-awesome.css" rel="stylesheet">
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet">
    
<link href="http://'.$rooturl.'css/style.css" rel="stylesheet" type="text/css">
<link href="http://'.$rooturl.'css/pages/signin.css" rel="stylesheet" type="text/css">

<script src="http://'.$rooturl.'js/jquery-1.12.4.js"></script
<!-- <script src="http://'.$rooturl.'js/jquery.min.js"></script> -->
<script src="http://'.$rooturl.'js/jquery-migrate-1.2.1.min.js"></script>
<script src="http://'.$rooturl.'js/jquery-ui.min.js"></script>
<!-- <script src="http://'.$rooturl.'js/Parsley.js-2.7.2/dist/parsley.min.js"></script> -->
<script src="http://'.$rooturl.'dist/jquery.date-dropdowns.min.js"></script>
<!-- <script src="http://'.$rooturl.'validation/lib/jquery.js"></script> -->
<script src="http://'.$rooturl.'validation/dist/jquery.validate.js"></script>
<link href="http://'.$rooturl.'css/pages/dashboard.css" rel="stylesheet">
<link rel="stylesheet" href="http://'.$rooturl.'css/jquery-ui.css">

<link href="http://'.$rooturl.'css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="http://'.$rooturl.'css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css" />
';
include_once($cpath);
?>
