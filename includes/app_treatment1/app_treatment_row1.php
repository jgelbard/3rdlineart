<?php
include ("../../includes/config.php");
$datepicker = 6;
$datepicker2 = $datepicker + 1;
   
	$druglist = '<option value="">select drug</option>';
                
				$retrieve_drugs ="SELECT * FROM drugs";
				$drugs = mysqli_query($bd, $retrieve_drugs);
                
				while($drug_row = mysqli_fetch_array($drugs)) {
					$drug_name = $drug_row['drug_name'];
					$druglist .= '<option value="'.$drug_name.'">'.$drug_name.'</option>';
				}

for($i=0; $i<=10; $i++) {
	$drug = $i + 1;
    $date = $drug;
    $drugb = "art_drug$drug"."_b";
    $drugc = "art_drug$drug"."_c";
    $required = '';
    if ($i < 2)
        $required = 'required';

	echo "
	<script>
		$( function() {
			$( \"#datepicker$datepicker\" ).datepicker({
				changeMonth: true,
				maxDate: '0', 
				beforeShow : function()
				{
					jQuery( this ).datepicker('option','maxDate', jQuery('#datepicker$datepicker2').val() );
				},
				changeYear: true
			});
		} );
		$( function() {
			$( \"#datepicker$datepicker2\" ).datepicker({
				changeMonth: true,
				maxDate: '0', 
				beforeShow : function()
				{
					jQuery( this ).datepicker('option','minDate', jQuery('#datepicker$datepicker').val() );
				}, 
				changeYear: true
			});
		} );
	</script>";

	echo "
	<tr>
		<td> 		
			<select name=\"art_drug$drug\" $required id=\"art_drug$drug\" style=\"width:120px\">";

				if (!empty ($art_drug["$i"])) {
					$art_drug_row = explode("-", $art_drug["$i"]); 
					$drug_array_size = sizeof($art_drug_row);
					if ($drug_array_size > 0 && $art_drug_row['0'] != '') {
						echo '<option>'.$art_drug_row['0'].'</option>';
					}
                }
                echo "$druglist
			</select> </td>
			<td> 		
				<select name=\"$drugb\" $required id=\"art_drug$drug\" style=\"width:120px\">";  

					if (!empty ($art_drug["$i"])) {
						$art_drug_row=explode("-",$art_drug ["$i"]); 
						$drug_array_size = sizeof ($art_drug_row);
						if ($drug_array_size > 1 && $art_drug_row['1'] != '') {
							echo '<option>'.$art_drug_row['1'].'</option>';
						}
					}                   
					echo "$druglist
				</select> </td> 
				<td> 				
					<select name=\"$drugc\" $required id=\"art_drug$drug\" style=\"width:120px\">";
						if (!empty ($art_drug["$i"])) {
							$art_drug_row=explode("-",$art_drug ["$i"]); 
							$drug_array_size = sizeof ($art_drug_row);
							if ($drug_array_size > 2 && $art_drug_row['2'] != '') {
								echo '<option>'.$art_drug_row['2'].'</option>';
							}
						}                        
						echo "$druglist
					</select> </td>
					<td> <input type=\"text\" name=\"start_date$date\"  value=\"";
						if (!empty ($treat_start_date["$i"])) {
							echo $treat_start_date ['0'];
						}
						else {
							echo '';
						} echo "\" id=\"datepicker$datepicker\" /> </td>
						<td> <input type=\"text\" name=\"stop_date$date\"   value=\"";
							if (!empty ($treat_stop_date["$i"])) {
								echo $treat_stop_date ["$i"];
							}
							else {
								echo '';
							} echo "\" id=\"datepicker$datepicker2\" onchange=\"updatedate();\" /> </td>
							<td><textarea name=\"reason_for_change$date\">";
								if (!empty ($treat_reason_for_change["$i"])) {
									echo $treat_reason_for_change["$i"];
								}
								else {
									echo '';
								}
								echo "
							</textarea></td>
						</tr>
						";
						$datepicker++;
                        //  exit();
					}
					?>