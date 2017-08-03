<script>
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
<?php echo "id".$clinicianID; ?>
<table style="width:100%; background-color:#f8f7f7;  " >
	<tr><td>
		<form id="search_art" action="app.php" method="post" style="float:right; padding:10px; height:20px;">
			<select name="id" id="id">
				<option value="">--select ARV Number--</option>
				<?php

				global $num_newforms; 

				$form_creation=mysqli_query( $bd,"SELECT * FROM form_creation where (status='Not Complete' or complete ='Rejected') and clinician_id='$clinicianID' ORDER BY `form_creation`.`3rdlineart_form_id` DESC "); 

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
			<button type="submit" name="search" class="btn btn-primary" style="padding:6px; font-size:110%; position:relative; top:-5px; color:#fff">Complete Application</button>
		</form>
	</td></tr>
</table>
</form>
<form id="edit-profile" class="form-horizontal" action="app.php" method="post">

	<h2 style="background-color:#f8f7f7; text-align:center">Patient Details</h2>
	<hr style=" border: 1.5px solid #b49308;" />

	<table style="width:100%" border="0">
		<tr>
			<td>
				<h4>ART Clinic</h4> 
			</td>
			<td>
				<select name="pat_art_clinic" required id="art_clinic">
					<option selected="selected" value="">select ART Clinic</option>
					<?php
					// clinic status info
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
				<input type="text" class="span4" id="firstname" name="firstname" required>
			</td>    
			<td><h4>Surname</h4> 									
			</td>    
			<td><span></span>												
				<input type="text" class="span3" id="lastname" name="lastname" required >
			</td>    
		</tr> 
		<tr>
			<td>
				<h4>ART-ID Number</h4>
			</td>
			<td>
				<input type="text" class="span4" id="art_id_num" value="" name="art_id_num" required>
			</td>    
			<td>
				<h4>Gender</h4>
			</td>    
			<td>
				<select name="gender" required id="gender">
					<option selected="selected" value="">select gender</option>
					<option>Male</option>
					<option>Female</option>
				</select>
			</td>    
		</tr> 
		<tr>
			<td>
				<h4>Last VL sample-ID</h4><label><i>(optional)</i></label>
			</td>
			<td>
				<input type="text" class="span4" id="vl_sample_id" value="" name="vl_sample_id">
			</td>    
			<td>
				<h4>Date of Birth</h4><label><i>(dd/mm/yyyy)</i></label>
			</td>    
			<td>
				<input type="text" class="span4" name="dob" id="datepicker">
			</td>    
		</tr> 

	</table>


	<div class="form-actions">
		<div class="span3">
			<a class="btn" href="app.php?p" style="padding:10px; font-size:180%">Back</a>
		</div>
		<div class="span3">
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
