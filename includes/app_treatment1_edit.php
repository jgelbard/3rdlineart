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

				art_drug1: {
					required: true,
					
				},
				art_drug2: {
					required: true,
					
				},
				art_drug3: {
					required: true,
					
				},
				curr_who_stage: {
					required: true,
					
				},
				weight: {
					required: true,
					minlength: 2,
					maxlength: 3
				},
				height: {
					required: true,
					minlength: 3,
					maxlength: 3
				},

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
				curr_who_stage: {
					required: "Please Select Current WHO stage"
				},
				weight: {
					required: "Curr Weight",
					minlength: "Under weight",
					maxlength: "Over weight"					
				}, 
				height: {
					required: "Curr Height",
					minlength: "Under Height",
					maxlength: "Over Height"					
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

$patient=mysqli_query( $bd,"SELECT * FROM patient where id='$pat_id' "); 
$row_pat=mysqli_fetch_array($patient);

$art_id_num = $row_pat['art_id_num'];
$firstname = $row_pat['firstname'];
$lastname = $row_pat['lastname'];
$gender = $row_pat['gender'];
$dob = $row_pat['dob'];
$vl_sample_id = $row_pat['vl_sample_id'];

$client_name = $firstname.' '.$lastname;

//get age or calc age
if(isset($_GET['xx']) and $_GET['XX'] != ''){ 
	$age= $_GET['xx'];
    echo "GOT AGE $age";
}
else {
	function CalcAge($dob) 
	{ 
		$dob = explode("/",$dob); 
		$curMonth = date("m");
		$curDay = date("j");
		$curYear = date("Y");
		$age = $curYear - $dob[2]; 
		if($curMonth<$dob[1] || ($curMonth==$dob[1] && $curDay<$dob[0])) 
			$age--; 
		return $age; 
	}
	$age = CalcAge($dob);
}

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
				<script type="text/javascript">
					$(document).ready(function(){
						$('input[type="button"]').click(function(){

							if($(this).attr("name")=="row6"){
								$(".box").not(".row6").hide();
								$(".box1").not(".row6").hide();
								$(".row7").not(".row6").hide();
								$(".row8").not(".row6").hide();
								$(".box2").show();
								$(".row6").show();
							} 
							if($(this).attr("name")=="row5"){
								$(".row6").not(".row5").hide();
								$(".box1").show();
							}
			
							if($(this).attr("name")=="row7"){
								$(".box2").not(".row7").hide();
								$(".row8").not(".row7").hide();
								$(".box3").show();
								$(".row7").show();
							} 

							if($(this).attr("name")=="row8"){
								$(".box3").not(".row8").hide();
								$(".row9").not(".row8").hide();
								$(".endline").not(".row8").hide();
								$(".box4").show();
								$(".row8").show();
							}

							if($(this).attr("name")=="row9"){
								$(".box4").not(".row9").hide();
								$(".row9").show();
							}
			
							if($(this).attr("name")=="endline"){           
								$(".box1").not(".endline").hide();
								$(".box2").not(".endline").hide();
								$(".endline").show();
							}

						});
					});

				</script>

				<?php 
				include ('app_treatment1/app_treatment_row1.php');
				?>

			</tbody>
		</table>
	</fieldset>

	<div class="form-actions">
		<div class="span3">
			<a class="btn" href="app.php?back&back_3&part_2<?php echo '&pat_id='.$pat_id.'&g='.$gender.'&xx='.$age.'' ?>" style="padding:10px; font-size:180%">Back</a>           
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
