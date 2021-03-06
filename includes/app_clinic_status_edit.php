<script type="text/javascript">
	$(document).ready(function(){
        // $('#edit-profile').parsley(); 
		$('input[type="radio"]').click(function(){
			if($(this).attr("value")=="intr_Yes"){
				$(".box").not(".yes").hide();
				$(".yes").show();
			}
			if($(this).attr("value")=="intr_No"){
				$(".box").not(".no").hide();
				$(".no").show();
			}
		});
        if ($('input[id="art_interrup"]').attr("checked") == 'checked') {
            $(".yes").show();            
        } else {
             $(".yes").hide();            
        }        
	});

    $('body').keypress(function(e) {
        if (e.which == 13) {
            e.preventDefault();
            $('input[type="submit"]:last').click();
        }
    });

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
					required: "need this!",
				},
			}
		});

		// validate clinic staus form on keyup and submit
		$("#edit-profile").validate({
			rules: {
				who_stage: {
					required: false,
					
				},
				curr_who_stage: {
					required: false,
					
				},
				weight: {
					required: true,
                        range: [10, 250],

				},
				height: {
					required: true,
                        range: [30, 300],                        
				},

			},
			messages: {
				who_stage: {
                  required: false,
				},
				curr_who_stage: {
                  required: false,
				},
				weight: {
					required: "Curr Weight",
                        // min: "Under weight",
                        // max: "Over weight"					
				}, 
				height: {
					required: "Curr Height",
                        // min: "Under Height",
                        // max: "Over Height"					
				},
			}
		});
	});

</script>

<?php

global $pat_id;
if(isset($_GET['pat_id'])){ 
	$pat_id= $_GET['pat_id'];

}

$patient = new Patient($pat_id);
$client_name = $patient->fullname;

$current_clinical_status = mysqli_query( $bd,"SELECT * FROM current_clinical_status where patient_id='$pat_id' ");
$if_exist_current_clinical_status = mysqli_num_rows ($current_clinical_status);

while ($row_clinic_status = mysqli_fetch_array($current_clinical_status)){
	$who_stage = $row_clinic_status['who_stage'];
	$curr_who_stage = $row_clinic_status['curr_who_stage'];
	$weight = $row_clinic_status['weight'];
	$height = $row_clinic_status['height'];
	$art_interrup = $row_clinic_status['art_interrup'];
	$ol_6months = $row_clinic_status['ol_6months'];
	$sig_diarrhea_vom = $row_clinic_status['sig_diarrhea_vom'];
	$alco_drug_consump = $row_clinic_status['alco_drug_consump'];
	$trad_med = $row_clinic_status['trad_med'];
	$co_medi = $row_clinic_status['co_medi'];
	$other_curr_problem = $row_clinic_status['other_curr_problem'];

	if ($art_interrup=='Yes'){
		$art_interruption = mysqli_query( $bd,"SELECT * FROM art_interruption where patient_id='$pat_id' "); 
		$row_art_interruption=mysqli_fetch_array($art_interruption);
		$interupt_reason = $row_art_interruption['reason'];
		$interupt_date = $row_art_interruption['date'];
	}

	if ($ol_6months=='Yes'){
		$ol_6months_details = mysqli_query( $bd,"SELECT * FROM ol_6months_details where patient_id='$pat_id' "); 
		$row_ol_6months_details=mysqli_fetch_array($ol_6months_details);
		$ol_6months_dign = $row_ol_6months_details['ol_6months_dign'];
		$ol_6months_date = $row_ol_6months_details['ol_6months_date'];
	}
}

// side effects
$patient_side_effects=mysqli_query( $bd,"SELECT * FROM patient_side_effects where patient_id='$pat_id' "); 
$row_patient_side_effects=mysqli_fetch_array($patient_side_effects);

$PeripheralNeuropathy = $row_patient_side_effects['PeripheralNeuropathy'];
$Jaundice = $row_patient_side_effects['Jaundice'];
$Lipodystrophy = $row_patient_side_effects['Lipodystrophy'];
$KidneyFailure = $row_patient_side_effects['KidneyFailure'];
$Psychosis = $row_patient_side_effects['Psychosis'];
$Gynecomastia = $row_patient_side_effects['Gynecomastia'];
$Anemia = $row_patient_side_effects['Anemia'];
$other = $row_patient_side_effects['other'];

// side effects details 
$current_clinical_status_details=mysqli_query( $bd,"SELECT * FROM current_clinical_status_details where pat_id='$pat_id' "); 
$row_current_clinical_status_details=mysqli_fetch_array($current_clinical_status_details);

