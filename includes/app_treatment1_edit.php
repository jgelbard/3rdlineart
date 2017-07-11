
  <script>
	/*$.validator.setDefaults({
		submitHandler: function() {
			alert("submitted!");
		}
	});*/

	$().ready(function() {
		// validate the comment form when it is submitted
		$("#commentForm").validate();

        $("#search_art").validate({
            
            rules: {
				
				id: {
					required: true,
					
				},
                
			},
			messages: {
				id: {
					required: "",
				},
				
			}
		});

		// validate clinic staus form on keyup and submit
		$("#edit-profile").validate({
			rules: {
				firstname: "required",
				lastname: "required",
				              
                art_drug: {
					required: true,
					
				},
                art_drug2: {
					required: true,
					
				},
                art_drug3: {
					required: true,
					
				},/*
                art_drug4: {
					required: true,
					
				},
                art_drug5: {
					required: true,
					
				},*/
                curr_who_stage: {
					required: true,
					
				},
                weight: {
					required: true,
					minlength: 2,
					maxlength: 3
				},
			 height: {
					required: true,
					minlength: 3,
					maxlength: 3
				},
			
			},
			messages: {
				firstname: "Please enter Client's firstname",
				lastname: "Please enter Client's lastname",
								
                art_drug: {
					required: "Please Select ART drug"
				}, 
                
                art_drug2: {
					required: "Please Select ART drug"
				},
                
                art_drug3: {
					required: "Please Select ART drug"
				},
               /* art_drug4: {
					required: "Please Select ART drug"
				},
                art_drug5: {
					required: "Please Select ART drug"
				},*/
                curr_who_stage: {
					required: "Please Select Current WHO stage"
				},
                weight: {
					required: "Curr Weight",
					minlength: "Under weight",
					maxlength: "Over weight"
					
				}, 
                height: {
					required: "Curr Height",
					minlength: "Under Height",
					maxlength: "Over Height"
					
				},
               
			}
		});

	
	});
  </script>

 
  <h2 style="background-color:#f8f7f7; text-align:center">ART Treatment History</h2>
                        <!--   <hr style=" border: 2px solid #1c952f;" />  --> 
<?php

global $pat_id;
$pat_id= $_GET['pat_id'];

if(isset($_GET['xx'])){ 
$age= $_GET['xx'];
}

/*echo $pat_id;*/

$patient=mysqli_query( $bd,"SELECT * FROM patient where id='$pat_id' "); 
    $row_pat=mysqli_fetch_array($patient);
        
        $art_id_num =$row_pat['art_id_num'];
        $firstname =$row_pat['firstname'];
        $lastname =$row_pat['lastname'];
        $gender =$row_pat['gender'];
        $dob =$row_pat['dob'];
        $vl_sample_id =$row_pat['vl_sample_id'];

$client_name = $firstname.' '.$lastname;


//treatement history
$treatment_history=mysqli_query( $bd,"SELECT * FROM treatment_history where pat_id='$pat_id' "); 
      while ($row_treatment_history=mysqli_fetch_array($treatment_history)){
        
        $art_drug [] =$row_treatment_history['art_drug'];
        $treat_start_date [] =$row_treatment_history['start_date'];
        $treat_stop_date [] =$row_treatment_history['stop_date'];
        $treat_reason_for_change [] =$row_treatment_history['reason_for_change'];
      }

echo '
<form id="edit-profile" class="form-horizontal" action="app.php?pat_id='.$pat_id.'" method="post">';
?> 

<h3>Client Name: <strong><i style="background-color:#f8f7f7; color:red"><?php echo $client_name; ?></i></strong></h3>

<input type="hidden" name="pat_id" value="<?php echo $pat_id; ?>" style="background-color:#fff; border:none; height:20px; color:#fff; position:relative; top:-300px;"/>
 <input type="hidden" name="dob" value="<?php echo $dob; ?>" style="background-color:#fff; border:none; height:20px; color:#fff; position:relative; top:-300px;" /> 
<fieldset>
                            <table style="width:100%" border="0">
                <thead>
                  <tr>
                    <th> ART Drugs</th>
                    <th> Start Date</th>
                    <th> Stop Date</th>
                    <th> Reason for changes (toxicities?)</th>
                   
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td> 
                        
                        
                          <select name="art_drug" required id="art_drug">   
                        
                        <?php
