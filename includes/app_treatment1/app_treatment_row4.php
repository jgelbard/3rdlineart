
                    <script>
  $( function() {
    $( "#datepicker12" ).datepicker({
      changeMonth: true,
         maxDate: '0', 
				beforeShow : function()
				{
					jQuery( this ).datepicker('option','maxDate', jQuery('#datepicker13').val() );
                },
      changeYear: true
    });
  } );
  </script>
                    <script>
  $( function() {
    $( "#datepicker13" ).datepicker({
      changeMonth: true,
        maxDate: '0', 
				beforeShow : function()
				{
					jQuery( this ).datepicker('option','minDate', jQuery('#datepicker12').val() );
				} , 
      changeYear: true
    });
  } );
  </script>

<tr>
                      <td>  <select name="art_drug4" required id="art_drug4" style="width:120px">
              <?php
if (!empty ($art_drug ['3'])) {
    $art_drug_row4=explode("-",$art_drug ['3']); 
    $drug_array_size = sizeof ($art_drug_row4);
    if ($drug_array_size >0){
    echo '<option>'.$art_drug_row4 ['0'].'</option>';
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
                        </select> </td><td>  <select name="art_drug4_b" required id="art_drug4" style="width:120px">
              <?php
if (!empty ($art_drug ['3'])) {
     $art_drug_row4=explode("-",$art_drug ['3']); 
    $drug_array_size = sizeof ($art_drug_row4);
    if ($drug_array_size >1){
    echo '<option>'.$art_drug_row4 ['1'].'</option>';
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
                        </select> </td><td>  <select name="art_drug4_c" required id="art_drug4" style="width:120px">
              <?php
if (!empty ($art_drug ['3'])) {
    
    $art_drug_row4=explode("-",$art_drug ['3']); 
    $drug_array_size = sizeof ($art_drug_row4);
    if ($drug_array_size >2){
    echo '<option>'.$art_drug_row4 ['2'].'</option>';
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
                    <td> <input type="text" name="start_date4"  id="datepicker12" value="<?php
if (!empty ($treat_start_date ['3'])) {
echo $treat_start_date ['3'];
}
else {
echo '';
} ?>"/> </td>
                     <td> <input type="text" name="stop_date4"  id="datepicker13" value="<?php
if (!empty ($treat_stop_date ['3'])) {
echo $treat_stop_date ['3'];
}
else {
echo '';
} ?>" onchange="updatedate4();"/> </td>
                    <td><textarea name="reason_for_change4">
                     <?php
if (!empty ($treat_reason_for_change ['3'])) {
echo $treat_reason_for_change ['3'];
}
else {
echo '';
} ?>    
                        </textarea></td>
                  </tr>