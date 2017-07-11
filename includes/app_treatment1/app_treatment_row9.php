   
             
                     <script>
  $( function() {
    $( "#datepicker22" ).datepicker({
      changeMonth: true,
         maxDate: '0', 
				beforeShow : function()
				{
					jQuery( this ).datepicker('option','maxDate', jQuery('#datepicker23').val() );
                },
      changeYear: true
    });
  } );
  </script>
                     <script>
  $( function() {
    $( "#datepicker23" ).datepicker({
      changeMonth: true,
        maxDate: '0', 
				beforeShow : function()
				{
					jQuery( this ).datepicker('option','minDate', jQuery('#datepicker22').val() );
				} , 
      changeYear: true
    });
  } );
  </script>
<tr  class="row8 box">
                    <td> 
                          <select name="art_drug9" style="width:120px">   
                      <?php
if (!empty ($art_drug ['8'])) {
    
    $art_drug_row9=explode("-",$art_drug ['8']); 
    $drug_array_size = sizeof ($art_drug_row9);
    if ($drug_array_size >0){
    echo '<option>'.$art_drug_row9 ['0'].'</option>';
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
                          <select name="art_drug9_b" style="width:120px">   
                      <?php
if (!empty ($art_drug ['8'])) {
    
    $art_drug_row9=explode("-",$art_drug ['8']); 
    $drug_array_size = sizeof ($art_drug_row9);
    if ($drug_array_size >1){
    echo '<option>'.$art_drug_row9 ['1'].'</option>';
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
                          <select name="art_drug9_c" style="width:120px">   
                      <?php
if (!empty ($art_drug ['8'])) {
    
    $art_drug_row9=explode("-",$art_drug ['8']); 
    $drug_array_size = sizeof ($art_drug_row9);
    if ($drug_array_size >2){
    echo '<option>'.$art_drug_row9 ['2'].'</option>';
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
                    <td> <input type="text" name="start_date9" id="datepicker22" value=" <?php
if (!empty ($treat_start_date ['8'])) {
echo $treat_start_date ['8'];
}
else {
echo '';
} ?>" /> </td>
                     <td> <input type="text" name="stop_date9" id="datepicker23" value=" <?php
if (!empty ($treat_stop_date ['8'])) {
echo $treat_stop_date ['8'];
}
else {
echo '';
} ?>" onchange="updatedate9();"/> </td>
                    <td><textarea name="reason_for_change9">
                        <?php
if (!empty ($treat_reason_for_change ['8'])) {
echo $treat_reason_for_change ['8'];
}
else {
echo '';
} ?> 
                        </textarea></td>
                    <td><form action="#">
        <div class="box4">
    <input type="button" name="row9" class="btn btn-success" value="+" />
    <input type="button" name="row7" class="btn btn-danger" value="-" />
        </div>
    </form></td>
                  </tr> 