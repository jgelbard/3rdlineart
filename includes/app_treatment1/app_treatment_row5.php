  
                    <script>
  $( function() {
    $( "#datepicker14" ).datepicker({
      changeMonth: true,
         maxDate: '0', 
				beforeShow : function()
				{
					jQuery( this ).datepicker('option','maxDate', jQuery('#datepicker15').val() );
                },
      changeYear: true
    });
  } );
  </script>
                    <script>
  $( function() {
    $( "#datepicker15" ).datepicker({
      changeMonth: true,
        maxDate: '0', 
				beforeShow : function()
				{
					jQuery( this ).datepicker('option','minDate', jQuery('#datepicker14').val() );
				} , 
      changeYear: true
    });
  } );
  </script>

<tr>
                      <td>  <select name="art_drug5"  id="art_drug5" style="width:120px">
                      <?php
if (!empty ($art_drug ['4'])) {
    
    $art_drug_row5=explode("-",$art_drug ['4']); 
    $drug_array_size = sizeof ($art_drug_row5);
    if ($drug_array_size >0){
    echo '<option>'.$art_drug_row5 ['0'].'</option>';
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
                        </select> </td> <td>  <select name="art_drug5_b"  id="art_drug5" style="width:120px">
                      <?php
if (!empty ($art_drug ['4'])) {
  $art_drug_row5=explode("-",$art_drug ['4']); 
    $drug_array_size = sizeof ($art_drug_row5);
    if ($drug_array_size >1){
    echo '<option>'.$art_drug_row5 ['1'].'</option>';
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
                        </select> </td> <td>  <select name="art_drug5_c"  id="art_drug5" style="width:120px">
                      <?php
if (!empty ($art_drug ['4'])) {
    $art_drug_row5=explode("-",$art_drug ['4']); 
    $drug_array_size = sizeof ($art_drug_row5);
    if ($drug_array_size >2){
    echo '<option>'.$art_drug_row5 ['2'].'</option>';
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
                  <td> <input type="text" name="start_date5"  id="datepicker14" value="<?php
if (!empty ($treat_start_date ['4'])) {
echo $treat_start_date ['4'];
}
else {
echo '';
} ?>"/> </td>
                     <td> <input type="text" name="stop_date5"  id="datepicker15" value="<?php
if (!empty ($treat_stop_date ['4'])) {
echo $treat_stop_date ['4'];
}
else {
echo '';
} ?>" onchange="updatedate5();"/> </td>
                   <td><textarea name="reason_for_change5">
                      <?php
if (!empty ($treat_reason_for_change ['4'])) {
echo $treat_reason_for_change ['4'];
}
else {
echo '';
} ?>
                        </textarea></td>
                  </tr>