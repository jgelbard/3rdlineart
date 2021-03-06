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

		// validate clinic staus form on keyup and submit
		$("#edit-profile").validate({
			rules: {
				firstname: "required",
				lastname: "required",
/*
				art_drug1: {
					required: true,
					
				},
				art_drug2: {
					required: true,
					
				},
				art_drug3: {
					required: true,
*/					
			},
			messages: {
				firstname: "Please enter Client's firstname",
				lastname: "Please enter Client's lastname",

				art_drug1: {
					required: "Please Select ART drug"
				}, 
				art_drug2: {
					required: "Please Select ART drug"
				},
				art_drug3: {
					required: "Please Select ART drug"
				},
			}
		});
	});
</script>


<h2 style="background-color:#f8f7f7; text-align:center">ART Treatment History</h2>
<!--   <hr style=" border: 2px solid #1c952f;" />  --> 
<?php

global $pat_id;
$pat_id= $_GET['pat_id'];

$patient = new Patient($pat_id);
$client_name = $patient->fullname;

//treatement history
$treatment_history=mysqli_query( $bd,"SELECT * FROM treatment_history where pat_id='$pat_id' "); 
while ($row_treatment_history=mysqli_fetch_array($treatment_history)) {
	$art_drug [] = $row_treatment_history['art_drug'];
	$treat_start_date [] = $row_treatment_history['start_date'];
	$treat_stop_date [] = $row_treatment_history['stop_date'];
	$treat_reason_for_change [] = $row_treatment_history['reason_for_change'];
}

echo '
<form id="edit-profile" class="form-horizontal" action="app.php?pat_id='.$pat_id.'" method="post">';
	?> 
	<h3>Client Name: <strong><i style="background-color:#f8f7f7; color:red"><?php echo $client_name; ?></i></strong></h3>
	<input type="hidden" name="pat_id" value="<?php echo $pat_id; ?>" style="background-color:#fff; border:none; height:20px; color:#fff; position:relative; top:-300px;"/>
	<input type="hidden" name="dob" value="<?php echo $dob; ?>" style="background-color:#fff; border:none; height:20px; color:#fff; position:relative; top:-300px;" /> 
	<fieldset>
		<table style="width:100%" border="0">
			<thead>
				<tr>
					<th> ART Drug 1</th>
					<th> ART Drug 2</th>
					<th> ART Drug 3</th>
					<th> Start Date</th>
					<th> Stop Date</th>
					<th> Reason for changes (toxicities?)</th>

				</tr>
			</thead>
			<tbody>

				<?php 
				include ('app_treatment1/app_treatment_row1.php');
				?>

			</tbody>
		</table>
	</fieldset>

	<div class="form-actions">
		<div class="span3">
			<a class="btn" href="app.php?back_3&part_2<?php echo '&pat_id='.$pat_id.'&g='.$patient->gender.'&xx='.$patient->age.'' ?>" style="padding:10px; font-size:180%">Back</a>           
		</div> 
		<div class="span3">
			<?php include ('includes/app_edit_menu.php'); ?>
		</div>
		<div>
			<div class="span3">
				<button type="submit" class="btn btn-success" style="padding:10px; font-size:180%" name="update_treatment1">Next</button> 
			</div>
		</div>

	</form>
	<script type="text/javascript" charset="utf-8">   

		<?php
		$dp = 7;
		for($i=1; $i<10; $i++) {
			$dp2 = $dp + 1;
			echo "
			function updatedate$i(){ 
				datepicker = document.getElementById(\"datepicker$dp\").value;         
				document.getElementById(\"datepicker$dp2\").value = datepicker;  
			}";
			$dp += 2;
		}
		?>
	</script>
