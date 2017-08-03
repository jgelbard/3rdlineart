
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

				datepicker16: {
					required: true,
					
				},
				art_drug2: {
					required: true,
					
				},
				art_drug3: {
					required: true,
					
				},
				art_drug4: {
					required: true,
					
				},
				art_drug5: {
					required: true,
					
				},
				curr_who_stage: {
					required: true,
					
				},
				weight: {
					required: true,
					minlength: 2,
					maxlength: 6
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

				datepicker16: {
					required: "Please Select ART drug"
				},                 
				art_drug2: {
					required: "Please Select ART drug"
				},              
				art_drug3: {
					required: "Please Select ART drug"
				},
				art_drug4: {
					required: "Please Select ART drug"
				},
				art_drug5: {
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
<h2 style="background-color:#f8f7f7; text-align:center">CD4 &VL Monitoring</h2>
<!--   <hr style=" border: 2px solid #1c952f;" />  --> 
<?php

global $pat_id;
$pat_id= $_GET['pat_id'];
/*echo $pat_id;*/
if(isset($_GET['xx'])){ 
	$age= $_GET['xx'];
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

//monitoring
$monitoring=mysqli_query( $bd,"SELECT * FROM monitoring where pat_id='$pat_id' "); 
while ( $row_monitoring=mysqli_fetch_array($monitoring)){

	$monito_date []=$row_monitoring['monito_date'];
	$cd4 []=$row_monitoring['cd4'];
	$vl []=$row_monitoring['vl'];
	$reason_4_detectable_vl []=$row_monitoring['reason_4_detectable_vl'];
	$weight []=$row_monitoring['weight'];

}

echo '
<form id="edit-profile" class="form-horizontal" action="app.php?pat_id='.$pat_id.'" method="post">

	';
	?> 

	<h3>Client Name: <strong><i style="background-color:#f8f7f7; color:red"><?php echo $client_name; ?></i></strong></h3>

	<input type="hidden" name="pat_id" value="<?php echo $pat_id; ?>" />
	<input type="hidden" name="dob" value="<?php echo $dob; ?>"  /> 

	<script type="text/javascript">
		$( function() {
			$( "#datepicker16" ).datepicker({
				changeMonth: true,
				maxDate: '0', 
				beforeShow : function()
				{
					jQuery( this ).datepicker('option','maxDate', jQuery('#datepicker17').val() );
				},
				changeYear: true
			});
		} );

		<?php
		for ($i=16; $i<24; $i++) {
			$i_1=$i+1;
			echo "
			$( function() {
				$( \"#datepicker$i_1\" ).datepicker({
					changeMonth: true,
					maxDate: '0', 
					beforeShow : function()
					{
						jQuery( this ).datepicker('option','minDate', jQuery('#datepicker$i').val() );
					} , 
					changeYear: true
				});
			} );";

		}
		?>

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

	<fieldset>
		<table style="width:90%" border="0">
			<thead>
				<tr>
					<th> Monitoring Date</th>
					<th> CD4 ( <i>cells/ul</i> )</th>
					<th> VL  ( <i>copies/ml</i> )</th> 
					<th> Reason for detectable VL (Non-adherence, treatment break)</th>
					<th> Weight (kg)</th>

				</tr>
			</thead>
			<tbody>
				<?php
				$i = 0;
                $box = 1;
				for($date_i=16; $date_i<=25; $date_i++) {
					$i_1 = $i+1;
					$i_2 = $i+2;

					$dateval = !empty ($monito_date[$i]) ? $monito_date[$i] : '';
					$cd4val = !empty ($cd4[$i]) ? $cd4[$i] : '';
					$vlval = !empty ( $vl[$i]) ? $vl[$i] : '';
					$reasonval = !empty ( $reason_4_detectable_vl[$i]) ? $reason_4_detectable_vl[$i] : '';
					$weightval = !empty  ( $weight[$i]) ? $weight[$i] : '';

                    $rowclass = ($i > 5) ? "row$i box" : '';
					echo "
					<tr class=\"$rowclass\">
						<td> <input type=\"text\" name=\"monito_date$i_1\" id=\"datepicker$date_i\" value=\"$dateval\"/></td>
						<td> <input type=\"number\" name=\"cd4$i_1\" style=\"width:120px\" value=\"$cd4val\"/> </td>
						<td> <input type=\"number\" name=\"vl$i_1\" style=\"width:120px\" value=\"$vlval\"/> </td>
						<td><textarea name=\"reason_4_detectable_vl$i_1\">$reasonval</textarea></td>
						<td> <input type=\"number\" name=\"weight$i_1\" value=\"$weightval\"/> </td>";

					if ($i == 5) 
						echo "
					<td><form action=\"#\">
						<div class=\"box$box\">
						<input type=\"button\" name=\"row$i_1\" class=\"btn btn-success\" value=\"+\" />";

                    if ($i > 5) 
                        echo
                            "<td><div class=\"box$box\">
								<input type=\"button\" name=\"row$i_2\" class=\"btn btn-success\" value=\"+\" />
								<input type=\"button\" name=\"row$i\" class=\"btn btn-danger\" value=\"-\" />";
					if ($i >= 5) {
                        echo
                            "</div>
				    </form></td>";
                        $box += 1;
                    }
					if ($i > 10)
						echo '
					<tr class="endline box">
						<td><p style="color:#f00">Max numbr reached</p> </td>';
                  
					echo '</tr>';
                    $i++;
				}
				?>                    
			</tbody>
		</table>
	</fieldset>

	<div class="form-actions">
		<div class="span3">
			<a class="btn" href="app.php?back_treatment1<?php echo '&pat_id='.$pat_id.'&g='.$gender.'&xx='.$age.'' ?>" style="padding:10px; font-size:180%">Back</a>                                                                                                                                    </div> 
                                                                                                                                                   <div class="span3"><!--
                                                                                                                                                   	<button type="submit" class="btn btn-primary" style="padding:10px; font-size:180%">Save</button> -->.

                                                                                                                                                   </div>

                                                                                                                                                   <div class="span3">
                                                                                                                                                   	<button type="submit" class="btn btn-success" style="padding:10px; font-size:180%" name="update_treatment2">Next</button> 
                                                                                                                                                   </div>
                                                                                                                                               </div>

                                                                                                                                           </form>