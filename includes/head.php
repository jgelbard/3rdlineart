<?php
// echo $_SERVER['SERVER_ADDR'].':'.$_SERVER['SERVER_HOST'];
// $serveraddr = $_SERVER['SERVER_ADDR'];
$serveraddr='localhost'; // genotype-PowerEdge-T130';
// $serveraddr = '168.253.229.30';
// $serveraddr = 'www.3rdlineartmw.org';
$rooturl = "http://$serveraddr/3rdlineart6/";
$path = $_SERVER['DOCUMENT_ROOT']."/3rdlineart6";
$cpath = $path."/includes/config.php";

echo '<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta name="apple-mobile-web-app-capable" content="yes">';

echo '<link href="'.$rooturl.'css/bootstrap.min.css" rel="stylesheet" type="text/css">';
echo '<link href="'.$rooturl.'css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css">';
echo '<link href="'.$rooturl.'css/font-awesome.css" rel="stylesheet">';
echo '<link href="https://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet">';
echo '<link href="'.$rooturl.'css/style.css" rel="stylesheet" type="text/css">';
echo '<link href="'.$rooturl.'css/pages/signin.css" rel="stylesheet" type="text/css">';
echo '<link href="'.$rooturl.'css/pages/dashboard.css" rel="stylesheet">';

echo '<script src="'.$rooturl.'js/jquery-1.12.4.js"></script>';
echo '<script src="'.$rooturl.'js/jquery-migrate-1.2.1.min.js"></script>';

// echo '<script src="'.$rooturl.'validation/lib/jquery.js"></script>';
// echo '<script src="'.$rooturl.'js/jquery.min.js"></script>';
echo '<script src="'.$rooturl.'js/jquery-ui.js"></script>';

// echo '<script src="'.$rooturl.'js/Parsley.js-2.7.2/dist/parsley.min.js"></script>';

echo '<script src="'.$rooturl.'dist/jquery.date-dropdowns.js"></script>';

echo '<script src="'.$rooturl.'validation/dist/jquery.validate.js"></script>';
echo '<script src="'.$rooturl.'js/bootstrap.js"></script>';
echo '<script src="'.$rooturl.'js/base.js"></script>';
echo '<link rel="stylesheet" href="'.$rooturl.'css/jquery-ui.css">';

include_once($cpath);
include_once $path.'/includes/email_templates.php';
include_once $path.'/includes/queries.php';
?>