if (!empty ($art_drug ['0'])) {
echo $art_drug ['0'];
echo '<option>'.$art_drug ['0'].'</option>';
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
                    <td> <input type="text" name="start_date" required  value="<?php
if (!empty ($treat_start_date ['0'])) {
echo $treat_start_date ['0'];
}
else {
echo '';
} ?>" id="datepicker6" /> </td>
                     <td> <input type="text" name="stop_date" required  value="<?php
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
                       <script>
  $( function() {
    $( "#datepicker6" ).datepicker({
      changeMonth: true,
      changeYear: true
    });
  } );
  </script>
                       <script>
  $( function() {
    $( "#datepicker7" ).datepicker({
      changeMonth: true,
      changeYear: true
    });
  } );
  </script>
                    <script>
  $( function() {
    $( "#datepicker8" ).datepicker({
      changeMonth: true,
      changeYear: true
    });
  } );
  </script>
                    <script>
  $( function() {
    $( "#datepicker9" ).datepicker({
      changeMonth: true,
      changeYear: true
    });
  } );
  </script>
                    <script>
  $( function() {
    $( "#datepicker10" ).datepicker({
      changeMonth: true,
      changeYear: true
    });
  } );
  </script>
                    <script>
  $( function() {
    $( "#datepicker11" ).datepicker({
      changeMonth: true,
      changeYear: true
    });
  } );
  </script>
                    <script>
  $( function() {
    $( "#datepicker12" ).datepicker({
      changeMonth: true,
      changeYear: true
    });
  } );
  </script>
                    <script>
  $( function() {
    $( "#datepicker13" ).datepicker({
      changeMonth: true,
      changeYear: true
    });
  } );
  </script>
                    <script>
  $( function() {
    $( "#datepicker14" ).datepicker({
      changeMonth: true,
      changeYear: true
    });
  } );
  </script>
                    <script>
  $( function() {
    $( "#datepicker15" ).datepicker({
      changeMonth: true,
      changeYear: true
    });
  } );
  </script>
                     <script>
  $( function() {
    $( "#datepicker16" ).datepicker({
      changeMonth: true,
      changeYear: true
    });
  } );
  </script>
                     <script>
  $( function() {
    $( "#datepicker17" ).datepicker({
      changeMonth: true,
      changeYear: true
    });
  } );
  </script>
                     <script>
  $( function() {
    $( "#datepicker18" ).datepicker({
      changeMonth: true,
      changeYear: true
    });
  } );
  </script>
                     <script>
  $( function() {
    $( "#datepicker19" ).datepicker({
      changeMonth: true,
      changeYear: true
    });
  } );
  </script>
                     <script>
  $( function() {
    $( "#datepicker20" ).datepicker({
      changeMonth: true,
      changeYear: true
    });
  } );
  </script>
                     <script>
  $( function() {
    $( "#datepicker21" ).datepicker({
      changeMonth: true,
      changeYear: true
    });
  } );
  </script>
                     <script>
  $( function() {
    $( "#datepicker22" ).datepicker({
      changeMonth: true,
      changeYear: true
    });
  } );
  </script>
                     <script>
  $( function() {
    $( "#datepicker23" ).datepicker({
      changeMonth: true,
      changeYear: true
    });
  } );
  </script>
                     <script>
  $( function() {
    $( "#datepicker24" ).datepicker({
      changeMonth: true,
      changeYear: true
    });
  } );
  </script>
                    
                      <script>
  $( function() {
    $( "#datepicker24" ).datepicker({
      changeMonth: true,
      changeYear: true
    });
  } );
  </script>
                    
                      <script>
  $( function() {
    $( "#datepicker24" ).datepicker({
      changeMonth: true,
      changeYear: true
    });
  } );
  </script>                   <script>
  $( function() {
    $( "#datepicker25" ).datepicker({
      changeMonth: true,
      changeYear: true
    });
  } );
  </script>
                    <tr>
                     <td>  <select name="art_drug2" required id="art_drug2">
                      <?php
if (!empty ($art_drug ['1'])) {
echo '<option>'.$art_drug ['1'].'</option>';
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
                    <td> <input type="text" name="start_date2" required  value="<?php
if (!empty ($treat_start_date ['1'])) {
echo $treat_start_date ['1'];
}
else {
echo '';
} ?>" id="datepicker8" /> </td>
                     <td> <input type="text" name="stop_date2" required id="datepicker9" value="<?php
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
                     <tr>
                      <td>  <select name="art_drug3" required id="art_drug3">
                        <?php
if (!empty ($art_drug ['2'])) {
echo '<option>'.$art_drug ['2'].'</option>';
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
                    <td> <input type="text" name="start_date3" required id="datepicker10" value="<?php
if (!empty ($treat_start_date ['2'])) {
echo $treat_start_date ['2'];
}
else {
echo '';
} ?>"/> </td>
                     <td> <input type="text" name="stop_date3" required id="datepicker11" value="<?php
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
                     <tr>
                      <td>  <select name="art_drug4" required id="art_drug4">
              <?php
if (!empty ($art_drug ['3'])) {
echo '<option>'.$art_drug ['3'].'</option>';
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
                    <td> <input type="text" name="start_date4" required id="datepicker12" value="<?php
if (!empty ($treat_start_date ['3'])) {
echo $treat_start_date ['3'];
}
else {
echo '';
} ?>"/> </td>
                     <td> <input type="text" name="stop_date4" required id="datepicker13" value="<?php
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
                    
                     <tr>
                      <td>  <select name="art_drug5"  id="art_drug5">
                      <?php
if (!empty ($art_drug ['4'])) {
echo '<option>'.$art_drug ['4'].'</option>';
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
                    
                   <script type="text/javascript">
$(document).ready(function(){
    $('input[type="button"]').click(function(){
        
        if($(this).attr("name")=="row6"){
            $(".box").not(".row6").hide();
            $(".box1").not(".row6").hide();
            $(".row7").not(".row6").hide();
            $(".row8").not(".row6").hide();
            $(".box2").show();
            $(".row6").show();
        } 
        if($(this).attr("name")=="row5"){
           $(".row6").not(".row5").hide();
            $(".box1").show();
           
        }
        if($(this).attr("name")=="row7"){
            $(".box2").not(".row7").hide();
            $(".row8").not(".row7").hide();
            $(".box3").show();
            $(".row7").show();
        } 
        
        if($(this).attr("name")=="row8"){
            $(".box3").not(".row8").hide();
            $(".row9").not(".row8").hide();
            $(".endline").not(".row8").hide();
            $(".box4").show();
            $(".row8").show();
        }
        
         if($(this).attr("name")=="row9"){
            $(".box4").not(".row9").hide();
            $(".row9").show();
        }
        if($(this).attr("name")=="endline"){
           
            $(".box1").not(".endline").hide();
            $(".box2").not(".endline").hide();
            $(".endline").show();
        }
        
    });
});
                       
/*$(document).ready(function(){
    $('input[type="button"]').click(function(){
        
        if($(this).attr("name")=="row10"){
            $(".row9").not(".row10").hide();
            $(".box1").not(".row10").hide();
            $(".endline").not(".row10").hide();
            $(".box4").show();
            $(".row8").show();
        }
        if($(this).attr("name")=="row7"){
            $(".row8").not(".row7").hide();
            $(".box1").not(".row7").hide();
            $(".box3").show();
            $(".row7").show();
        }
        
        if($(this).attr("name")=="row6"){
            $(".row7").not(".row6").hide();
            $(".box1").not(".row6").hide();
            $(".box2").show();
            $(".row6").show();
        }
        
    });
});*/
</script>

                  <tr>
                    <td> 
                          <select name="art_drug6">   
                       <?php
if (!empty ($art_drug ['5'])) {
echo '<option>'.$art_drug ['5'].'</option>';
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
                    
                    <tr  class="row6 box">
                    <td> 
                          <select name="art_drug7">   
                       <?php
if (!empty ($art_drug ['5'])) {
echo '<option>'.$art_drug ['5'].'</option>';
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
                    
                    <tr  class="row7 box">
                    <td> 
                          <select name="art_drug8">   
                       <?php
if (!empty ($art_drug ['7'])) {
echo '<option>'.$art_drug ['7'].'</option>';
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
                    <tr  class="row8 box">
                    <td> 
                          <select name="art_drug9">   
                      <?php
if (!empty ($art_drug ['8'])) {
echo '<option>'.$art_drug ['8'].'</option>';
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
                <tr  class="row9 box">
                    <td> 
                          <select name="art_drug10">   
                       <?php
if (!empty ($art_drug ['9'])) {
echo '<option>'.$art_drug ['9'].'</option>';
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
                    
         </tbody>
    </table>
</fieldset>
    
                      <div class="form-actions">
                                                                                                                                                   <div class="span3">
             <a class="btn" href="app.php?back&back_3<?php echo '&pat_id='.$pat_id.'&g='.$gender.'&xx='.$age.'' ?>" style="padding:10px; font-size:180%">Back</a>                                                                                                                                      </div> 
                                                                                                                                                   <div class="span3"><!--
											<button type="submit" class="btn btn-primary" style="padding:10px; font-size:180%">Save</button> -->.
											
                                            </div>
                                            
                                            <div class="span3">
											<button type="submit" class="btn btn-success" style="padding:10px; font-size:180%" name="update_treatment1">Next</button> 
                                            </div>
                          </div>
    
</form>
<script type="text/javascript" charset="utf-8">   

function updatedate(){ 
    
datepicker7 = document.getElementById("datepicker7").value;         
document.getElementById("datepicker8").value = datepicker7;  
}
    function updatedate2(){ 
datepicker9 = document.getElementById("datepicker9").value;         
document.getElementById("datepicker10").value = datepicker9; 
    
} 
    function updatedate3(){ 
datepicker11 = document.getElementById("datepicker11").value;         
document.getElementById("datepicker12").value = datepicker11; 
    
} 
    function updatedate4(){ 
datepicker13 = document.getElementById("datepicker13").value;         
document.getElementById("datepicker14").value = datepicker13; 
    
} 
    function updatedate5(){ 
datepicker15 = document.getElementById("datepicker15").value;         
document.getElementById("datepicker16").value = datepicker15; 
    
}  
    function updatedate6(){ 
datepicker17 = document.getElementById("datepicker17").value;         
document.getElementById("datepicker18").value = datepicker17; 
    
}  
    function updatedate7(){ 
datepicker19 = document.getElementById("datepicker19").value;         
document.getElementById("datepicker20").value = datepicker19; 
    
}   
    function updatedate8(){ 
datepicker21 = document.getElementById("datepicker21").value;         
document.getElementById("datepicker22").value = datepicker21; 
    
}    
    function updatedate9(){ 
datepicker23 = document.getElementById("datepicker23").value;         
document.getElementById("datepicker24").value = datepicker23; 
    
} 
	</script>






