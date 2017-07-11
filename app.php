<?php 
 session_start();
 global $now,$expire,$user_id, $clinicianID;
 if (isset($_SESSION['identification'])){

	
    global  $fullname;
       $fname= $_SESSION['username'];
      /* $lname= $_SESSION['lname'];*/
       $user_id=$_SESSION['identification'];
       
       $clinicianID = $_SESSION['id'];
     
       $fullname =$_SESSION['name'];
       $clin_phone= $_SESSION['phone'];
       $clin_email= $_SESSION['email'];
       $facility = $_SESSION['art_clinic'];
     
	   $now = time(); 
	   $expire= $_SESSION['expire'];}
	   
	   ?>
<!DOCTYPE html>
<html lang="en">
  
<head>
    <meta charset="utf-8">
    <title>Application Form</title>
  <script language=JavaScript>
//Disable right click script
var message = "";
///////////////////////////////////
function clickIE() {
    if (document.all) {
        (message);
        return false;
    }
}

function clickNS(e) {
    if (document.layers || (document.getElementById && !document.all)) {
        if (e.which == 2 || e.which == 3) {
            (message);
            return false;
        }
    }
}
if (document.layers) {
    document.captureEvents(Event.MOUSEDOWN);
    document.onmousedown = clickNS;
} else {
    document.onmouseup = clickNS;
    document.oncontextmenu = clickIE;
}

document.oncontextmenu = new Function("return false")
</script>  
   <?php 
   
