
                     <script>
  $( function() {
    $( "#datepicker18" ).datepicker({
      changeMonth: true,
         maxDate: '0', 
				beforeShow : function()
				{
					jQuery( this ).datepicker('option','maxDate', jQuery('#datepicker19').val() );
                },
      changeYear: true
    });
  } );
  </script>
                     <script>
  $( function() {
    $( "#datepicker19" ).datepicker({
      changeMonth: true,
        maxDate: '0', 
				beforeShow : function()
				{
					jQuery( this ).datepicker('option','minDate', jQuery('#datepicker18').val() );
				} , 
      changeYear: true
    });
  } );
  </script>
<tr  class="row6 box">
                    <td> 
                          <select name="art_drug7" style="width:120px">   
                       <?php
if (!empty ($art_drug ['6'])) {
    
    $art_drug_row7=explode("-",$art_drug ['6']); 
    $drug_array_size = sizeof ($art_drug_row7);
    if ($drug_array_size >0){
    echo '<option>'.$art_drug_row7 ['0'].'</option>';
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
                  
                        </select> </td> <td> 
                          <select name="art_drug7_b" style="width:120px">   
                       <?php
if (!empty ($art_drug ['6'])) {
    
    $art_drug_row7=explode("-",$art_drug ['6']); 
    $drug_array_size = sizeof ($art_drug_row7);
    if ($drug_array_size >1){
    echo '<option>'.$art_drug_row7 ['1'].'</option>';
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
                  
                        </select> </td> <td> 
                          <select name="art_drug7_c" style="width:120px">   
                       <?php
if (!empty ($art_drug ['6'])) {
     
    $art_drug_row7=explode("-",$art_drug ['6']); 
    $drug_array_size = sizeof ($art_drug_row7);
    if ($drug_array_size >2){
    echo '<option>'.$art_drug_row7 ['2'].'</option>';
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
                    <td> <input type="text" name="start_date7" id="datepicker18" value=" <?php
if (!empty ($treat_start_date ['6'])) {
echo $treat_start_date ['6'];
}
else {
echo '';
} ?>" /> </td>
                     <td> <input type="text" name="stop_date7" id="datepicker19" value=" <?php
if (!empty ($treat_stop_date ['6'])) {
echo $treat_stop_date ['6'];
}
else {
echo '';
} ?>" onchange="updatedate7();"/> </td>
                    <td><textarea name="reason_for_change7">
                        <?php
if (!empty ($treat_reason_for_change ['6'])) {
echo $treat_reason_for_change ['6'];
}
else {
echo '';
} ?> 
                        </textarea></td>
                     <td><form action="#">
        <div class="box2">
    <input type="button" name="row7" class="btn btn-success" value="+" />
    <input type="button" name="row5" class="btn btn-danger" value="-" />
        </div>
    </form></td>
                  </tr> 