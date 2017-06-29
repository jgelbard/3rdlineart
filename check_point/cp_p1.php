<?php 
 session_start();
 global $now,$expire,$user_id,$fullname;
 if (isset($_SESSION['identification'])){

	/* global  $fullname;*/
       $fname= $_SESSION['fname'];
       $lname= $_SESSION['lname'];
       $fullname =$fname . " " .$lname;
    
       /*$fname= $_SESSION['fname'];*/
       $sec_id= $_SESSION['id'];
       $user_id=$_SESSION['identification'];
     
       /*$fullname =$_SESSION['name'];*/
       $phone= $_SESSION['phone'];
       $email= $_SESSION['email'];
      
     
	   $now = time(); 
	   $expire= $_SESSION['expire'];}
	   
	   ?>
<!DOCTYPE html>
<html lang="en">
  
<head>
    <meta charset="utf-8">
    <title>Application Form</title>
    
   <?php 
    
include ('../includes/head.php');
    
    ?>
    
 <style type="text/css">
    .box{
        padding: 20px;
        display: none;
        margin-top: 20px;
        border: 1px solid #000;
    }
    .red{ background: #ff0000; }
    .green{ background: #00ff00; }
    .blue{ background: #0000ff; }

    input[type="text"] {
    height: 35px; 
    }
   /* input[type="submit"] {
    width: 200px;
        
    }
    */
     
  fieldset {
        margin: 20px;
        padding: 30px;
        margin-top: 20px;
        border: 1px solid #000;
    }   
.radio_sty {
  color: #AAAAAA;
  display: inline;
  position: relative;
  float: left;
  width: 100%;
  height: 80px;
	
}

.radio_sty input[type=radio]{
  position: absolute;
  visibility: hidden;
}

.radio_sty label{
  display: block;
  position: relative;
  font-weight: 300;
  font-size: 1.35em;
  padding: 25px 25px 25px 80px;
  margin: 10px auto;
  height: 30px;
  z-index: 9;
  cursor: pointer;
  -webkit-transition: all 0.25s linear;
}

.radio_sty:hover label{
	color: #FFFFFF;
}

.radio_sty .check{
  display: block;
  position: absolute;
  border: 5px solid #AAAAAA;
  border-radius: 100%;
  height: 20px;
  width: 20px;
  top: 30px;
  left: 20px;
	z-index: 5;
	transition: border .25s linear;
	-webkit-transition: border .25s linear;
}

.radio_sty:hover .check {
  border: 5px solid #FFFFFF;
}

.radio_sty .check::before {
  display: block;
  position: absolute;
	content: '';
  border-radius: 100%;
  height: 15px;
  width: 15px;
  top: 2.5px;
	left: 3px;
  margin: auto;
	transition: background 0.25s linear;
	-webkit-transition: background 0.25s linear;
}

input[type=radio]:checked ~ .check {
  border: 5px solid #f4bf0f;
}

input[type=radio]:checked ~ .check::before{
  background: #0DFF92;
}

input[type=radio]:checked ~ label{
  color: #fab415;
}
                 /* latin-ext */
@font-face {
  font-family: 'Lato';
  font-style: normal;
  font-weight: 400;
  
}
/* latin */
@font-face {
  font-family: 'Lato';
  font-style: normal;
  font-weight: 400;
    
    </style>
</head>
<body>
<?php
    include ('../includes/nav_main.php');
    include ('../includes/nav_sub.php');
    
    ?>
    
<div class="main">
	
	<div class="main-inner">

	    <div class="container">
	 <?Php
/*
if (isset($_SESSION['identification'])){

	  	   echo '<h4>  <span class="glyphicon glyphicon-user">Logged in: '. $fullname.'</span></h4>';
	   
	   	   }*/
	   ?>  
	      <div class="row">
	      	
	      	<div class="span12">
	      		
	      		<div class="widget">
						
					<!--<div class="widget-header">
						<i class="icon-th-large"></i>
						<h3 style="text-align:right">3rd Line ART Application Form</h3>
                        
					</div>  /widget-header -->
					
					<div class="widget-content">
						
						<div class="pricing-plans plans-3">
							
<?php
    /*include ('includes/app_form.php');*/
   /* include ('includes/app_patientdetails.php');*/
    /*include ('includes/app_form.php');*/


if(isset($_POST['submit_reviewers'])){
	
$formID= $_POST['formID']; 
      $date_assigned = date ('Y/m/d');
    
    $rev_lead = $_POST['rev_lead'];
      
      $insert_reviewer_team_lead =" INSERT  INTO  reviewer_team_lead (rev_id,form_id,sec_id)
VALUES (
'$rev_lead', '$formID', '$sec_id')";

mysqli_query( $bd,$insert_reviewer_team_lead);	
      
      
    
$sql_form_creation4review = "UPDATE form_creation ".
       "SET status='Assigned Reviewer'".
       "WHERE 3rdlineart_form_id='$formID'" ;

mysqli_select_db('3rdlineart_db');
$form_submited_4review = mysqli_query( $bd , $sql_form_creation4review);   
    
      
	  if(!empty($_POST['checkbox'])){   
 $checkbox = $_POST['checkbox'];
 
	
	
for($i=0;$i<count($_POST['checkbox']);$i++){
	
    if(!empty($checkbox[$i])){  
$rev_id = $checkbox[$i];
	}

    
$insert_assigned_forms=" INSERT  INTO  assigned_forms (form_id,sec_id,rev_id,date_assigned)
VALUES (
'$formID', '$sec_id', '$rev_id', '$date_assigned')";

mysqli_query( $bd,$insert_assigned_forms);	
    
    $SQL_reviewer = "SELECT * FROM reviewer WHERE id=$rev_id";
    $reviewer = mysqli_query($bd,$SQL_reviewer);
    
                $row_reviewer = mysqli_fetch_array($reviewer);
                $rev_email_address = $row_reviewer['email'];
                $rev_title = $row_reviewer['title'];
                $rev_lname = $row_reviewer['lname'];
 
     
 $to = 'j.dumisani7291@gmail.com';
   $subject = "3RD Line Expert Application form review";
   $message = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>New form to review</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body>

<p>Dear '.$rev_title.' '.$rev_lname.',</p>
<p>&nbsp;</p>
<p>Please review the following application for genotyping for resistance mutations.</p>
<p>After review please state:</p>
<p>-Genotyping indicated yes/no.</p>
<p>&nbsp;</p>
<p>If genotyping is not indicated please additionally provide feedback to the clinician.</p>
<p>&nbsp;</p>
<p>Thank you very much,</p>
<p><strong>Mercy</strong></p>
<p><span style="text-decoration: underline;"><strong>3<sup>rd</sup> line committee Secretary</strong></span></p>

</body>
</html>
';   
 $header = "From:dumi_ndhlovu@lighthouse.org.mw\r\n";
   $header .= "Cc:j.dumisani7291@gmail.com\r\n";
   $header .= "MIME-Version: 1.0\r\n";
   $header .= "Content-type: text/html\r\n";
   $retval = mail ($to,$subject,$message,$header);    
    
  echo"<meta http-equiv=\"Refresh\" content=\"1; url=cp_p1.php?p\">";   
}
      }
      
  }

if(isset($_POST['submit_consolidate1'])){ 
 include ('includes/insert_consolidate1.php');   
}

if(isset($_POST['submit_consolidate2'])){ 
 include ('includes/insert_consolidate2.php');   
}


if(isset($_GET['complete'])){ 
 
    $form_ID= $_GET['form_id'];
    
$sql_form_creation_complete = "UPDATE form_creation ".
       "SET complete='Yes'".
       "WHERE 3rdlineart_form_id='$form_ID'" ;

mysqli_select_db('3rdlineart_db');
$form_submited_complete = mysqli_query( $bd , $sql_form_creation_complete);   
    
}

if(isset($_GET['notcomplete'])){ 
 
    $form_ID= $_GET['form_id'];
    
$sql_form_creation_not_complete = "UPDATE form_creation ".
       "SET complete='Rejected'".
       "WHERE 3rdlineart_form_id='$form_ID'" ;

mysqli_select_db('3rdlineart_db');
$form_submited_not_complete = mysqli_query( $bd , $sql_form_creation_not_complete);   
    
}

if(isset($_GET['p'])){ 
 include ('includes/sec_new.php');   
}

if(isset($_GET['view'])){ 
 include ('includes/app_form.php');   
}

if(isset($_GET['received'])){ 
 include ('includes/sec_attach_resultpdf.php');   
}

if(isset($_GET['pending'])){ 
 include ('includes/sec_results_under_rev.php');   
}

if(isset($_GET['pending_result'])){ 
 include ('includes/sec_pending_result.php');   
}
if(isset($_GET['pending_sample'])){ 
 include ('includes/sec_pending_sample.php');   
}
if(isset($_GET['reviewed_app'])){ 
 include ('includes/sec_reviewed_app.php');   
}
if(isset($_GET['reviewed_result'])){ 
 include ('includes/sec_reviewed_result.php');   
}

if(isset($_GET['reminder'])){ 
 include ('includes/sec_reminder.php');   
}


if(isset($_GET['rev'])){ 
 include ('includes/sec_rev.php');   
}

if(isset($_GET['assign'])){ 
 include ('includes/sec_assign_reviewer.php');   
}


if(isset($_GET['consolidate'])){ 
 include ('includes/sec_consolidate1.php');   
}
if(isset($_GET['consolidate_result'])){ 
 include ('includes/sec_consolidate2.php');   
}


/*
if(isset($_GET['assign'])){ 
    
  
}
*/


/*
if(isset($_POST['submit_facility'])){ 
 include ('includes/app_patientdetails.php');   
}

if(isset($_POST['submit_patD'])){ 
 include ('includes/app_clinic_status.php');   
}

if(isset($_POST['submit_clinicstatus'])){ 
 include ('includes/app_pregnancy.php');   
}

if(isset($_POST['submit_Preg'])){ 
 include ('includes/app_pedriatric.php');   
}
*/

    ?>		
				
					  
				
					</div> <!-- /pricing-plans -->
						
					</div> <!-- /widget-content -->
						
				</div> <!-- /widget -->					
				
		    </div> <!-- /span12 -->     	
	      	
	      	
	      </div> <!-- /row -->
	
	    </div> <!-- /container -->
	    
	</div>
    
</div> <!-- /main -->
    
 <?php /*include ('includes/footer.php');*/ ?>   

<!-- Le javascript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="../js/jquery-1.7.2.min.js"></script>

<script src="../js/bootstrap.js"></script>
<script src="../js/base.js"></script>

  </body>

</html>
