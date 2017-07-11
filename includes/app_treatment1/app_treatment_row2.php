    
 <script>
  $( function() {
    $( "#datepicker8" ).datepicker({
      changeMonth: true, maxDate: '0', 
				beforeShow : function()
				{
					jQuery( this ).datepicker('option','maxDate', jQuery('#datepicker9').val() );
                },
      changeYear: true
    });
  } );
  </script>
                    <script>
  $( function() {
    $( "#datepicker9" ).datepicker({
      changeMonth: true,
        maxDate: '0', 
				beforeShow : function()
				{
					jQuery( this ).datepicker('option','minDate', jQuery('#datepicker8').val() );
				} , 
      changeYear: true
    });
  } );
  </script>
<tr>
                     <td>  <select name="art_drug2" required id="art_drug2" style="width:120px">
                      <?php
if (!empty ($art_drug ['1'])) {
    $art_drug_row2=explode("-",$art_drug ['1']); 
    $drug_array_size = sizeof ($art_drug_row2);
    if ($drug_array_size >0){
    echo '<option>'.$art_drug_row2 ['0'].'</option>';
    }

echo '<option value="">select drug</option>';
}
else {
echo '<option value="">select drug</option>';
}
        $retrieve_drugs ="SELECT * FROM drugs";

     $drugs = mysqli_query($bd, $retrieve_drugs);
	       
while($drug_row = mysqli_fetch_array($drugs)) {
    
    
	$drug_name = $drug_row['drug_name'];
    echo '<option value='.$drug_name.'>'.$drug_name.'</option>';
    
}

?>
                        </select> </td> <td>  <select name="art_drug2_b" required id="art_drug2" style="width:120px">
                      <?php
if (!empty ($art_drug ['1'])) {
    
    $art_drug_row2=explode("-",$art_drug ['1']); 
    $drug_array_size = sizeof ($art_drug_row2);
    if ($drug_array_size >1){
    echo '<option>'.$art_drug_row2 ['1'].'</option>';
    }
    echo '<option value="">select drug</option>';
}
else {
echo '<option value="">select drug</option>';
}
        $retrieve_drugs ="SELECT * FROM drugs";

     $drugs = mysqli_query($bd, $retrieve_drugs);
	       
while($drug_row = mysqli_fetch_array($drugs)) {
    
    
	$drug_name = $drug_row['drug_name'];
    echo '<option value='.$drug_name.'>'.$drug_name.'</option>';
    
}

?>
                        </select> </td> <td>  <select name="art_drug2_c" required id="art_drug2" style="width:120px">
                      <?php
if (!empty ($art_drug ['1'])) {
  $art_drug_row2=explode("-",$art_drug ['1']); 
    $drug_array_size = sizeof ($art_drug_row2);
    if ($drug_array_size >2){
    echo '<option>'.$art_drug_row2 ['2'].'</option>';
    }
    echo '<option value="">select drug</option>';
}
else {
echo '<option value="">select drug</option>';
}
        $retrieve_drugs ="SELECT * FROM drugs";

     $drugs = mysqli_query($bd, $retrieve_drugs);
	       
while($drug_row = mysqli_fetch_array($drugs)) {
    
    
	$drug_name = $drug_row['drug_name'];
    echo '<option value='.$drug_name.'>'.$drug_name.'</option>';
    
}

?>
                        </select> </td>
                    <td> <input type="text" name="start_date2"   value="<?php
if (!empty ($treat_start_date ['1'])) {
echo $treat_start_date ['1'];
}
else {
echo '';
} ?>" id="datepicker8" /> </td>
                     <td> <input type="text" name="stop_date2"  id="datepicker9" value="<?php
if (!empty ($treat_stop_date ['1'])) {
echo $treat_stop_date ['1'];
}
else {
echo '';
} ?>" onchange="updatedate2();"/> </td>
                     <td><textarea name="reason_for_change2">
                         <?php
if (!empty ($treat_reason_for_change ['1'])) {
echo $treat_reason_for_change ['1'];
}
else {
echo '';
} ?>
                        </textarea></td>
                    </tr>