
    <script>
	/*$.validator.setDefaults({
		submitHandler: function() {
			alert("submitted!");
		}
	});*/

	$().ready(function() {
		// validate the comment form when it is submitted
		$("#commentForm").validate();

        $("#search_art").validate({
            
            rules: {
				
				id: {
					required: true,
					
				},
                
			},
			messages: {
				id: {
					required: "",
				},
				
			}
		});

		// validate signup form on keyup and submit
		$("#edit-profile").validate({
			rules: {
				firstname: "required",
				lastname: "required",
				art_id_num: {
					required: true,
					minlength: 7
				},
				password: {
					required: true,
					minlength: 5
				},
                art_clinic: {
					required: true,
					
				},
                gender: {
					required: true,
					
				},
				confirm_password: {
					required: true,
					minlength: 5,
					equalTo: "#password"
				},
				email: {
					required: true,
					email: true
				},
				topic: {
					required: "#newsletter:checked",
					minlength: 2
				},
				agree: "required"
			},
			messages: {
				firstname: "Please enter Client's firstname",
				lastname: "Please enter Client's lastname",
				art_id_num: {
					required: "Please enter ART Number",
					minlength: "The ART Number must consist of at least 7 characters"
					
				},
				art_clinic: {
					required: "Please Select Patient's ART Clinic"
				},
                gender: {
					required: "Please Select Gender"
				},
                password: {
					required: "Please provide a password",
					minlength: "Your password must be at least 5 characters long"
				},
				confirm_password: {
					required: "Please provide a password",
					minlength: "Your password must be at least 5 characters long",
					equalTo: "Please enter the same password as above"
				},
				email: "Please enter a valid email address",
				agree: "Please accept our policy",
				topic: "Please select at least 2 topics"
			}
		});

		// propose username by combining first- and lastname
		$("#username").focus(function() {
			var firstname = $("#firstname").val();
			var lastname = $("#lastname").val();
			if (firstname && lastname && !this.value) {
				this.value = firstname + "." + lastname;
			}
		});

		//code to hide topic selection, disable for demo
		var newsletter = $("#newsletter");
		// newsletter topics are optional, hide at first
		var inital = newsletter.is(":checked");
		var topics = $("#newsletter_topics")[inital ? "removeClass" : "addClass"]("gray");
		var topicInputs = topics.find("input").attr("disabled", !inital);
		// show when newsletter is checked
		newsletter.click(function() {
			topics[this.checked ? "removeClass" : "addClass"]("gray");
			topicInputs.attr("disabled", !this.checked);
		});
	});
	</script>

<table style="width:100%; background-color:#f8f7f7;  " >
    <tr><td>
<form id="search_art" action="app.php" method="post" style="float:right; padding:10px; height:20px;">
    <select name="id" id="id">
         <option value="">--select ARV Number--</option>
    <?php

   global $num_newforms; 

$form_creation=mysqli_query( $bd,"SELECT * FROM form_creation where status='Not Complete' or complete ='Rejected' ORDER BY `form_creation`.`3rdlineart_form_id` DESC "); 

$num_newforms = mysqli_num_rows ($form_creation);

    while ($row_form_creation=mysqli_fetch_array($form_creation)){
        
        $_3rdlineart_form_id =$row_form_creation['3rdlineart_form_id'];
        $clinician_id =$row_form_creation['clinician_id']; 
        $patient_id =$row_form_creation['patient_id'];
        
        $patient=mysqli_query( $bd,"SELECT * FROM patient where id='$patient_id' "); 
    $row_pat=mysqli_fetch_array($patient);
        
        $art_id_num =$row_pat['art_id_num'];
        $firstname =$row_pat['firstname'];
        $lastname =$row_pat['lastname'];
        $gender =$row_pat['gender'];
        $dob =$row_pat['dob'];
        $vl_sample_id =$row_pat['vl_sample_id'];
        
        
        echo '<option value="'.$patient_id.'">'.$art_id_num.'</a></option>';

        
    }
    ?>
</select>
   <button type="submit" name="search" class="btn btn-primary" style="padding:6px; font-size:110%; position:relative; top:-5px; color:#fff" >Complete Application</button>
    
    
											
										
											
</form>
        
<?php

global $pat_id;
$pat_id= $_GET['pat_id'];

 $patient=mysqli_query( $bd,"SELECT * FROM patient where id='$pat_id' "); 
    $row_pat=mysqli_fetch_array($patient);
        
        $pat_art_clinic =$row_pat['pat_art_clinic'];
        $art_id_num =$row_pat['art_id_num'];
        $firstname =$row_pat['firstname'];
        $lastname =$row_pat['lastname'];
        $gender =$row_pat['gender'];
        $dob =$row_pat['dob'];
        $vl_sample_id =$row_pat['vl_sample_id'];

 
    //calculating age of patient 
function GetPatAge($dob) 
{ 
        $dob=explode("/",$dob); 
        $curMonth = date("m");
        $curDay = date("j");
        $curYear = date("Y");
        $PATage = $curYear - $dob[2]; 
        if($curMonth<$dob[1] || ($curMonth==$dob[1] && $curDay<$dob[0])) 
                $PATage--; 
        return $PATage; 
}


$PATage =GetPatAge($dob);

?>

        <?php 

