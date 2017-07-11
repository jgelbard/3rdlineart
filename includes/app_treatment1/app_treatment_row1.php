<script>
  $( function() {
    $( "#datepicker6" ).datepicker({
      changeMonth: true,
        maxDate: '0', 
				beforeShow : function()
				{
					jQuery( this ).datepicker('option','maxDate', jQuery('#datepicker7').val() );
                },
      changeYear: true
    });
  } );
  </script>
                       <script>
  $( function() {
    $( "#datepicker7" ).datepicker({
      changeMonth: true,
        maxDate: '0', 
				beforeShow : function()
				{
					jQuery( this ).datepicker('option','minDate', jQuery('#datepicker6').val() );
				} , 
      changeYear: true
    });
  } );
  </script> 

<tr>
                    <td> 
                        
                        
                          <select name="art_drug" required id="art_drug" style="width:120px">   
                        
                        <?php
if (!empty ($art_drug ['0'])) {
$art_drug_row1=explode("-",$art_drug ['0']); 
    $drug_array_size = sizeof ($art_drug_row1);
    if ($drug_array_size >0){
    echo '<option>'.$art_drug_row1 ['0'].'</option>';
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
                      <td> 
                        
                        
                          <select name="art_drug_b" required id="art_drug" style="width:120px">   
                        
                        <?php
if (!empty ($art_drug ['0'])) {
$art_drug_row1=explode("-",$art_drug ['0']); 
    $drug_array_size = sizeof ($art_drug_row1);
    if ($drug_array_size >1){
    echo '<option>'.$art_drug_row1 ['1'].'</option>';
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
                      <td> 
                        
                        
                          <select name="art_drug_c" required id="art_drug" style="width:120px">   
                        
                        <?php
if (!empty ($art_drug ['0'])) {
$art_drug_row1=explode("-",$art_drug ['0']); 
    $drug_array_size = sizeof ($art_drug_row1);
    if ($drug_array_size >2){
    echo '<option>'.$art_drug_row1 ['2'].'</option>';
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
                    <td> <input type="text" name="start_date"  value="<?php
if (!empty ($treat_start_date ['0'])) {
echo $treat_start_date ['0'];
}
else {
echo '';
} ?>" id="datepicker6" /> </td>
                     <td> <input type="text" name="stop_date"   value="<?php
if (!empty ($treat_stop_date ['0'])) {
echo $treat_stop_date ['0'];
}
else {
echo '';
} ?>" id="datepicker7" onchange="updatedate();" /> </td>
                    <td><textarea name="reason_for_change">
                        <?php
if (!empty ($treat_reason_for_change ['0'])) {
echo $treat_reason_for_change ['0'];
}
else {
echo '';
} ?>
                        </textarea></td>
                  </tr>