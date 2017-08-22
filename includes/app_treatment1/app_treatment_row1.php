<?php
include ("../../includes/config.php");
$datepicker = 6;

$druglist = '<option value="">select drug</option>';
$retrieve_drugs ="SELECT * FROM drugs";
$drugs = mysqli_query($bd, $retrieve_drugs);
                
while($drug_row = mysqli_fetch_array($drugs)) {
    $drug_name = $drug_row['drug_name'];
    $druglist .= '<option value="'.$drug_name.'">'.$drug_name.'</option>';
}

$numvisrows = 5;
$visrow = 1;
for($i=0; $i<10; $i++) {
    $i_1 = $i - 1;
	$drug = $i + 1;
    $drug_2 = $drug - 1;
    $date = $drug;
    $drugb = "art_drug$drug"."_b";
    $drugc = "art_drug$drug"."_c";
    $required = '';
    if ($i < 2)
        $required = 'required';
    $rowclass = "";
    $datepicker2 = $datepicker + 1;
    
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

    if ($i >= $numvisrows)
        $rowclass = "row$drug box"; 

	echo "
	<tr class=\"$rowclass\">
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
				<td><input type=\"text\" name=\"start_date$date\"value=\"";
						if (!empty ($treat_start_date["$i"])) {
							echo $treat_start_date ["$i"];
						}
						else {
						  echo '';
						} echo "\" id=\"datepicker$datepicker\" /> </td>
				<td><input type=\"text\" name=\"stop_date$date\" value=\"";
                        if (!empty ($treat_stop_date["$i"])) {
                            echo $treat_stop_date ["$i"];
                        }
                        else {
                            echo '';
                        } echo "\" id=\"datepicker$datepicker2\" onchange=\"updatedate$drug();\" /> </td>
				<td><textarea name=\"reason_for_change$date\">";
                        if (!empty ($treat_reason_for_change["$i"])) {
                            echo $treat_reason_for_change["$i"];
                        }
                        else {
                            echo '';
                        }
                        echo "
				 </textarea></td>";
                        
                        $regrow = $i;
                        $regrow1 = '+row'.($regrow+1);
                        $regrow2 = '-row'.($regrow);
                        $class_sec = "butts$regrow";

             echo "
             <td style=\"color:#000; min-width:110px\">
             <div class=\"$class_sec\">".
        		($regrow>=4?"<input type=\"button\" class=\"btn btn-success\" name=\"$regrow1\" value=\"+\" />\n\t":"").
        		($regrow>4?"<input type=\"button\" class=\"btn btn-danger\" name=\"$regrow2\"  value=\"-\" />":"").
        		"</div>
        	</td>";
                        
// comment this if broken
    if ($drug > $numvisrows) {
        echo "
    <td><form action=\"#\">
        <div class=\"box$drug\">
    <input type=\"button\" name=\"row$drug\" class=\"btn btn-success\" value=\"+\" />";
            if ($i > ($numvisrows + 1))
                echo "<input type=\"button\" name=\"row$drug_2\" class=\"btn btn-danger\" value=\"-\" />";
            echo "
        </div>
    </form></td>";
    $visrow += 1;
    }
//
                        echo "
						</tr>
						";
						$datepicker += 2;
                        //  exit();
					}
					?>