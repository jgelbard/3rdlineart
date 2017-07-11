 
                     <script>
  $( function() {
    $( "#datepicker20" ).datepicker({
      changeMonth: true,
         maxDate: '0', 
				beforeShow : function()
				{
					jQuery( this ).datepicker('option','maxDate', jQuery('#datepicker21').val() );
                },
      changeYear: true
    });
  } );
  </script>
                     <script>
  $( function() {
    $( "#datepicker21" ).datepicker({
      changeMonth: true,
        maxDate: '0', 
				beforeShow : function()
				{
					jQuery( this ).datepicker('option','minDate', jQuery('#datepicker20').val() );
				} , 
      changeYear: true
    });
  } );
  </script>

<tr  class="row7 box">
                    <td> 
                          <select name="art_drug8" style="width:120px">   
                       <?php
if (!empty ($art_drug ['7'])) {
    
    $art_drug_row8=explode("-",$art_drug ['7']); 
    $drug_array_size = sizeof ($art_drug_row8);
    if ($drug_array_size >0){
    echo '<option>'.$art_drug_row8 ['0'].'</option>';
    }
echo '<option>select drug</option>';
}
else {
echo '<option>select drug</option>';
}
        $retrieve_drugs ="SELECT * FROM drugs";

     $drugs = mysqli_query($bd, $retrieve_drugs);
	       
while($drug_row = mysqli_fetch_array($drugs)) {
    
    
	$drug_name = $drug_row['drug_name'];
    echo '<option value='.$drug_name.'>'.$drug_name.'</option>';
    
}

?>
                  
                        </select> </td>
    <td> 
                          <select name="art_drug8_b" style="width:120px">   
                       <?php
if (!empty ($art_drug ['7'])) {
    
    $art_drug_row8=explode("-",$art_drug ['7']); 
    $drug_array_size = sizeof ($art_drug_row8);
    if ($drug_array_size >1){
    echo '<option>'.$art_drug_row8 ['1'].'</option>';
    }
echo '<option>select drug</option>';
}
else {
echo '<option>select drug</option>';
}
        $retrieve_drugs ="SELECT * FROM drugs";

     $drugs = mysqli_query($bd, $retrieve_drugs);
	       
while($drug_row = mysqli_fetch_array($drugs)) {
    
    
	$drug_name = $drug_row['drug_name'];
    echo '<option value='.$drug_name.'>'.$drug_name.'</option>';
    
}

?>
                  
                        </select> </td>
    <td> 
                          <select name="art_drug8_c" style="width:120px">   
                       <?php
if (!empty ($art_drug ['7'])) {
    
    $art_drug_row8=explode("-",$art_drug ['7']); 
    $drug_array_size = sizeof ($art_drug_row8);
    if ($drug_array_size >2){
    echo '<option>'.$art_drug_row8 ['2'].'</option>';
    }
echo '<option>select drug</option>';
}
else {
echo '<option>select drug</option>';
}
        $retrieve_drugs ="SELECT * FROM drugs";

     $drugs = mysqli_query($bd, $retrieve_drugs);
	       
while($drug_row = mysqli_fetch_array($drugs)) {
    
    
	$drug_name = $drug_row['drug_name'];
    echo '<option value='.$drug_name.'>'.$drug_name.'</option>';
    
}

?>
                  
                        </select> </td>
                    <td> <input type="text" name="start_date8" id="datepicker20" value=" <?php
if (!empty ($treat_start_date ['7'])) {
echo $treat_start_date ['7'];
}
else {
echo '';
} ?>" /> </td>
                     <td> <input type="text" name="stop_date8" id="datepicker21" value=" <?php
if (!empty ($treat_stop_date ['7'])) {
echo $treat_stop_date ['7'];
}
else {
echo '';
} ?>" onchange="updatedate8();"/> </td>
                    <td><textarea name="reason_for_change8">
                         <?php
if (!empty ($treat_reason_for_change ['7'])) {
echo $treat_reason_for_change ['7'];
}
else {
echo '';
} ?>
                        </textarea></td>
                     <td><form action="#">
        <div class="box3">
    <input type="button" name="row8" class="btn btn-success" value="+" />
    <input type="button" name="row6" class="btn btn-danger" value="-" />
        </div>
    </form></td>
                  </tr>