include ('includes/head.php');
    
    ?>
    
    
     
 <style>
    input[type="text"],select {
    height: 35px;
        font-size:130%;
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
	color: #47aa12;
    font-weight:800;
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
  border: 5px solid #47aa12;
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

 form .error, .error {
 
  color: #ff0000;
}
         
    </style>
    
    
</head>
<body>
<?php
    include ('includes/nav_main.php');
    include ('includes/nav_sub.php');
    
    ?>
    
<div class="main">
	
	<div class="main-inner">

	    <div class="container">
	 <?Php
if (isset($_SESSION['identification'])){
	  	   echo '<h4>  <span class="glyphicon glyphicon-user">Clinician: '. $fullname.'</span></h4>';
	   
	   	   }
	   ?>  
	      <div class="row">
	      	
	      	<div class="span12">
	      		
	      		<div class="widget">
						
					<!--<div class="widget-header">
						<i class="icon-th-large"></i>
						<h3 style="text-align:right">3rd Line ART Application Form</h3>
                        
					</div>  /widget-header 
					-->
					<div class="widget-content">
						
						<div class="pricing-plans plans-3">
                
	   <?php 
global $tot_number;
$form_creation=mysqli_query($bd, "SELECT * FROM form_creation, expert_review_consolidate1 WHERE form_creation.3rdlineart_form_id not in (select form_id from sample) and form_creation.3rdlineart_form_id=expert_review_consolidate1.form_id and form_creation.clinician_id ='$clinicianID'"); 

$tot_number = mysqli_num_rows ($form_creation);

global $tot_number_conso2;
$form_creation_conso2=mysqli_query($bd, "SELECT * FROM form_creation, expert_review_consolidate2 WHERE form_creation.3rdlineart_form_id=expert_review_consolidate2.form_id and form_creation.clinician_id ='$clinicianID'"); 

$tot_number_conso2 = mysqli_num_rows ($form_creation_conso2);
?>
                            
                   
    
<!--<form action="#">
    <input type="submit" value="newdiv" />
    <input type="submit" value="olddiv" />
    </form>-->
     
                            </div>
<?php

if(isset($_POST['search'])){ 
    
$pat_id = $_POST['id'];
    if ($pat_id !='--select ARV Number--'){
   
    echo"<meta http-equiv=\"Refresh\" content=\"0; url=app.php?back&part_1&pat_id=".$pat_id."\">";
        
    }
    else {
   include ('includes/app_patientdetails.php');   
    }
}
    /*include ('includes/app_form.php');*/
   /* include ('includes/app_patientdetails.php');*/
    /*include ('includes/app_form.php');*/
/*$id = uniqid('',true);
echo $id;*/
/*
$stamp = date("ymdhis");
 echo $stamp;
*/

    global $pat_id, $gender, $age, $dob;

if(isset($_GET['g'])){ 
    $gender=$_GET['g'];
}

if(isset($_POST['dob'])){ 
    $dob=$_POST['dob'];
    
    //calculating age of patient 
function GetAge($dob) 
{ 
        $dob=explode("/",$dob); 
        $curMonth = date("m");
        $curDay = date("j");
        $curYear = date("Y");
        $age = $curYear - $dob[2]; 
        if($curMonth<$dob[1] || ($curMonth==$dob[1] && $curDay<$dob[0])) 
                $age--; 
        return $age; 
}


$age =GetAge($dob);


}


/*echo $dob;*/
if(isset($_GET['p'])){ 
 include ('includes/app_facility.php');  
 /*include ('includes/app_treatment3.php'); */
}
//dash stats
if(isset($_GET['dash'])){ 
 include ('includes/app_dashboard.php');  
 /*include ('includes/app_treatment3.php'); */
}
if(isset($_GET['rev'])){ 
 include ('includes/app_consolidated1.php');   
}
if(isset($_GET['conso2'])){ 
 include ('includes/app_consolidated2.php');   
}
if(isset($_GET['conso2view'])){ 
 include ('includes/app_consolidated2_view.php');   
}
if(isset($_GET['view'])){ 
 include ('includes/app_consolidated1_view.php');   
}

if(isset($_POST['submit_p'])){ 
 include ('includes/app_facility.php');   
}

if(isset($_POST['submit_facility']) || isset($_GET['return_part_1'])){ 
 include ('includes/app_patientdetails.php');   
}

if(isset($_GET['part_1'])){ 
 include ('includes/app_patientdetails_edit.php');   
}

if(isset($_GET['app_clin'])){ 
 include ('includes/app_clinic_status.php'); 
}
if(isset($_POST['submit_patD'])){ 
 include ('includes/db_operations/insert_patient.php');   
}

if(isset($_POST['submit_clinicstatus']) || isset($_POST['update_clinicstatus']) || isset($_GET['back_3'])){ 
    
  //insert updated clinic status records 
  if (isset($_POST['update_clinicstatus'])) { 
include ('includes/db_operations/update_clinic_status.php');  
     
  }
    
  if (isset($_POST['submit_clinicstatus'])) { 
 include ('includes/db_operations/insert_clinic_status.php'); 

  }
    
    $age=$_GET['xx'];
    
   if  ($gender=='Female' && $age >'10'){
    
    if (isset($_POST['update_clinicstatus']) || isset($_GET['back_3'])) { 
        
     include ('includes/app_pregnancy_edit.php'); 
  }
       
    if (isset($_POST['submit_clinicstatus'])) {    
   include ('includes/app_pregnancy.php'); 
    }
        
   } 
    
  else if ($age <='3'){
      /*echo 'age'. $gender;*/
      
       if (isset($_POST['update_clinicstatus']) || isset($_GET['back_3'])) { 
  include ('includes/app_pedriatric_edit.php');  
       }
      
       if (isset($_POST['submit_clinicstatus'])) { 
  include ('includes/app_pedriatric.php');       
       }
   } 
    else {
    include ('includes/app_treatment1.php');
    
    }
    
}

if(isset($_POST['submit_treatment1'])){ 
  include ('includes/app_treatment2.php');
}


if(isset($_POST['submit_treatment2'])){ 
  include ('includes/app_treatment3.php');
}


if(isset($_POST['submit_Preg'])){ 
 include ('includes/db_operations/insert_pregnancy.php'); 
 include ('includes/app_treatment1.php');
}
/*if(isset($_POST['submit_Preg']) && $age <='3'){ 
 include ('includes/app_pedriatric.php');   
}*/
if(isset($_POST['submit_pediatric'])){ 
 include ('includes/db_operations/insert_pediatric.php');
}
if(isset($_POST['submit_pediatric'])){ 
 include ('includes/app_treatment1.php');
}

if(isset($_POST['submit_treatment1'])){ 
 include ('includes/db_operations/insert_treatment1.php');   
}

if(isset($_POST['submit_treatment2'])){ 
 include ('includes/db_operations/insert_treatment2.php');   
}
if(isset($_POST['submit_treatment3'])){ 
 include ('includes/db_operations/insert_treatment3.php');   
}
if(isset($_POST['submit_treatment3'])){ 
 include ('includes/app_adherence.php');   
}

if(isset($_GET['sendsample'])){ 
 include ('includes/db_operations/insert_sample.php'); 

    echo"<meta http-equiv=\"Refresh\" content=\"1; url=app.php?p\">";
}

//update form processes

if(isset($_POST['update_patD'])){ 
 include ('includes/db_operations/update_patient.php');   
}

if(isset($_GET['part_2'])){ 
 include ('includes/app_clinic_status_edit.php');   
}


if(isset($_POST['update_pediatric'])){ 
 include ('includes/db_operations/update_pediatric.php');   
}

if(isset($_POST['update_Preg'])){ 
 include ('includes/db_operations/update_pregnancy.php');   
}
if(isset($_POST['update_treatment1'])){ 
 include ('includes/db_operations/update_treatment1.php'); 
    include ('includes/app_treatment2_edit.php');
}

if(isset($_GET['back_treatment1'])){ 
    include ('includes/app_treatment1_edit.php');
}
if(isset($_GET['back_treatment2'])){ 
    include ('includes/app_treatment2_edit.php');
}
if(isset($_GET['back_treatment3'])){ 
    include ('includes/app_treatment3_edit.php');
}
  
if(isset($_POST['update_treatment2'])){ 
 include ('includes/db_operations/update_treatment2.php'); 
    include ('includes/app_treatment3_edit.php');
} 

if(isset($_POST['update_treatment3'])){ 
 include ('includes/db_operations/update_treatment3.php'); 
include ('includes/app_adherence_edit.php'); 
}
if(isset($_GET['back_adherence'])){ 
include ('includes/app_adherence_edit.php'); 
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
    
 <?php include ('includes/footer.php'); ?>   

<!-- Le javascript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="js/jquery-1.7.2.min.js"></script>

<script src="js/bootstrap.js"></script>
<script src="js/base.js"></script>
<SCRIPT language="javascript">

    $(function()
{
    $(document).on('click', '.btn-add', function(e)
    {
        e.preventDefault();

        var controlForm = $('.controls div:first'),
            currentEntry = $(this).parents('.entry:first'),
            newEntry = $(currentEntry.clone()).appendTo(controlForm);

        newEntry.find('input').val('');
        controlForm.find('.entry:not(:last) .btn-add')
            .removeClass('btn-add').addClass('btn-remove')
            .removeClass('btn-success').addClass('btn-danger')
            .html('<span class="glyphicon glyphicon-minus"></span>');
    }).on('click', '.btn-remove', function(e)
    {
		$(this).parents('.entry:first').remove();

		e.preventDefault();
		return false;
	});
});

</script>
<script src="js/jquery-1.12.4.js"></script><!--//jquery for clinic status datepicker-->
<script src="validation/lib/jquery.js"></script>
	 
 
<script src="js/jquery.min.js"></script> <!--/jquerry for patientdetails datepicker-->
<script src="dist/jquery.date-dropdowns.js"></script>
    <!--<script>
			$(function() {

                $("#example10").dateDropdowns({
                    submitFieldName: 'example10',
                    required: true
                });

				// Set all hidden fields to type text for the demo
				$('input[type="hidden"]').attr('type', 'text').attr('readonly', 'readonly').attr('name', 'dob');
			});
    </script>-->
    <script src="js/jquery-ui.js"></script><!--//jquery for clinic status datepicker-->
     <script>
  $( function() {
    $( "#datepicker" ).datepicker({
      changeMonth: true,
         maxDate: '0', 
      changeYear: true
    });
  } );
  </script>
     <script>
  $( function() {
    $( "#datepicker1" ).datepicker({
      changeMonth: true,
         maxDate: '0', 
      changeYear: true
    });
  } );
  </script>
 
  <script src="validation/dist/jquery.validate.js"></script>  
  </body>

</html>
