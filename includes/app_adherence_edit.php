<h2 style="background-color:#f8f7f7; text-align:center"> ART Adherence</h2>

<?php 

global $pat_id;
$pat_id= $_GET['pat_id'];
/*
echo $pat_id;
*/

global $location;
if(isset($_POST['submit_clinicstatus'])){ 
	$location ="app.php";  
}

else {
	$location ="complete_form.php";  
}

$patient=mysqli_query( $bd,"SELECT * FROM patient where id='$pat_id' "); 
$row_pat=mysqli_fetch_array($patient);

$art_id_num =$row_pat['art_id_num'];
$firstname =$row_pat['firstname'];
$lastname =$row_pat['lastname'];
$gender =$row_pat['gender'];
$dob =$row_pat['dob'];
$vl_sample_id =$row_pat['vl_sample_id'];

$client_name = $firstname.' '.$lastname;


//adherence
$adherence = mysqli_query( $bd,"SELECT * FROM adherence where pat_id='$pat_id' "); 
$row_adherence = mysqli_fetch_array($adherence);

$scheduled_visit_date1 = $row_adherence['scheduled_visit_date1'];
$actual_visit_date1 = $row_adherence['actual_visit_date1'];
$pill_count1 = $row_adherence['pill_count1'];

$scheduled_visit_date2 = $row_adherence['scheduled_visit_date2'];
$actual_visit_date2 = $row_adherence['actual_visit_date2'];
$pill_count2 = $row_adherence['pill_count2'];

$scheduled_visit_date3 = $row_adherence['scheduled_visit_date3'];
$actual_visit_date3 = $row_adherence['actual_visit_date3'];
$pill_count3 = $row_adherence['pill_count3'];


//adherence_questions
$adherence_questions = mysqli_query( $bd,"SELECT * FROM adherence_questions where pat_id='$pat_id' "); 
$row_adherence_questions = mysqli_fetch_array($adherence_questions);

$ever_forget_2_take_meds = $row_adherence_questions['ever_forget_2_take_meds'];
$careless_taking_meds = $row_adherence_questions['careless_taking_meds'];
$stop_taking_meds = $row_adherence_questions['stop_taking_meds'];
$not_taken_meds = $row_adherence_questions['not_taken_meds'];
$taken_meds_past_weekend = $row_adherence_questions['taken_meds_past_weekend'];
$_3months_days_not_taken_meds = $row_adherence_questions['3months_days_not_taken_meds'];


  //lab
$lab=mysqli_query( $bd,"SELECT * FROM lab where pat_id='$pat_id' "); 
$row_lab=mysqli_fetch_array($lab);

$creatinine = $row_lab['creatinine'];
$hb = $row_lab['hb'];
$alt = $row_lab['alt'];
$bilirubin = $row_lab['bilirubin'];
$hepbag = $row_lab['hepbag'];


