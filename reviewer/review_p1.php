<?php
// die($root);
 session_start();
 global $now,$expire,$user_id,$fullname, $rev_id;
 if (isset($_SESSION['identification'])){

	/* global  $fullname;*/
       $fname= $_SESSION['fname'];
       $lname= $_SESSION['lname'];
       $fullname =$fname . " " .$lname;
    
       /*$fname= $_SESSION['fname'];*/
      $rev_id= $_SESSION['id'];
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
    
   <style>
    input[type="text"],select {
    height: 35px;
        font-size:120%;
    }
    select, input[type="number"] {
    height: 35px;
        font-size:130%;
    }
    .box{
        padding: 20px;
        display: none;
        margin-top: 20px;
       /* border: 1px solid #000;*/
    } 
        .sec{
        padding: 20px;
        display: none;
        margin-top: 20px;
       /* border: 1px solid #000;*/
    }
        fieldset {
        margin: 20px;
        padding: 30px;
        margin-top: 20px;
        border: 1px solid #000;
    }
   /* input[type="submit"] {
    width: 200px;
        
    }
    */
        
.entry:not(:first-of-type)
{
    margin-top: 10px;
}

.glyphicon
{
    font-size: 12px;
}
        
        #example10 select {
        width:80px; margin:3px;
        } 
        #app_radio {
        width:20px; height:20px;
            
        }
        .radio {
        font-size:115%;
        }
        
        

.radio_sty {
  color: #AAAAAA;
  display: inline;
  position: relative;
  float: left;
  width: 100%;
  height: 100px;
	
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
  border: 5px solid #0cde80;
}

input[type=radio]:checked ~ .check::before{
  background: #0DFF92;
}

input[type=radio]:checked ~ label{
  color: #0cde80;
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
    
 
}
        .control-label {
        position:relative; top:30px;


	font-family: 'Lato', sans-serif;
font-size:110%;
        
        }

        
    </style>
    
</head>
<body>
<?php
    include ('../includes/nav_main.php');
    include ('includes/nav_sub.php');
    
    ?>
    
<div class="main">
	
	<div class="main-inner">

	    <div class="container">
	 <?Php
if (isset($_SESSION['identification'])){

	  	   echo '<h4>  <span class="glyphicon glyphicon-user">Logged in: '. $fullname.'</span></h4>';
	   
	   	   }
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
   
if(isset($_POST['submit_consolidate1'])){ 
 include ('includes/insert_consolidate1.php');   
}

if(isset($_POST['submit_consolidate2'])){ 
 include ('includes/insert_consolidate2.php');   
}


include ('includes/insert_review.php');  
include ('includes/insert_reviewed_result.php');  

if(isset($_GET['result'])){ 
 include ('includes/rev_results.php');   
}

if(isset($_GET['p'])){ 
 include ('includes/rev_new.php');   
}
if(isset($_GET['lead_reviewer'])){ 
 include ('includes/sec_rev.php');   
}

if(isset($_GET['lead_result'])){ 
 include ('includes/sec_rev_results.php');   
}
if(isset($_GET['rev'])){ 
 include ('includes/rev_my_reviewed.php');   
}

if(isset($_GET['review'])){ 
    
    $formID= $_GET ['id'];
    
    $form_creation=mysql_query("SELECT * FROM form_creation where 3rdlineart_form_id='$formID' ", $bd); 
    while ($row_form_creation=mysql_fetch_array($form_creation)){
        
        $_3rdlineart_form_id =$row_form_creation['3rdlineart_form_id'];
        $clinician_id =$row_form_creation['clinician_id'];
        $pat_id =$row_form_creation['patient_id'];
        $status =$row_form_creation['status'];
        $date_created =$row_form_creation['date_created'];
        
        $SQL_clinician = "SELECT * FROM clinician WHERE id=$clinician_id";
                    $clinician = mysql_query($SQL_clinician,$bd);
                    
                    $row_clinician = mysql_fetch_array($clinician);
                       $facility = $row_clinician['art_clinic'];
                       $clinician_name = $row_clinician['name'];
                       $clinician_phone = $row_clinician['phone'];
                       $clinician_email = $row_clinician['email'];
}
    
    
 include ('includes/review_form.php');  
 include ('includes/review.php');  
    
    
}

if(isset($_GET['result'])){ 
   
    
    $formID= $_GET ['id'];
    
    $form_creation=mysql_query("SELECT * FROM form_creation, app_results where form_creation.3rdlineart_form_id='$formID' and  form_creation.3rdlineart_form_id=app_results.form_id", $bd); 
    while ($row_form_creation=mysql_fetch_array($form_creation)){
    	echo '>> $row_form_creation';        
        $_3rdlineart_form_id =$row_form_creation['3rdlineart_form_id'];
        $clinician_id =$row_form_creation['clinician_id'];
        $pat_id =$row_form_creation['patient_id'];
        $status =$row_form_creation['status'];
        $result_pdf =$row_form_creation['result_pdf'];
        $date_created =$row_form_creation['date_created'];
        
        $SQL_clinician = "SELECT * FROM clinician WHERE id=$clinician_id";
                    $clinician = mysql_query($SQL_clinician,$bd);
                    
                    $row_clinician = mysql_fetch_array($clinician);
                       $facility = $row_clinician['art_clinic'];
                       $clinician_name = $row_clinician['name'];
                       $clinician_phone = $row_clinician['phone'];
                       $clinician_email = $row_clinician['email'];
}
  
echo '
 <div class="form-actions">
                                                                                                            
                                            <div class="span3" style="float:right">
											<a href="../documents/results/'.$result_pdf.'" target="_blank" class="btn btn-small btn-primary"> NHLS Patient Result</a>
                                            </div>
                          </div>	
'; 
 include ('includes/review_form.php');  
 include ('includes/review_result.php');  
    

}


if(isset($_GET['consolidate'])){ 
 include ('includes/sec_consolidate1.php');   
}
if(isset($_GET['consolidate_result'])){ 
 include ('includes/sec_consolidate2.php');   
}




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
     <div id="example1"></div>			
	<!--<script src="../js/pdfobject.js"></script>
<script>PDFObject.embed("../documents/results/Draft mini-Epihack-TZ.pdf", "#example1");</script>	-->			  
				

  </body>

</html>