if(isset($_GET['pat_id'])){ 
 $pat_id= $_GET['pat_id'];
    
    
    
echo '
  <a href="#myModal" role="button"   data-toggle="modal" style="padding:6px; font-size:110%; position:relative; top:-5px;" >Edit Menu</a>
  
												
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
                                                       <a href="app.php?app_clin&pat_id=349" class="btn btn-warning"   style="width:90%;" >Current Clinic status</a>
                                                       </div>';
    
}
    $pediatric_section=mysqli_query( $bd,"SELECT * FROM  pediatric where pat_id='$pat_id' ");
        
    $if_exist_pediatric_section = mysqli_num_rows ($pediatric_section);

    if ($if_exist_pediatric_section !='0' && $PATage < 4 ){
        
        echo ' <div style="width:90%; background-color:#f2f2f2; border-radius: 5px; padding:5px; text-align:center; margin:5px;" >
                                                       <a href="app.php?back&part_2&pat_id='.$pat_id.'&g='.$gender.'&xx='.$PATage.'" class="btn btn-warning"  style="width:90%;" >Pediatric Section</a>
                                                       </div>';
    
}
    
    
$pregnancy=mysqli_query( $bd,"SELECT * FROM  pregnancy where pat_id='$pat_id' ");
        
    $if_exist_pregnancy = mysqli_num_rows ($pregnancy);

    if ($if_exist_pregnancy !='0' || $PATage > 10 && $gender=='Female'){
        
        echo ' <div style="width:90%; background-color:#f2f2f2; border-radius: 5px; padding:5px; text-align:center; margin:5px;" >
                                                       <a href="app.php?back&back_3&pat_id='.$pat_id.'&g='.$gender.'&xx='.$PATage.'" class="btn btn-warning"  style="width:90%;" >Pregnancy Section</a>
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

';
    
}
        


        ?>
        
      
        </td></tr>
    </table>
</form>

<form id="edit-profile" class="form-horizontal" action="app.php" method="post">

<input type="hidden" name="pat_id" value="<?php echo $pat_id ?>" />

<h2 style="background-color:#f8f7f7; text-align:center">Patient Details</h2>
    <hr style=" border: 1.5px solid #b49308;" />
    
     <table style="width:100%" border="0">
                          <tr>
                          <td>
                              <h4>ART Clinic</h4> 
                              </td>
                              <td>
                              <select name="pat_art_clinic" required id="art_clinic">
                              <option selected="selected" value="<?php echo $pat_art_clinic; ?>"><?php echo $pat_art_clinic; ?></option>
                              <option value="">select ART Clinic</option>
                              <?php
//clinic status info

$facility=mysqli_query( $bd,"SELECT * FROM facility"); 
    while ($row_facility=mysqli_fetch_array($facility)){
        
        $facility_name =$row_facility['facilityName'];
        
        echo '<option>'.$facility_name.'</option>';
       
    }
?>
                              </select>
                              
                        </td>
         </tr>
    </table>
    <hr >
                          <table style="width:100%" border="0">
                          <tr>
                          <td><h4>First Name</h4> 
                              
                        </td>
                          <td>
                              <input type="text" class="span4" id="firstname" name="firstname" value="<?php echo $firstname; ?>" required>
                          </td>    
                          <td><h4>Surname</h4> 									
</td>    
                          <td><span></span>												
                              <input type="text" class="span3" id="lastname" name="lastname" value="<?php echo $lastname; ?>"  required >
</td>    
                          </tr> 
                              <tr>
                          <td>
                             <h4>ART-ID Number</h4>
                        </td>
                          <td>
                              <input type="text" class="span4" id="art_id_num" value="<?php echo $art_id_num; ?>" name="art_id_num" required>
                          </td>    
                          <td>
                              <h4>Gender</h4>
</td>    
                          <td>
                         <select name="gender" required id="gender">
                             <option selected="selected"><?php echo $gender; ?></option>
                              <option value="">select gender</option>
                              <option>Male</option>
                              <option>Female</option>
                              </select>
                              
                        
</td>    
                          </tr> 
                          <tr>
                          <td>
                             <h4>Last VL sample-ID</h4>
                        </td>
                          <td>
                              <input type="text" class="span4" id="firstname" value="<?php echo $vl_sample_id; ?>" name="vl_sample_id">
                          </td>    
                          <td>
                              <h4>Date of Birth</h4>
</td>    
                          <td>
                              <input type="text" class="span4" name="dob" id="datepicker" required value="<?php echo $dob; ?>">
                             <!-- 
                              <div class="example">
                
                    <div id="example10"></div>
            </div>-->
       
   
<!--
                            
                              <input type="date" class="span3" id="firstname" value="" name="dob">
-->
</td>    
                          </tr> 
                              
                          </table>
    
            
                                                                                                                                                   <div class="form-actions">
                          <div class="span3">
               <button class="btn" style="padding:10px; font-size:180%"><a href="app.php?p">Back</a></button>                                                                                                                                    </div>                                                                                                                       <div class="span3"><!--
											<button type="submit" class="btn btn-primary" style="padding:10px; font-size:180%">Save</button> -->.
											
                                            </div>
                                            
                                            <div class="span3">
                                                
                                            <?php 
                                                if(isset($_GET['back'])){
                                                echo '<button type="submit" class="btn btn-success" style="padding:10px; font-size:180%" name="update_patD">Update</button> ';
                                                }
                                                else { 
                                                echo '<button type="submit" class="btn btn-success" style="padding:10px; font-size:180%" name="submit_patD">Next</button> '; }
                                                ?>    
											
                                            </div>
                          </div>
    
                           
</form>
