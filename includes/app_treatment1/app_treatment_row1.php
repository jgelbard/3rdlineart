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
?>

<script type="text/javascript">
    $().ready(function() {
        $('input[type="button"]').click(function(){
            // alert('click!'+ $(this).attr("name"));
<?php
            $i=1;
            for($row=6; $row<=10; $row++) {
                $i1 = $i + 1;
                echo "if($(this).attr(\"name\")==\"row+$row\") {
                        // alert($(this).attr(\"name\"));
                        $(\".box$row\").show();
                        $(\".butts$i\").hide();
                        $(\".butts$i1\").show();
                    }
                    if($(this).attr(\"name\")==\"row-$row\") {
                        $(\".box$row\").hide();
                        $(\".butts$i\").show();
                    }";
                $i++;
            }
?>
        });
       
        // deal with the form +/- buttons
        $( "tr:gt(5)" ).hide();  // of course this needs to change if more than 5 rows are shown by default
        $( "input[type=number][name^=art_drug][value!='']").parents("tr").show();
    });        
</script>
        
<?php
$box = 1;
for($i=0; $i<10; $i++) {
    $i_1 = $i - 1;
	$drug = $i + 1;
    $drug_2 = $drug - 1;
    $date = $drug;
    $drugb = "art_drug$drug"."_b";
    $drugc = "art_drug$drug"."_c";
    $required = '';
    if ($i < 1)
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

    $i1 = $i + 1;
    $i2 = $i + 2;    
    $rowclass = $i1 >= 5 ? "box$i1":"sbox";    
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
				<td><input type=\"text\" name=\"start_date$date\" value=\"";
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
                        echo "</textarea></td>";
                        
 						if ($i1 >= 5) {
							echo "
							    <td><div class=\"butts$box\">".
                                (($i1>=5 and $i1<10)?"<input type=\"button\" name=\"row+$i2\" class=\"btn btn-success\" value=\"+\" />":"").
                                (($i1>5 and $i1<11)?"<input type=\"button\" name=\"row-$i1\" class=\"btn btn-danger\" value=\"-\" />":"").
                                "</div>
								</td>";
								$box += 1;
                        }
                        if ($i1 > 11)
                            echo '
							<tr class="endline box">
								<td><p style="color:#f00">Max number reached</p> </td>';
                                echo '</tr>';
                                
						$datepicker += 2;
                        //  exit();
}
?>