echo '
<form id="edit-profile" class="form-horizontal" action="'.$location.'?pat_id='.$pat_id.'" method="post" >

	';
	?> 

	<h3>Client Name: <strong><i style="color:red"><?php echo $client_name; ?></i></strong></h3>

	<input type="hidden" name="pat_id" value="<?php echo $pat_id; ?>"  /> 
	<input type="hidden" name="dob" value="<?php echo $dob; ?>" /> 
	<script>
		$( function() {
			$( "#datepickersVis_Date1" ).datepicker({
				changeMonth: true,
				maxDate: '0',
				beforeShow : function()
				{
					jQuery( this ).datepicker('option','maxDate', jQuery('#datepickeraVis_Date12').val() );
				},
				changeYear: true
			});
		} );
	</script>     
	<script>
		$( function() {
			$( "#datepickeraVis_Date12" ).datepicker({
				changeMonth: true,
				maxDate: '0',
				beforeShow : function()
				{
					jQuery( this ).datepicker('option','minDate', jQuery('#datepickeraVis_Date1').val() );
				},
				changeYear: true
			});
		} );
	</script>     
	<script>
		$( function() {
			$( "#datepickersVis_Date2" ).datepicker({
				changeMonth: true,
				maxDate: '0', 
				beforeShow : function()
				{
					jQuery( this ).datepicker('option','maxDate', jQuery('#datepickeraVis_Date22').val() );
				},
				changeYear: true
			});
		} );
	</script>     
	<script>
		$( function() {
			$( "#datepickeraVis_Date22" ).datepicker({
				changeMonth: true,
				maxDate: '0', 
				beforeShow : function()
				{
					jQuery( this ).datepicker('option','minDate', jQuery('#datepickeraVis_Date2').val() );
				},
				changeYear: true
			});
		} );
	</script>     
	<script>
		$( function() {
			$( "#datepickersVis_Date3" ).datepicker({
				changeMonth: true,
				beforeShow : function()
				{
					jQuery( this ).datepicker('option','maxDate', jQuery('#datepickeraVis_Date32').val() );
				},
				changeYear: true
			});
		} );
	</script>     
	<script>
		$( function() {
			$( "#datepickeraVis_Date32" ).datepicker({
				changeMonth: true,
				beforeShow : function()
				{
					jQuery( this ).datepicker('option','minDate', jQuery('#datepickeraVis_Date3').val() );
				},
				changeYear: true
			});
		} );
	</script> 

	<script>


		$().ready(function() {
            // $("#edit-profile").parsley();

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

		// validate clinic staus form on keyup and submit
		$("#edit-profile").validate({
			rules: {
				datepickersVis_Date1: "required",
				datepickersVis_Date2: "required",
				datepickersVis_Date3: "required",
				lastname: "required",
				
				who_stage: {
					required: true,
					
				},
				datepickersVis_Date1: {
					required: true,
					
				},
				pill_count1: {
					required: true,
					minlength: 1,
					maxlength: 5
				},
				height: {
					required: true,
					minlength: 3,
					maxlength: 3
				},
				
			},
			messages: {
				datepickersVis_Date1: "Please enter Client's Visit date",
				datepickersVis_Date12: "Please enter Client's Visit date",
				datepickersVis_Date2: "Please enter Client's Visit date",
				datepickersVis_Date22: "Please enter Client's Visit date",
				datepickersVis_Date3: "Please enter Client's Visit date",
				datepickersVis_Date32: "Please enter Client's Visit date",
				lastname: "Please enter Client's lastname",
				
				datepickersVis_Date1: {
					required: "Please Select WHO stage"
				},
				curr_who_stage: {
					required: "Please Select Current WHO stage"
				},
				pill_count1: {
					required: "Pill Count %",
					minlength: "Under Pill Count %",
					maxlength: "Over Pill Count %"
					
				}, 
				height: {
					required: "Pill Count %",
					minlength: "Under Pill Count %",
					maxlength: "Over Pill Count %"
					
				},
				
			}
		});

		
	});
*/
	
</script>
<fieldset>
	<h3>Adherence Section <i>(Patient adherence in the last 3 visits)</i></h3>
	<table style="width:100%" border="0">
		<tbody>
			<?php     
			for($i=1; $i<=3; $i++) {
				eval("\$scheduled_visit_date = !empty ( \$scheduled_visit_date$i) ? \$scheduled_visit_date$i : '';");
				eval("\$actual_visit_date = !empty ( \$actual_visit_date$i) ? \$actual_visit_date$i : '';");
				eval("\$pill_count = !empty ( \$pill_count$i) ? \$pill_count$i : '';");
				echo "date is ".$scheduled_visit_date;
        $svd = $scheduled_visit_date; // if I dont do this, the code doesn't work
        echo "<tr>
        <td> <h4>Schedule visit date:</h4><label><i>(dd/mm/yyyy)</i></label> </td>
        <td> <input type=\"text\" name=\"scheduled_visit_date$i\" id=\"datepickersVis_Date$i\" required value=\"$svd\" onchange=\"updatedate();\"/> </td>
        <td> <h4>Actual visit date </h4><label><i>(dd/mm/yyyy)</i></td>
        <td> <input type=\"text\" name=\"actual_visit_date$i\" id=\"datepickeraVis_Date$i"."2\" required value=\"$actual_visit_date\" required /> </td>
        <td> <h4>Pill Count (%) </h4> </td>
        <td> <input type=\"number\" name=\"pill_count$i\" id=\"pill_count$i\" style=\"width:80px; height:50px;\"  value=\"$pill_count\" required /> </td>
    </tr>";
}
?>
</tbody>
</table>
</fieldset>
<hr style=" border: 1px solid #cbe509;" />
<fieldset>
	<h3>Adherence questions <i>(circle answer)</i></h3>
	
	<table>
