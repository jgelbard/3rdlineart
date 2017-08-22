<?php 
 /*session_start();
 global $now,$expire,$user_id;
 if (isset($_SESSION['identification'])){

	
    global  $fullname;
       $fname= $_SESSION['username'];
       $lname= $_SESSION['lname'];
       $user_id=$_SESSION['identification'];
     
       $fullname =$_SESSION['name'];
       $phone= $_SESSION['phone'];
       $email= $_SESSION['email'];
       $facility = $_SESSION['art_clinic'];
     
	   $now = time(); 
	   $expire= $_SESSION['expire'];}
	   */
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
						
						<div class="pricing-plans plans-3" style="padding:40px 30px; background-color:#dddddd">
                            
                             <?php
  if(isset($_POST['search'])){
      
global $num_newforms;
  $facilityName = $_POST['facilityName'];
  $start_date = $_POST['start_date'];
  $stop_date = $_POST['stop_date'];
  
      if ($start_date =="" or $start_date ==""){
      $start_date = "01/01/1900";
      $stop_date = "01/01/2050";
      }
      
  $start_date = explode ('/',$start_date);
  $start_date = $start_date ['2'].'/'.$start_date ['1'].'/'.$start_date ['0'];
      
  $stop_date = explode ('/',$stop_date);
  $stop_date = $stop_date ['2'].'/'.$stop_date ['1'].'/'.$stop_date ['0'];
      
/*      echo $start_date. ' -'.$stop_date;*/
      
 //  	Number of applications received   
$form_creation=mysqli_query( $bd,"SELECT * FROM form_creation where status!='Not Complete' and date_created Between '$start_date' And '$stop_date' ORDER BY `form_creation`.`3rdlineart_form_id` DESC "); 
$num_newforms = mysqli_num_rows ($form_creation);
      
//Number of complete application forms received
      global $num_complete_forms; 
$complete_forms=mysqli_query( $bd,"SELECT * FROM form_creation where status!='Not Complete' and complete ='Yes' and date_created Between '$start_date' And '$stop_date' ORDER BY `form_creation`.`3rdlineart_form_id` DESC "); 
$num_complete_forms = mysqli_num_rows ($complete_forms);
      
//Number of applications found indicated for genotyping
global $num_forms_genotyping; 
$expert_review_consolidate1=mysqli_query( $bd,"SELECT * FROM expert_review_consolidate1 WHERE date_reviewed Between '$start_date' And '$stop_date' ORDER BY `expert_review_consolidate1`.`id` DESC "); 
$num_forms_genotyping = mysqli_num_rows ($expert_review_consolidate1);    

//sample
$sample=mysqli_query( $bd,"SELECT * FROM sample "); 
$num_samples = mysqli_num_rows ($sample);

 //sample with results
$results=mysqli_query( $bd,"SELECT * FROM app_results "); 
$num_results = mysqli_num_rows ($results);

global $num_PI_resistance; 
$expert_review_consolidate2_PI=mysqli_query( $bd,"SELECT * FROM expert_review_consolidate2 where pi_mutation ='Yes' "); 
$num_PI_resistance = mysqli_num_rows ($expert_review_consolidate2_PI);

global $num_switch_resistance; 
$expert_review_consolidate2_switch=mysqli_query( $bd,"SELECT * FROM expert_review_consolidate2 where switch ='SwitchYes' "); 
$num_switch_resistance = mysqli_num_rows ($expert_review_consolidate2_switch);
     
  }

else {

$form_creation=mysqli_query( $bd,"SELECT * FROM form_creation where status!='Not Complete' ORDER BY `form_creation`.`3rdlineart_form_id` DESC "); 
$num_newforms = mysqli_num_rows ($form_creation);

global $num_complete_forms; 
$complete_forms=mysqli_query( $bd,"SELECT * FROM form_creation where status!='Not Complete' and complete ='Yes' ORDER BY `form_creation`.`3rdlineart_form_id` DESC "); 
$num_complete_forms = mysqli_num_rows ($complete_forms);

global $num_forms_genotyping; 
$expert_review_consolidate1=mysqli_query( $bd,"SELECT * FROM expert_review_consolidate1 ORDER BY `expert_review_consolidate1`.`id` DESC "); 
$num_forms_genotyping = mysqli_num_rows ($expert_review_consolidate1);

//sample
$sample=mysqli_query( $bd,"SELECT * FROM sample "); 
$num_samples = mysqli_num_rows ($sample);

//sample with results
$results=mysqli_query( $bd,"SELECT * FROM app_results "); 
$num_results = mysqli_num_rows ($results);

global $num_PI_resistance; 
$expert_review_consolidate2_PI=mysqli_query( $bd,"SELECT * FROM expert_review_consolidate2 where pi_mutation ='Yes' "); 
$num_PI_resistance = mysqli_num_rows ($expert_review_consolidate2_PI);

global $num_switch_resistance; 
$expert_review_consolidate2_switch=mysqli_query( $bd,"SELECT * FROM expert_review_consolidate2 where switch ='SwitchYes' "); 
$num_switch_resistance = mysqli_num_rows ($expert_review_consolidate2_switch);

}
?>
 
                              <script>
  $( function() {
    $( "#datepicker6" ).datepicker({
      changeMonth: true,
      changeYear: true
    });
  } );
  </script>
                       <script>
  $( function() {
    $( "#datepicker7" ).datepicker({
      changeMonth: true,
      changeYear: true
    });
  } );
                           
                            $(function(){
        $("#to").datepicker({ dateFormat: 'dd/mm/yy' });
        $("#from").datepicker({ dateFormat: 'dd/mm/yy' }).bind("change",function(){
            var minValue = $(this).val();
            minValue = $.datepicker.parseDate("dd/mm/yy", minValue);
            minValue.setDate(minValue.getDate()+1);
            $("#to").datepicker( "option", "minDate", minValue );
        })
    });

  </script>
                           <!-- <input type="text" id="from" />
