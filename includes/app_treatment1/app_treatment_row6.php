   
                     <script>
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
  </script>
                     <script>
  $( function() {
    $( "#datepicker17" ).datepicker({
      changeMonth: true,
        maxDate: '0', 
				beforeShow : function()
				{
					jQuery( this ).datepicker('option','minDate', jQuery('#datepicker16').val() );
				} , 
      changeYear: true
    });
  } );
  </script>

<tr>
                    <td> 
                          <select name="art_drug6" style="width:120px">   
                       <?php
if (!empty ($art_drug ['5'])) {
    
    $art_drug_row6=explode("-",$art_drug ['5']); 
    $drug_array_size = sizeof ($art_drug_row6);
    if ($drug_array_size >0){
    echo '<option>'.$art_drug_row6 ['0'].'</option>';
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
                          <select name="art_drug6_b" style="width:120px">   
                       <?php
if (!empty ($art_drug ['5'])) {
   
    $art_drug_row6=explode("-",$art_drug ['5']); 
    $drug_array_size = sizeof ($art_drug_row6);
    if ($drug_array_size >1){
    echo '<option>'.$art_drug_row6 ['1'].'</option>';
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
                          <select name="art_drug6_c" style="width:120px">   
                       <?php
if (!empty ($art_drug ['5'])) {
    
    $art_drug_row6=explode("-",$art_drug ['5']); 
    $drug_array_size = sizeof ($art_drug_row6);
    if ($drug_array_size >2){
    echo '<option>'.$art_drug_row6 ['2'].'</option>';
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
                    <td> <input type="text" name="start_date6" id="datepicker16" value=" <?php
if (!empty ($treat_start_date ['5'])) {
echo $treat_start_date ['5'];
}
else {
echo '';
} ?>" /> </td>
                     <td> <input type="text" name="stop_date6" id="datepicker17" value=" <?php
if (!empty ($treat_stop_date ['5'])) {
echo $treat_stop_date ['5'];
}
else {
echo '';
} ?>" onchange="updatedate6();" /> </td>
                    <td><textarea name="reason_for_change6">
                      <?php
if (!empty ($treat_reason_for_change ['5'])) {
echo $treat_reason_for_change ['5'];
}
else {
echo '';
} ?>   
                        </textarea></td>
                      <td><form action="#">
        <div class="box1">
    <input type="button" name="row6" class="btn btn-success" value="+" />
        </div>
    </form></td>
                  </tr> 