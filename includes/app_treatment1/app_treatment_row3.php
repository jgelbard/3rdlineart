
<script>
  $( function() {
    $( "#datepicker10" ).datepicker({
      changeMonth: true,
         maxDate: '0', 
				beforeShow : function()
				{
					jQuery( this ).datepicker('option','maxDate', jQuery('#datepicker11').val() );
                },
      changeYear: true
    });
  } );
  </script>
                    <script>
  $( function() {
    $( "#datepicker11" ).datepicker({
      changeMonth: true,
        maxDate: '0', 
				beforeShow : function()
				{
					jQuery( this ).datepicker('option','minDate', jQuery('#datepicker10').val() );
				} , 
      changeYear: true
    });
  } );
  </script> 
<tr>
                      <td>  <select name="art_drug3" required id="art_drug3" style="width:120px">
                        <?php
if (!empty ($art_drug ['2'])) {
    $art_drug_row3=explode("-",$art_drug ['2']); 
    $drug_array_size = sizeof ($art_drug_row3);
    if ($drug_array_size >0){
    echo '<option>'.$art_drug_row3 ['0'].'</option>';
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
                        </select> </td><td>  <select name="art_drug3_b" required id="art_drug3" style="width:120px">
                        <?php
if (!empty ($art_drug ['2'])) {
  $art_drug_row3=explode("-",$art_drug ['2']); 
    $drug_array_size = sizeof ($art_drug_row3);
    if ($drug_array_size >1){
    echo '<option>'.$art_drug_row3 ['1'].'</option>';
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
                        </select> </td><td>  <select name="art_drug3_c" required id="art_drug3" style="width:120px">
                        <?php
if (!empty ($art_drug ['2'])) {
     $art_drug_row3=explode("-",$art_drug ['2']); 
    $drug_array_size = sizeof ($art_drug_row3);
    if ($drug_array_size >2){
    echo '<option>'.$art_drug_row3 ['2'].'</option>';
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
                    <td> <input type="text" name="start_date3"  id="datepicker10" value="<?php
if (!empty ($treat_start_date ['2'])) {
echo $treat_start_date ['2'];
}
else {
echo '';
} ?>"/> </td>
                     <td> <input type="text" name="stop_date3"  id="datepicker11" value="<?php
if (!empty ($treat_stop_date ['2'])) {
echo $treat_stop_date ['2'];
}
else {
echo '';
} ?>" onchange="updatedate3();"/> </td>
                   <td><textarea name="reason_for_change3">
                       <?php
if (!empty ($treat_reason_for_change ['2'])) {
echo $treat_reason_for_change ['2'];
}
else {
echo '';
} ?>  
                        </textarea></td>
                  </tr>