<?php
    $quests = ["ever_forget_2_take_meds"=>">Do you ever forget to take your medicine?",
    "careless_taking_meds"=>"Are you careless at times about taking your medicine?",
    "stop_taking_meds"=>"Sometimes if you feel worse, do you stop taking your medicine?",
    "not_taken_meds"=>"Thinking about the last week. How often have you not taken your medicine?",
    "taken_meds_past_weekend"=>"Did you not take any of your medicine over the past weekend?", 
    "3months_days_not_taken_meds"=>"Over the past 3 months, how many days have you not taken any medicine at all?"
    ];
?>
		<tr>     <td><h4>Do you ever forget to take your medicine?</h4></td>    
			<td> 
				
				<div style="width:110px; float:left" class="radio_sty">
					<input type="radio" id="f-ever_forget_2_take_meds"   name="ever_forget_2_take_meds" value="Yes" <?php 

					if (!empty ($ever_forget_2_take_meds)) {
						if ($ever_forget_2_take_meds =='Yes') 
							{ echo  'checked="checked"'; } 
					} ?> required="">
					<label for="f-ever_forget_2_take_meds">Yes</label>
					
					<div class="check">
					</div>
				</div>
				<div style="width:100px; float:left" class="radio_sty">
					<input type="radio" id="n-ever_forget_2_take_meds" name="ever_forget_2_take_meds" value="No" <?php 

					if (!empty ($ever_forget_2_take_meds)) { if ($ever_forget_2_take_meds =='No') { echo  'checked="checked"';} } ?> >
					<label for="n-ever_forget_2_take_meds">No</label>
					
					<div class="check">
					</div>
				</div>
			</td>
		</tr>
		<tr>     <td><h4>Are you careless at times about taking your medicine?</h4></td>    
			<td> 
				
				
				<div style="width:110px; float:left" class="radio_sty">
					<input type="radio" id="f-careless_taking_meds"   name="careless_taking_meds" value="Yes" <?php 

					if (!empty ($careless_taking_meds)) { if ($careless_taking_meds =='Yes') { echo  'checked="checked"';} } ?> required="">
					<label for="f-careless_taking_meds">Yes</label>
					
					<div class="check">
					</div>
				</div>
				<div style="width:100px; float:left" class="radio_sty">
					<input type="radio" id="n-careless_taking_meds" name="careless_taking_meds" value="No" <?php 

					if (!empty ($careless_taking_meds)) { if ($careless_taking_meds =='No') { echo  'checked="checked"';} } ?> >
					<label for="n-careless_taking_meds">No</label>
					
					<div class="check">
					</div>
				</div>
			</td>
		</tr>
		<tr>     <td><h4>Sometimes if you feel worse, do you stop taking your medicine?</h4></td>    
			<td> 
				
				<div style="width:110px; float:left" class="radio_sty">
					<input type="radio" id="f-stop_taking_meds"    name="stop_taking_meds" value="Yes" <?php 

					if (!empty ($stop_taking_meds)) { if ($stop_taking_meds =='Yes') { echo  'checked="checked"';} } ?> required>
					<label for="f-stop_taking_meds">Yes</label>
					
					<div class="check">
					</div>
				</div>
				<div style="width:100px; float:left" class="radio_sty">
					<input type="radio" id="n-stop_taking_meds" name="stop_taking_meds" value="No" <?php 

					if (!empty ($stop_taking_meds)) { if ($stop_taking_meds =='No') { echo  'checked="checked"';} } ?>  >
					<label for="n-stop_taking_meds">No</label>
					
					<div class="check">
					</div>
				</div>
			</td>
		</tr>
		<tr>     <td><h4>Thinking about the last week. How often have you not taken your medicine</h4></td>    
			<td>
				<div style="width:110px; float:left" class="radio_sty">
					<input type="radio" id="f-not_taken_meds"    name="not_taken_meds" value="Never"  <?php 

					if (!empty ($not_taken_meds)) { if ($not_taken_meds =='Never') { echo  'checked="checked"';} } ?> required>
					<label for="f-not_taken_meds">Never</label>
					
					<div class="check">
					</div>
				</div>
				<div style="width:140px; float:left" class="radio_sty">
					<input type="radio" id="n-not_taken_meds" name="not_taken_meds" value="1-2"  <?php 

					if (!empty ($not_taken_meds)) { if ($not_taken_meds =='1-2') { echo  'checked="checked"';} } ?> >
					<label for="n-not_taken_meds">1-2</label>
					
					<div class="check">
					</div>
				</div> 
				<div style="width:140px; float:left" class="radio_sty">
					<input type="radio" id="3-not_taken_meds"    name="not_taken_meds" value="3-5"  <?php 

					if (!empty ($not_taken_meds)) { if ($not_taken_meds =='3-5') { echo  'checked="checked"';} } ?> required>
					<label for="3-not_taken_meds">3-5</label>
					
					<div class="check">
					</div>
				</div>
				<div style="width:100px; float:left" class="radio_sty">
					<input type="radio" id="5-not_taken_meds" name="not_taken_meds" value="> 5"  <?php 

					if (!empty ($not_taken_meds)) { if ($not_taken_meds =='> 5') { echo  'checked="checked"';} } ?> >
					<label for="5-not_taken_meds">>5</label>
					
					<div class="check">
					</div>
				</div>
				
			</td>
		</tr>
		<tr>     <td><h4>Did you not take any of your medicine over the past weekend?</h4></td>    
			<td> 
				<div style="width:110px; float:left" class="radio_sty">
					<input type="radio" id="f-taken_meds_past_weekend"    name="taken_meds_past_weekend" value="Yes"  <?php 

					if (!empty ($taken_meds_past_weekend)) { if ($taken_meds_past_weekend =='Yes') { echo  'checked="checked"';} } ?> required>
					<label for="f-taken_meds_past_weekend">Yes</label>
					
					<div class="check">
					</div>
				</div>
				<div style="width:100px; float:left" class="radio_sty">
					<input type="radio" id="n-taken_meds_past_weekend" name="taken_meds_past_weekend" value="No"  <?php 

					if (!empty ($taken_meds_past_weekend)) { if ($taken_meds_past_weekend =='No') { echo  'checked="checked"';} } ?> >
					<label for="n-taken_meds_past_weekend">No</label>
					
					<div class="check">
					</div>
				</div>
				
			</td>
		</tr>
		<tr>     <td><h4>Over the past 3 months, how many days have you not taken any medicine at all?</h4></td>    
			<td> 
				
				<div style="width:150px; float:left" class="radio_sty">
					<input type="radio" id="f-3months_days_not_taken_meds"    name="3months_days_not_taken_meds"  value="< 2days"   <?php 

					if (!empty ($_3months_days_not_taken_meds)) { if ($_3months_days_not_taken_meds =='< 2days') { echo  'checked="checked"';} } ?> required>
					<label for="f-3months_days_not_taken_meds"><2days</label>
					
					<div class="check">
					</div>
				</div>
				<div style="width:170px; float:left" class="radio_sty">
					<input type="radio" id="n-3months_days_not_taken_meds" name="3months_days_not_taken_meds" value="> 2days"   <?php 

					if (!empty ($_3months_days_not_taken_meds)) { if ($_3months_days_not_taken_meds =='> 2days') { echo  'checked="checked"';} } ?> >
					<label for="n-3months_days_not_taken_meds">>2 days </label>
					
					<div class="check">
					</div>
				</div>
				
			</td>
		</tr>
		
		
		
	</table>