$sig_diarrhea_vom_details = $row_current_clinical_status_details['sig_diarrhea_vom_details'];
$alco_drug_consump_details = $row_current_clinical_status_details['alco_drug_consump_details'];
$trad_med_details = $row_current_clinical_status_details['trad_med_details'];
$co_medi_details = $row_current_clinical_status_details['co_medi_details'];
$other_curr_problem_details = $row_current_clinical_status_details['other_curr_problem_details'];

echo '<form id="edit-profile" class="form-horizontal" action="app.php?pat_id='.$pat_id.'&g='.$patient->gender.'&xx='.$patient->age.'" method="post">
	<h2 style="background-color:#f8f7f7; text-align:center">Current Clinic Status and history</h2>
	<hr style=" border: 1px solid #12c3f8;" />
	';                   
	?>
	<h3>Client Name: <strong><i style="background-color:#f8f7f7; color:red"><?php echo $client_name; ?></i></strong></h3>
	<input type="number" name="pat_id" value="<?php echo $pat_id; ?>" style="background-color:#fff; border:none; height:20px; color:#fff; position:relative; top:-300px;"  />

	<input type="text" name="dob" value="<?php echo $dob; ?>" style="background-color:#fff; border:none; height:20px; color:#fff; position:relative; top:-300px;" />
	<fieldset>
		<table style="width:100%" border="0"  style="cellpadding:10px; ">
			<tr>
				<td><h4>WHO stage at start of Treatment</h4> <br/></td>
				<td>
                    <input name="who_stage" id="who_stage" style="width:200px; height:50px;" value="<?php echo $who_stage ?>" placeholder="Number or Text">    
					<!-- <select name="who_stage" id="who_stage" style="width:180px;height:50px;" required>
						<option><?php echo $who_stage ?></option>
						<option>1</option>
						<option>2</option>
						<option>30</option>
						<option>4</option>
					</select>--> <br />
				</td>    

				<td>
					<h4>Current WHO stage (+defining condition)</h4>  <br/>
				</td>
				<td>
                    <input name="curr_who_stage" id="curr_who_stage" style="width:200px; height:50px;" value="<?php echo $curr_who_stage ?>" placeholder="Number or Text">    
					<!-- <select name="curr_who_stage" style="width:200px; height:50px;">
						<option><?php echo $curr_who_stage ?></option>
						<option>1</option>
						<option>2</option>
						<option>3</option>
						<option>4</option>
					</select>--> <br />

				</td>    

			</tr>
			<tr><td> <br/></td></tr>
			<tr>
				<td><h4>Curr Weight<label><span><i>*kg</i></span></label></h4></td>
				<td><input type="number" class="span4" id="weight" value="<?php echo $weight ?>" placeholder="kg" name="weight" required style="width:100px; height:50px; font-size:130%">
					<br/>
				</td>

				<td> <h4>Curr Height <label><span><i>*cm</i></span></label></h4></td>
				<td><input type="number" class="span4" id="height" value="<?php echo $height ?>" placeholder="cm" name="height" required style="width:100px; height:50px; font-size:130%">
					<br/>
				</td>

			</tr>
			<tr><td> <br/></td></tr>
		</table>
	</fieldset>

<fieldset>
	<h2 style="background-color:#f8f7f7; text-align:center">ART Interruptions</h2>
	<table style="width:100%" border="0" cellspacing="10px">
		<div class="box">
			<tr>
				<td>
					<h4>ART Interruptions?</h4>
<?php 
       if ($art_interrup=='Yes'){
                        echo '<div style="width:110px; float:left" class="radio_sty">
						<input type="radio" id="art_interrup" name="art_interrup" value="intr_Yes" checked="checked" >
						<label for="art_interrup">Yes</label>
						<div class="check">
						</div>
					</div>
					<div style="width:100px; float:left" class="radio_sty">
						<input type="radio" id="nart_interrup" name="art_interrup" value="intr_No" >
						<label for="nart_interrup">No</label>
						<div class="check">
						</div>
					</div>
				</td>
				<td></td>
			</tr>

			<tr class="yes box">
				<td> <p>Write ART interruption dates (or ranges)</p>
					<textarea type="text" class="span4" rows="6"  name="art_interrup_date" id="art_interrup_date">'.$interupt_date.'</textarea>
				</td>

				<td><p>Reason for interruption(s)</p>
					<textarea type="text" class="span4" rows="6"  name="art_interrup_reason" id="art_interup_reason">'.$interupt_reason.'</textarea>
				</td>
			</tr>
			';

		} 
		else {
			echo '<div style="width:110px; float:left" class="radio_sty">
			<input type="radio" id="art_interrup" name="art_interrup" value="intr_Yes"  >
			<label for="art_interrup">Yes</label>

			<div class="check">
			</div>
		</div>
		<div style="width:100px; float:left" class="radio_sty">
			<input type="radio" id="nart_interrup" name="art_interrup" value="intr_No" checked="checked">
			<label for="nart_interrup">No</label>
			<div class="check">
			</div>
		</div>
	</td>
	<td></td>
</tr>

<tr class="yes box">
	<td> <p>Write ART interruption dates (or ranges)</p>
		<textarea type="text" class="span4" rows="6"  name="art_interrup_date" value="">
		</textarea>
	</td>
	<td><p>Reason for interruption(s)</p>
		<textarea type="text" class="span4" rows="6"  name="art_interrup_reason" id="art_interupt_reason">
		</textarea>
	</td>
</tr>
';
}
?>