<input type="text" id="to" />
	-->
<h1 style="background-color:#f8f7f7; text-align:center; color:#000">3rd Line ART Expert Committee Malawi Report</h1>
                           <hr style=" border: 2px solid #000;" />
                          
                            <fieldset>
                                <form action="reports.php" method="post" style="float:left; padding:10px;">
                                <table style="width:50%; border-color:#f5f0f0" border="0" cellpadding="4px">
                          
                                <tr>
                                    <td>
                                         <label>Facility</label>
                                        
                                    </td>
                                    <td><select name="facilityName" >
                                     <option>--All--</option>
                                        
<?php
//clinic status info

$facility=mysqli_query( $bd,"SELECT * FROM facility"); 
    while ($row_facility=mysqli_fetch_array($facility)){
        
        $facility_name =$row_facility['facilityName'];
        
        echo '<option disabled>'.$facility_name.'</option>';
       
    }
?>
                                </select></td>
                                    </tr>
                                <tr>
                                    <td>
                                         <label>From:</label>
                                    </td>
                                    <td>
                                    <input type="text" name="start_date" id="from" value="<?php if(isset($_POST['search'])){ 
    echo $start_date;
    } ?>" style="font-size:130%;"/>
                                    </td>
                                    
                                    <td>
                                        <label>To:</label>
                                    </td>
                                    <td>
                                    <input type="text" name="stop_date" id="to" value="<?php if(isset($_POST['search'])){ 
    echo $stop_date;
    } ?>" style="font-size:130%;"/>
                                    </td>
                                    <td> <button type="submit" name="search" class="btn btn-revert" style="padding:6px; font-size:110%; position:relative; top:-5px; ">Submit</button></td>
                                    </tr>
                                    
                                </table>
                            
                                
                                </form>
                            </fieldset>
                            <fieldset>
                                
                                <ul style="color:#000; font-size:130%">
                                      <table style="width:65%; border-color:#f5f0f0" border="0.5" cellpadding="4px">
                          
                                <tr>
                                    <td> <u><b>Question</b></u></td>
                                    <td><u><b>Total Number</b></u></td>
                                    </tr>
                                 <tr>
                                    <td> <li>a.	Number of applications received </li></td>
                                    <td><?php echo '<strong><p style="color:#000; font-weight:600; font-size:112%">'. $num_newforms.'</p></strong>'; ?></td>
                                    </tr><tr>
                                    <td>  <li>b.	Number of complete application forms received </li></td>
                                    <td><?php echo '<strong><p style="color:#0dd62c; font-weight:600; font-size:112%">'. $num_complete_forms.'</p></strong>'; ?></td>
                                     </tr><tr>
                                    <td> <li>c.	Number of applications found indicated for genotyping </li></td>
                                    <td><?php echo '<strong><p style="color:#b96f0b; font-weight:600; font-size:112%">'. $num_forms_genotyping .'</p></strong>'; ?></td>
                                     </tr><tr>
                                    <td> <li>d.	Number of sample received for genotyping </li></td>
                                    <td><?php echo '<strong><p style="color:#1221ce; font-weight:600; font-size:112%">'. $num_samples .'</p></strong>'; ?></td>
                                     </tr><tr>
                                    <td>    <li>e.	Number of genotyping results received </li></td>
                                    <td><?php echo '<strong><p style="color:#fff500; font-weight:600; font-size:112%">'. $num_results .'</p></strong>'; ?></td>
                                     </tr><tr>
                                    <td> <li>f.	Number of samples with PI resistance  </li></td>
                                      <td><?php echo '<strong><p style="color:#1221ce; font-weight:600; font-size:112%">'. $num_PI_resistance .'</p></strong>'; ?></td>
                                    </tr><tr>
                                    <td> <li>g.	Number of patients recommended switch to 3rd Line treatment   </li>
                                    </td>
                                    <td><?php echo '<strong><p style="color:#e50d70; font-weight:600; font-size:112%">'. $num_switch_resistance .'</p></strong>'; ?></td>
                                          </tr></table>
                                </ul>
                           

                            </fieldset>
                            
				
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
<script src="js/jquery-1.12.4.js"></script><!--//jquery for clinic status datepicker-->
  
 
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
  </body>

</html>
