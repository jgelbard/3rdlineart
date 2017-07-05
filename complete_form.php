<?php 
 session_start();
 global $now,$expire,$user_id;
 if (isset($_SESSION['identification'])){

	
    global  $fullname;
       $fname= $_SESSION['username'];
      /* $lname= $_SESSION['lname'];*/
       $user_id=$_SESSION['identification'];
     
       $fullname =$_SESSION['name'];
       $phone= $_SESSION['phone'];
       $email= $_SESSION['email'];
       $facility = $_SESSION['art_clinic'];
     
	   $now = time(); 
	   $expire= $_SESSION['expire'];}
	   
	   ?>
<!DOCTYPE html>
<html lang="en">
  
<head>
    <meta charset="utf-8">
    <title>Application Form</title>
    
   <?php 
    
include ('includes/head.php');
    
    ?>
    
    <style>
    input[type="text"] {
    height: 25px; 
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
    </style>
</head>
<body>
<?php
    /*include ('includes/nav_main.php');
    include ('includes/nav_sub.php');*/
    
    ?>
    
<div class="main">
	
	<div class="main-inner">

	    <div class="container">
	 <?Php
/*
if (isset($_SESSION['identification'])){

       global  $fname;
       $fname= $_SESSION['username'];
       $lname= $_SESSION['lname'];
  
       
	  	   echo '<h4>  <span class="glyphicon glyphicon-user">Logged in: '. $fullname.'</span></h4>';
	   
	   	   } */
	   ?>  
	      <div class="row">
	      	
	      	<div class="span12">
	      		
	      		<div class="widget">
						
					<!--<div class="widget-header">
						<i class="icon-th-large"></i>
						<h3 style="text-align:right">3rd Line ART Application Form</h3>
                        
					</div>  /widget-header -->
					
					<div class="widget-content">
						
						<div class="pricing-plans plans-3" style="padding:0 70px">
							
                            
                            <?php
global $pat_id;
$pat_id= $_GET['pat_id'];


if(isset($_POST['submit_adher'])){ 
 include ('includes/db_operations/insert_adherence_lab.php');   
}

if(isset($_POST['update_adher'])){ 
 include ('includes/db_operations/update_adherence_lab.php'); 
}

if(isset($_POST['cancel_app'])){ 
    
    $sql_cancel_app = "DELETE FROM form_creation where patient_id =$pat_id";
    $sql_cancel_patient = "DELETE FROM patient where id =$pat_id";
    
    mysqli_query( $bd,$sql_cancel_patient);
    
    if (mysqli_query($sql_cancel_app, $bd)){
    echo '<div class="alert alert-warning">
                                                  <button type="button" class="close" data-dismiss="alert">&times;</button>
                                                  <p style="color:#f00"><strong>Yoo!</strong> You Cancelled the application. </p>
                           
                           </div>
   ';
    }
    
    
  echo '							
                        
                           <div class="form-actions">
      <form id="edit-profile" class="form-horizontal" action="logout.php" method="post">                                                                                                                                                <div class="span3">
               <button class="btn " style="padding:10px; font-size:180%">Logout</button>                                                                                                                                    </div>
              </form>                                                                                                                                     <div class="span3"><!--
											<button type="submit" class="btn btn-primary" style="padding:10px; font-size:180%">Save</button> -->.
											
                                            </div>
    <form id="edit-profile" class="form-horizontal" action="app.php?p" method="post">                                          
                                            <div class="span3">
											<button type="submit" class="btn btn-success" style="padding:10px; font-size:180%" name="complete_submit">New Application</button> 
                                            </div>
                                            </form>	 
                          </div>		
                           ';   
}

if(isset($_POST['save_app'])){ 
  echo '							
<div class="alert alert-success">
                                                  <button type="button" class="close" data-dismiss="alert">&times;</button>
                                                  <strong>Yoo!</strong> You Cancelled the application.
                           
                           </div>
                           ';   
}

if(!isset($_POST['complete_submit']) && !isset($_POST['cancel_app'])){ 
    
    
 include ('form_complete.php');     
    
    
 /*include ('includes/app_facility.php');   


 include ('includes/app_patientdetails.php');   


 include ('includes/app_clinic_status.php');   


 include ('includes/app_pregnancy.php');  */ 

    echo '              
  <div class="form-actions">
                                                                                                                                                   <div class="span4">
                           
                           
                             <a class="btn" href="app.php?back_adherence&pat_id='.$pat_id.'&g='.$gender.'&xx='.$age.'" style="padding:10px; margin:2px; font-size:180%">Back</a>        
                            
                
                <a href="#myModal" role="button" class="btn btn-primary"   data-toggle="modal" style="padding:10px; font-size:120%; float:left" >Edit Menu</a>
  
												
													<!--  Button to trigger modal 
                                                    <a href="#myModal" role="button" class="btn">Launch demo modal</a>
                                                     -->
                                                    <!-- Modal -->
                                                    <div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                      <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                        <h4 style="text-align:center">Edit Menu</h3>
                                                      </div>
                                                      <div class="modal-body"> 
                                                      
                                                      <div style="width:90%; background-color:#f2f2f2; border-radius: 5px; padding:5px; text-align:center; margin:5px;" >
                                                       <a href="#myModal" role="button" class="btn btn-warning"   data-toggle="modal" style="width:90%;" >Patient Details</a>
                                                       </div>
                                                       
                                                       
                                                       ';
                                                      
                                                       $current_clinical_status=mysqli_query( $bd,"SELECT * FROM current_clinical_status where patient_id='$pat_id' ");
        
    $if_exist_current_clinical_status = mysqli_num_rows ($current_clinical_status);

    if ($if_exist_current_clinical_status !='0'){
        
        echo '<div style="width:90%; background-color:#f2f2f2; border-radius: 5px; padding:5px; text-align:center; margin:5px;" >
                                                       <a href="app.php?back&part_2&pat_id='.$pat_id.'&g='.$gender.'&xx='.$age.'" class="btn btn-warning"   style="width:90%;" >Current Clinic status</a>
                                                       </div>';
    
}
    $pediatric_section=mysqli_query( $bd,"SELECT * FROM  pediatric where pat_id='$pat_id' ");
        
    $if_exist_pediatric_section = mysqli_num_rows ($pediatric_section);

    if ($if_exist_pediatric_section !='0' && $age < 4 ){
        
        echo ' <div style="width:90%; background-color:#f2f2f2; border-radius: 5px; padding:5px; text-align:center; margin:5px;" >
                                                       <a href="app.php?back&part_2&pat_id='.$pat_id.'&g='.$gender.'&xx='.$age.'" class="btn btn-warning"  style="width:90%;" >Pediatric Section</a>
                                                       </div>';
    
}
    
    
$pregnancy=mysqli_query( $bd,"SELECT * FROM  pregnancy where pat_id='$pat_id' ");
        
    $if_exist_pregnancy = mysqli_num_rows ($pregnancy);

    if ($if_exist_pregnancy !='0' || $age > 10 && $gender=='Female'){
        
        echo ' <div style="width:90%; background-color:#f2f2f2; border-radius: 5px; padding:5px; text-align:center; margin:5px;" >
                                                       <a href="app.php?back&back_3&pat_id='.$pat_id.'&g='.$gender.'&xx='.$age.'" class="btn btn-warning"  style="width:90%;" >Pregnancy Section</a>
                                                       </div>';
    
}
   $treatment_history=mysqli_query( $bd,"SELECT * FROM  treatment_history where pat_id='$pat_id' ");
        
    $if_exist_treatment_history = mysqli_num_rows ($treatment_history);

    if ($if_exist_treatment_history !='0'){
        
        echo ' <div style="width:90%; background-color:#f2f2f2; border-radius: 5px; padding:5px; text-align:center; margin:5px;" >
                                                      <a href="app.php?back&back_treatment1&pat_id='.$pat_id.'" class="btn btn-warning"   style="width:90%;" >ART Treatment</a>
                                                       </div>';
    
}
     $tb_treat=mysqli_query( $bd,"SELECT * FROM  tb_treat where pat_id='$pat_id' ");
        
    $if_exist_tb_treat = mysqli_num_rows ($tb_treat);

    if ($if_exist_tb_treat !='0'){
        
        echo ' <div style="width:90%; background-color:#f2f2f2; border-radius: 5px; padding:5px; text-align:center; margin:5px;" >
                                                       <a href="app.php?back&back_treatment2&pat_id='.$pat_id.'" class="btn btn-warning"   style="width:90%;" >TB Treatment</a>
                                                       </div>';
    
}
   
 echo '                                     
                                                      </div>
                                                      <div class="modal-footer">
                                                        <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
                                                       
                                                      </div>
                                                    </div>

                
                </div>
                
               
                                                                                                                        
                                          
                                            <div class="span4">
                                            <form id="edit-profile" class="form-horizontal" action="complete_form.php?pat_id='.$pat_id.'" method="post">      
											<button type="submit" class="btn btn-danger" style="padding:10px; font-size:120%; float:right" name="cancel_app">Cancel Application</button> 
                                             </form>	
                                            </div>
                          </div>				
                           
                            
                                         
  <div class="form-actions">
    <form id="edit-profile" class="form-horizontal" action="complete_form.php?pat_id='.$pat_id.'" method="post">                
                                            <div class="span10" align="center">
											<button type="submit" class="btn btn-success" style="padding:10px; font-size:150%" name="complete_submit">Submit Application</button> 
                                            </div>
                                             </form>
                          </div>				
    
                           ';
    
}



if(isset($_POST['complete_submit'])){ 
    
$sql_form_creation = "UPDATE form_creation ".
       "SET status='Complete'".
       "WHERE patient_id='$pat_id'" ;

mysqli_select_db('3rdlineart_db');
$form_submited = mysqli_query( $bd , $sql_form_creation);    
    
    echo '							
<div class="alert alert-success">
                                                  <button type="button" class="close" data-dismiss="alert">&times;</button>
                                                  <strong>Success!</strong> You have submitted the application.
                           
                           </div>
                           
                            
                                                 
  <div class="form-actions">
      <form id="edit-profile" class="form-horizontal" action="logout.php" method="post">                                                                                                                                                <div class="span3">
               <button class="btn " style="padding:10px; font-size:180%">Logout</button>                                                                                                                                    </div>
              </form>                                                                                                                                     <div class="span3"><!--
											<button type="submit" class="btn btn-primary" style="padding:10px; font-size:180%">Save</button> -->.
											
                                            </div>
    <form id="edit-profile" class="form-horizontal" action="app.php?p" method="post">                                          
                                            <div class="span3">
											<button type="submit" class="btn btn-success" style="padding:10px; font-size:180%" name="complete_submit">New Application</button> 
                                            </div>
                                            </form>	 
                          </div>				
                             
                            ';

    
   $receiver ='3rdlineart@lighthouse.org.mw';
   $to = $receiver;
   $subject = "New 3rd Line ART Application";
   $message = '<p>Dear 3<sup>rd</sup> Line ART Secretary,</p>
<p>&nbsp;</p>
<p>You have a new 3<sup>rd</sup> Line ART Expert committee application form from '.$facility.'.</p>
<p>Kindly check its completeness and do following the SOP.</p>
<p>&nbsp;</p>
<p>Regards</p>
<p>System email Notification &nbsp;</p>'; 
   $header = "From:3rdlineart@lighthouse.org.mw\r\n";
   $header .= "Bcc:dumi_ndhlovu@lighthouse.org.mw\r\n";
   $header .= "MIME-Version: 1.0\r\n";
   $header .= "Content-type: text/html\r\n";
   $retval = mail ($to,$subject,$message,$header);
 
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
<script src="js/jquery-1.7.2.min.js"></script>

<script src="js/bootstrap.js"></script>
<script src="js/base.js"></script>

  </body>

</html>
