<?php

// test data
$PeripheralNeuropathy='Yes';
$Jaundice_x='No';
$Lipodystrophy='No';
echo "foo$Jaundice_x-yes";
exit();

$condition = [
"PeripheralNeuropathy"=>'Perpheral Neuropathy',
"Jaundice"=>'Jaundice',
"Lipodystrophy"=>'Lipodystrophy',
"KidneyFailure"=>'Kidney Failure',
"Psychosis"=>'Psychosis',
"Gynecomastia"=>'Gynecomastia',
"Anemia"=>'Anemia'];

foreach ($condition as $key => $value) {
	eval("\$yeschecked = (\$$key=='Yes')?'checked=\"checked\"':'';");
	$nochecked = ($yeschecked == '')?'checked="checked"':'';
	echo "<tr>        

	<td></td>
	<td> 
		<label class=\"control-label\">$value</label>
		<div style=\"width:110px; float:left\" class=\"radio_sty\">                                          
			<input type=\"radio\" id=\"$key-yes\" name=\"$key\" value=\"Yes\" $yeschecked>
			<label for=\"$key-yes\">Yes</label>    
			<div class=\"check\"></div>
		</div>
		<div style=\"width:100px; float:left\" class=\"radio_sty\">
			<input type=\"radio\" id=\"$key-no\" name=\"$key\" value=\"No\" $nochecked>
			<label for=\"$key-no\">No</label>
			<div class=\"check\"></div>
		</td>
	</tr>";
}

/* test data
$sig_diarrhea_vom='Yes';
$sig_diarrhea_vom_details='Something';
$alco_drug_consump='No';
$alco_drug_consump_details='';
$trad_med='Yes';
$trad_med_details='Something else';
$co_medi='No';
$co_medi_details='';
$other_curr_problem='No';
$other_curr_problem_details='';
*/

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
          // echo "\$details = (\$$key=='Yes')?'value=\"\$$key"."_details\"':''";
	eval("\$detailval = \$$key"."_details;");
	eval("\$details = (\$$key=='Yes')?'value=\"$detailval\"':'';");
          // echo "$details";
	
	echo "
	<tr>
		<td> 
			<label class=\"control-label\">$value</label>  
			<div style=\"width:110px; float:left\" class=\"radio_sty\">
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