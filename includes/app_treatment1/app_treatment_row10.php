             <script>
  $( function() {
    $( "#datepicker24" ).datepicker({
      changeMonth: true,
         maxDate: '0', 
				beforeShow : function()
				{
					jQuery( this ).datepicker('option','maxDate', jQuery('#datepicker25').val() );
                },
      changeYear: true
    });
  } );
  </script>
         <script>
  $( function() {
    $( "#datepicker25" ).datepicker({
      changeMonth: true,
        maxDate: '0', 
				beforeShow : function()
				{
					jQuery( this ).datepicker('option','minDate', jQuery('#datepicker24').val() );
				} , 
      changeYear: true
    });
  } );
  </script>
                  
                <tr  class="row9 box">
                    <td> 
                          <select name="art_drug10" style="width:120px">   
                       <?php
if (!empty ($art_drug ['9'])) {
    
    $art_drug_row10=explode("-",$art_drug ['9']); 
    $drug_array_size = sizeof ($art_drug_row10);
    if ($drug_array_size >0){
    echo '<option>'.$art_drug_row10 ['0'].'</option>';
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
                  
                        </select> </td><td> 
                          <select name="art_drug10_b" style="width:120px">   
                       <?php
if (!empty ($art_drug ['9'])) {
    
    $art_drug_row10=explode("-",$art_drug ['9']); 
    $drug_array_size = sizeof ($art_drug_row10);
    if ($drug_array_size >1){
    echo '<option>'.$art_drug_row10 ['1'].'</option>';
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
                  
                        </select> </td><td> 
                          <select name="art_drug10_c" style="width:120px">   
                       <?php
if (!empty ($art_drug ['9'])) {
    
    $art_drug_row10=explode("-",$art_drug ['9']); 
    $drug_array_size = sizeof ($art_drug_row10);
    if ($drug_array_size >2){
    echo '<option>'.$art_drug_row10 ['2'].'</option>';
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
                    <td> <input type="text" name="start_date10" id="datepicker24"  value=" <?php
if (!empty ($treat_start_date ['9'])) {
echo $treat_start_date ['9'];
}
else {
echo '';
} ?>"/> </td>
                     <td> <input type="text" name="stop_date10" id="datepicker25" value=" <?php
if (!empty ($treat_stop_date ['9'])) {
echo $treat_stop_date ['9'];
}
else {
echo '';
} ?>" /> </td>
                    <td><textarea name="reason_for_change10">
                         <?php
if (!empty ($treat_reason_for_change ['9'])) {
echo $treat_reason_for_change ['9'];
}
else {
echo '';
} ?>
                        </textarea></td>
                    <td><form action="#">
        <div class="endline1">
    <input type="button" name="endline" class="btn btn-success" value="+" />
    <input type="button" name="row8" class="btn btn-danger" value="-" />
        </div>
    </form></td>
                  </tr>
                    <tr  class="endline box">
                        <td><p style="color:#f00">Max numbr reached</p> </td>
                    
                    </tr>   