</fieldset>
<fieldset>
	<h3>Laboratory Section <i>(compulsory)</i></h3>
	<table style="width:100%" border="0">
		<tbody>
			<tr>
				
				<td><h4> Hb:</h4> </td>
				<td> <label><i>*g/dl</i></label><input type="text" name="hb" value="<?php 

					if (!empty ($hb)) { echo $hb; } ?> "  />  </td>
				</tr>
				<tr>
					<td><h4> ALT: </h4></td>
					<td> <label><i>*U/l</i></label><input type="text" name="alt" value="<?php 

						if (!empty ( $alt)) { echo  $alt; } ?> "   /> </td>
					</tr>
					<tr>
						
						<td> <h4>Bilirubin: </h4></td>
						<td><label><i>*mg/dl</i></label> <input type="text" name="bilirubin" value="<?php 

							if (!empty ($bilirubin)) { echo $bilirubin; } ?> "  /> </td>
							
						</tr>   
						<tr>
							<td> <h4>Creatinine :</h4> </td>
							<td> <label><i>*mg/dl</i></label><input type="text" name="creatinine" value="<?php 

								if (!empty ( $creatinine)) { echo  $creatinine; } ?> "   /> </td>
							</tr>
							<tr>
								<td><h4>HepB Ag</h4></td>
								<td>
									<div style="width:120px; float:left" class="radio_sty">
										<input type="radio" id="f-hepbag"     name="hepbag" value="negative"  <?php 

										if (!empty ($hepbag)) { if ($hepbag =='negative') { echo  'checked="checked"';} } ?> required>
										<label for="f-hepbag">Neg</label>
										
										<div class="check">
										</div>
									</div>
									<div style="width:140px; float:left" class="radio_sty">
										<input type="radio" id="n-hepbag" name="hepbag" value="positive"  <?php 

										if (!empty ($hepbag)) { if ($hepbag =='positive') { echo  'checked="checked"';} } ?>  >
										<label for="n-hepbag">Pos</label>
										
										<div class="check">
										</div>
									</div> 
									<div style="width:220px; float:left" class="radio_sty">
										<input type="radio" id="3-hepbag"    name="hepbag" value="Not tested"  <?php 

										if (!empty ($hepbag)) { if ($hepbag =='Not tested') { echo  'checked="checked"';} } ?> >
										<label for="3-hepbag">Not tested</label>
										
										<div class="check">
										</div>
									</div>  
									
								</td>
								
							</tr> 
						</tbody>
					</table>
				</fieldset>
				<hr />
				<h3>Important Note:</h3>
				<div class="text"> <p style="color:#f00">While this form is processed keep the patient on his current treatment regimen. It may still confer some benefit to be patient and resistance testing can only be done while patient is on treatment</p> </div>
				
				<div class="form-actions">
					<div class="span3">
						<?php include ('includes/app_edit_first.php'); ?>
						<a class="btn" href="app.php?back&back_treatment3<?php echo '&pat_id='.$pat_id.'&g='.$gender.'&xx='.$age.'' ?>" style="padding:10px; font-size:180%">Back</a>                                                                                                                                      </div> 
						<div class="span3">
                           <?php include ('includes/app_edit_menu.php'); ?>							
						</div>
						
						<div class="span3">
							<button type="submit" class="btn btn-success" style="padding:10px; font-size:180%" name="update_adher">Next</button> 
						</div>
					</div>
					
				</form>

				<script type="text/javascript" charset="utf-8">   

					function updatedate(){ 
						
						datepicker7 = document.getElementById("datepicker7").value;         
						document.getElementById("datepicker8").value = datepicker7;  
					}
					function updatedate2(){ 
						datepicker9 = document.getElementById("datepicker9").value;         
						document.getElementById("datepicker10").value = datepicker9; 
						
					} 
					function updatedate3(){ 
						datepicker11 = document.getElementById("datepicker11").value;         
						document.getElementById("datepicker12").value = datepicker11; 
						
					} 
					
				} 
			</script>