</div>
</table>
</fieldset>
<fieldset>
	<h2 style="background-color:#f8f7f7; text-align:center">History of serious side effects</h2>
	<table style="width:100%" border="0" cellspacing="10px">
		<tr>   
			<td>
				<h4 style="color:#fff">History of serious side effects</h4>
			</td>
			<td>
				<table>
					<?php
					$condition = [
					"PeripheralNeuropathy"=>'Perpheral Neuropathy',
					"Jaundice"=>'Jaundice',
					"Lipodystrophy"=>'Lipodystrophy',
					"KidneyFailure"=>'Kidney Failure',
					"Psychosis"=>'Psychosis',
					"Gynecomastia"=>'Gynecomastia',
					"Anemia"=>'Anemia'];
					$first = 1;
					foreach ($condition as $key => $value) {
						eval("\$yeschecked = (\$$key=='Yes')?'checked=\"checked\"':'';");
						$nochecked = ($yeschecked == '')?'checked="checked"':'';
						echo "<tr>        
						<td></td>
						<td> 
							<label class=\"control-label\">$value</label>
							<div style=\"width:110px; float:left\" class=\"radio_sty\">
								<input type=\"radio\" id=\"$key-yes\" name=\"$key\" value=\"Yes\" $yeschecked data-parsley-type=\"radio\" required>
								<label for=\"$key-yes\">Yes</label>    
								<div class=\"check\"></div>
							</div>
							<div style=\"width:100px; float:left\" class=\"radio_sty\">
								<input type=\"radio\" id=\"$key-no\" name=\"$key\" value=\"No\" $nochecked>
								<label for=\"$key-no\">No</label>
								<div class=\"check\"></div>
							</td>
						</tr>";
						if ($first == 1) {
							echo "</table>
						</td>";
						$first = 0;
					}
				}
				?>
				<tr>
					<td> </td>
					<td>
						<table>
							<tr>
								<td>Other</td>
								<td> <input type="text" class="span4" name ="sdef_other"  value="<?php echo $other ?>" ></td>
							</tr>
						</table>
					</td>
				</tr>

			</table>
		</fieldset>
		<script type="text/javascript">
			jQuery(document).ready(function ($) {
				$('input[name="ol_6months"]').on('click', function () {
					if ($(this).val() === 'Yes') {
						$('#datepicker1,#ol_6months_dign').prop("disabled", false);
					} else {
						$('#datepicker1,#ol_6months_dign').prop("disabled", "disabled");
					}
				});
			});
		</script>
		<fieldset>
			<table style="width:100%" border="0">

				<tr>
					<td>
						<label class="control-label">Ol in the last 6 month?</label>
						<?php 

						if ($ol_6months=='Yes'){

							echo '

							<div style="width:110px; float:left" class="radio_sty">
								<input type="radio" id="ol_6months-yes"  name="ol_6months" value="Yes" checked="checked">
								<label for="ol_6months-yes">Yes</label>
								<div class="check">
								</div>
							</div>
							<div style="width:100px; float:left" class="radio_sty">
								<input type="radio" id="ol_6months-no" name="ol_6months" value="No" >
								<label for="ol_6months-no">No</label>
								<div class="check">
								</div>
							</div> 


						</td>    
						<td>
							If yes, Date
						</td>
						<td>
							<input type="text" class="span4" id="datepicker1" name="ol_6months_date" value="'.$ol_6months_date.'">
						</td> 
					</tr>
					<tr>
						<td></td>
						<td>
							Diagnosis
						</td>
						<td>
							<textarea type="text" class="span4" id="ol_6months_dign" name="ol_6months_dign">'.$ol_6months_dign.'</textarea>
						</td> 

					</tr>


					';
				}        
				if ($ol_6months=='No') {
					echo '
					<div style="width:110px; float:left" class="radio_sty">
						<input type="radio" id="ol_6months-yes"  name="ol_6months" value="Yes" >
						<label for="ol_6months-yes">Yes</label>
						<div class="check">
						</div>
					</div>
					<div style="width:100px; float:left" class="radio_sty">
						<input type="radio" id="ol_6months-no" name="ol_6months" value="No" checked="checked">
						<label for="ol_6months-no">No</label>
						<div class="check">
						</div>
					</div> 
				</td>    
				<td>
					If yes, Date
				</td>
				<td>
					<input type="text" class="span4" id="datepicker1" name="ol_6months_date">
				</td> 
			</tr>
			<tr>
				<td></td>
				<td>
					Diagnosis
				</td>
				<td>
					<textarea type="text" class="span4" id="ol_6months_dign" name="ol_6months_dign"></textarea>
				</td> 

			</tr>
			';
		}
		?>

	</table>

	<script type="text/javascript">
		jQuery(document).ready(function ($) {
			$('input[name="sig_diarrhea_vom"]').on('click', function () {
				if ($(this).val() === 'Yes') {
					$('#sig_diarrhea_vom_details').prop("disabled", false);
				} else {
					$('#sig_diarrhea_vom_details').prop("disabled", "disabled");
				}
			});
		});

		jQuery(document).ready(function ($) {
			$('input[name="alco_drug_consump"]').on('click', function () {
				if ($(this).val() === 'Yes') {
					$('#alco_drug_consump_details').prop("disabled", false);
				} else {
					$('#alco_drug_consump_details').prop("disabled", "disabled");
				}
			});
		});   

		jQuery(document).ready(function ($) {
			$('input[name="trad_med"]').on('click', function () {
				if ($(this).val() === 'Yes') {
					$('#trad_med_details').prop("disabled", false);
				} else {
					$('#trad_med_details').prop("disabled", "disabled");
				}
			});
		});   


		jQuery(document).ready(function ($) {
			$('input[name="co_medi"]').on('click', function () {
				if ($(this).val() === 'Yes') {
					$('#co_medi_details').prop("disabled", false);
				} else {
					$('#co_medi_details').prop("disabled", "disabled");
				}
			});
		});    

		jQuery(document).ready(function ($) {
			$('input[name="other_curr_problem"]').on('click', function () {
				if ($(this).val() === 'Yes') {
					$('#other_curr_problem_details').prop("disabled", false);
				} else {
					$('#other_curr_problem_details').prop("disabled", "disabled");
				}
			});
		});    
	</script>


	<table style="width:100%" border="0">
		<?php
		$condition = [
		"sig_diarrhea_vom"=>"Significant diarrhea or vomiting?",
		"alco_drug_consump"=>"Alcohol or drug consumption?",
		"trad_med"=>"Traditional medicine?",
		"co_medi"=>"Current co-medications (Antiepileptic, Steroids, Warfarin, Statins)?",
		"other_curr_problem"=>"Other current clinical problems?"
		];

		foreach ($condition as $key => $value) {
			eval("\$yeschecked = (\$$key=='Yes')?'checked=\"checked\"':'';");
			$nochecked = ($yeschecked == '')?'checked="checked"':'';
			eval("\$detailval = \$$key"."_details;");
			eval("\$details = (\$$key=='Yes')?'value=\"$detailval\"':'';");
			echo "
			<tr>
				<td> 
					<label class=\"control-label\">$value</label>  
					<div style=\"width:200px; float:left\" class=\"radio_sty\">
						<input type=\"radio\" id=\"$key-yes\" name=\"$key\" value=\"Yes\" $yeschecked >
						<label for=\"$key-yes\">Yes</label>
						<div class=\"check\"></div>
					</div>

					<div style=\"width:100px; float:left\" class=\"radio_sty\">
						<input type=\"radio\" id=\"$key-no\" name=\"$key\" value=\"No\" $nochecked >
						<label for=\"$key-no\">No</label>
						<div class=\"check\"></div>
					</div> 
				</td>
				<td>
					Details
				</td>
				<td>
					<input type=\"text\" class=\"span4\" id=\"$key"."_details\" name=\"$key"."_details\" $details>
				</td> 
			</tr>
			";

		}
		?>              
	</table>
</fieldset>
<div class="form-actions">
	<div class="span3">
         <a href="app.php?back&part_1<?php echo '&pat_id='.$pat_id.'' ?>" class="btn" style="padding:10px; font-size:180%">Back</a>
    </div>
    <div class="span3">
        <?php include ('includes/app_edit_menu.php'); ?>            
    </div>
    <div class="span3">
            <button type="submit" class="btn btn-success" style="padding:10px; font-size:180%" name="update_clinicstatus">Next</button> 
    </div>
 </div>
</form>