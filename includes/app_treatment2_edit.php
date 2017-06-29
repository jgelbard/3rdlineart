
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
				              
                datepicker16: {
					required: true,
					
				},
                art_drug2: {
					required: true,
					
				},
                art_drug3: {
					required: true,
					
				},
                art_drug4: {
					required: true,
					
				},
                art_drug5: {
					required: true,
					
				},
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
								
                datepicker16: {
					required: "Please Select ART drug"
				}, 
                
                art_drug2: {
					required: "Please Select ART drug"
				},
                
                art_drug3: {
					required: "Please Select ART drug"
				},
                art_drug4: {
					required: "Please Select ART drug"
				},
                art_drug5: {
					required: "Please Select ART drug"
				},
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
  <h2 style="background-color:#f8f7f7; text-align:center">CD4 &VL Monitoring</h2>
                        <!--   <hr style=" border: 2px solid #1c952f;" />  --> 
<?php

global $pat_id;
$pat_id= $_GET['pat_id'];
/*echo $pat_id;*/
if(isset($_GET['xx'])){ 
$age= $_GET['xx'];
}


$patient=mysqli_query( $bd,"SELECT * FROM patient where id='$pat_id' "); 
    $row_pat=mysqli_fetch_array($patient);
        
        $art_id_num =$row_pat['art_id_num'];
        $firstname =$row_pat['firstname'];
        $lastname =$row_pat['lastname'];
        $gender =$row_pat['gender'];
        $dob =$row_pat['dob'];
        $vl_sample_id =$row_pat['vl_sample_id'];

$client_name = $firstname.' '.$lastname;

//monitoring
$monitoring=mysqli_query( $bd,"SELECT * FROM monitoring where pat_id='$pat_id' "); 
    while ( $row_monitoring=mysqli_fetch_array($monitoring)){
        
        $monito_date []=$row_monitoring['monito_date'];
        $cd4 []=$row_monitoring['cd4'];
        $vl []=$row_monitoring['vl'];
        $reason_4_detectable_vl []=$row_monitoring['reason_4_detectable_vl'];
        $weight []=$row_monitoring['weight'];
        
    }

echo '
<form id="edit-profile" class="form-horizontal" action="app.php?pat_id='.$pat_id.'" method="post">

';
?> 

<h3>Client Name: <strong><i style="background-color:#f8f7f7; color:red"><?php echo $client_name; ?></i></strong></h3>

<input type="hidden" name="pat_id" value="<?php echo $pat_id; ?>" />
 <input type="hidden" name="dob" value="<?php echo $dob; ?>"  /> 
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
     <!-- <hr style=" border: 1px solid #cbe509;" />
    <h3>Monitoring</h3>-->
<fieldset>
    <table style="width:90%" border="0">
                <thead>
                  <tr>
                    <th> Monitoring Date</th>
                    <th> CD4 ( <i>cells/ul</i> )</th>
                    <th> VL  ( <i>copies/ml</i> )</th> 
                    <th> Reason for detectable VL (Non-adherence, treatment break)</th>
                    <th> Weight (kg)</th>
                   
                  </tr>
                </thead>
                <tbody>
                    
                  <tr>
                    <td> <input type="text" name="monito_date" id="datepicker16" required value="<?php 
if (!empty ($monito_date ['0'])) { echo $monito_date ['0']; } ?>" /> </td>
                    <td> <input type="number" name="cd4" style="width:120px" value="<?php 
if (!empty ($cd4 ['0'])) { echo $cd4 ['0']; } ?>" /> </td>
                    <td> <input type="number" name="vl" style="width:120px" value="<?php 
if (!empty ( $vl ['0'])) { echo  $vl ['0']; } ?>" /> </td>
                   <td><textarea name="reason_4_detectable_vl" >
                         <?php 
if (!empty ( $reason_4_detectable_vl ['0'])) { echo $reason_4_detectable_vl ['0']; } ?>
                        </textarea></td>
                       <td> <input type="number" name="weight" value="<?php 
if (!empty ( $weight ['0'])) { echo  $weight ['0']; } ?>" /> </td>
                  </tr>  
                    
                    <tr>
                    <td> <input type="text" name="monito_date2" id="datepicker17" required value="<?php 
if (!empty ($monito_date ['1'])) { echo $monito_date ['1']; } ?>" /> </td>
                    <td> <input type="number" name="cd42"  value="<?php 
if (!empty ($cd4 ['1'])) { echo $cd4 ['1']; } ?>" style="width:120px" /> </td>
                    <td> <input type="number" name="vl2"   value="<?php 
if (!empty ( $vl ['1'])) { echo  $vl ['1']; } ?>" style="width:120px" /> </td>
                   <td><textarea name="reason_4_detectable_vl2"  value="">
<?php 
if (!empty ( $reason_4_detectable_vl ['1'])) { echo $reason_4_detectable_vl ['1']; } ?>   
                        </textarea></td>
                       <td> <input type="number" name="weight2"  value="<?php 
if (!empty ( $weight ['1'])) { echo  $weight ['1']; } ?>"/> </td>
                  </tr> 
                      
                  <tr>
                   <td> <input type="text" name="monito_date3" id="datepicker18"  value="<?php 
if (!empty ($monito_date ['2'])) { echo $monito_date ['2']; } ?>"/> </td>
                    <td> <input type="number" name="cd43"  value="<?php 
if (!empty ($cd4 ['2'])) { echo $cd4 ['2']; } ?>" style="width:120px" /> </td>
                    <td> <input type="number" name="vl3"    value="<?php 
if (!empty ( $vl ['2'])) { echo  $vl ['2']; } ?>" style="width:120px" /> </td>
                   <td><textarea name="reason_4_detectable_vl3"  value="">
 <?php 
if (!empty ( $reason_4_detectable_vl ['2'])) { echo $reason_4_detectable_vl ['2']; } ?>                       
                        </textarea></td>
                       <td> <input type="number" name="weight3"  value="<?php 
if (!empty ( $weight ['2'])) { echo  $weight ['2']; } ?>"  /> </td>
                  </tr>  
                     <tr>
                    <td> <input type="text" name="monito_date4" id="datepicker19" value="<?php 
if (!empty ($monito_date ['3'])) { echo $monito_date ['3']; } ?>" /> </td>
                    <td> <input type="number" name="cd44"  value="<?php 
if (!empty ($cd4 ['3'])) { echo $cd4 ['3']; } ?>" style="width:120px" style="width:120px" /> </td>
                    <td> <input type="number" name="vl4"   value="<?php 
if (!empty ( $vl ['3'])) { echo  $vl ['3']; } ?>" style="width:120px" /> </td>
                   <td><textarea name="reason_4_detectable_vl4"  value="">
 <?php 
if (!empty ( $reason_4_detectable_vl ['3'])) { echo $reason_4_detectable_vl ['3']; } ?>                       
                        </textarea></td>
                       <td> <input type="number" name="weight4"  value="<?php 
if (!empty ( $weight ['3'])) { echo  $weight ['3']; } ?>" /> </td>
                  </tr>  
                    
                    <tr>
                   <td> <input type="text" name="monito_date5" id="datepicker20" value="<?php 
if (!empty ($monito_date ['4'])) { echo $monito_date ['4']; } ?>"/> </td>
                    <td> <input type="number" name="cd45"  value="<?php 
if (!empty ($cd4 ['4'])) { echo $cd4 ['4']; } ?>" style="width:120px" /> </td>
                    <td> <input type="number" name="vl5"   value="<?php 
if (!empty ( $vl ['4'])) { echo  $vl ['4']; } ?>" style="width:120px" /> </td>
                   <td><textarea name="reason_4_detectable_vl5"  value="">
 <?php 
if (!empty ( $reason_4_detectable_vl ['4'])) { echo $reason_4_detectable_vl ['4']; } ?>                       
                        </textarea></td>
                       <td> <input type="number" name="weight5"  value="<?php 
if (!empty ( $weight ['4'])) { echo  $weight ['4']; } ?>" /> </td>
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
                    </script>
   <tr>
                   
       <td> <input type="text" name="monito_date6" id="datepicker21" value="<?php 
if (!empty ($monito_date ['5'])) { echo $monito_date ['5']; } ?>" /> </td>
                    <td> <input type="number" name="cd46"  value="<?php 
if (!empty ($cd4 ['5'])) { echo $cd4 ['5']; } ?>" style="width:120px" /> </td>
                    <td> <input type="number" name="vl6"  value="" style="width:120px" /> </td>
                   <td><textarea name="reason_4_detectable_vl6"  value="">
 <?php 
if (!empty ( $reason_4_detectable_vl ['5'])) { echo $reason_4_detectable_vl ['5']; } ?>                       
                        </textarea></td>
                       <td> <input type="number" name="weight6"  value="<?php 
if (!empty ( $weight ['5'])) { echo  $weight ['5']; } ?>"/> </td>
                      <td><form action="#">
        <div class="box1">
    <input type="button" name="row6" class="btn btn-success" value="+" />
        </div>
    </form></td>
                  </tr> 
                    
                    <tr  class="row6 box">
                    <td> <input type="text" name="monito_date7" id="datepicker22" value="<?php 
if (!empty ($monito_date ['6'])) { echo $monito_date ['6']; } ?>" /> </td>
                    <td> <input type="number" name="cd47"  value="<?php 
if (!empty ($cd4 ['6'])) { echo $cd4 ['6']; } ?>" style="width:120px" /> </td>
                    <td> <input type="number" name="vl7"   value="<?php 
if (!empty ( $vl ['6'])) { echo  $vl ['6']; } ?>" style="width:120px" /> </td>
                   <td><textarea name="reason_4_detectable_vl7"  value="">
<?php 
if (!empty ( $reason_4_detectable_vl ['6'])) { echo $reason_4_detectable_vl ['6']; } ?>                        
                        </textarea></td>
                       <td> <input type="number" name="weight7"  value="<?php 
if (!empty ( $weight ['6'])) { echo  $weight ['6']; } ?>" /> </td>
                     <td><form action="#">
        <div class="box2">
    <input type="button" name="row7" class="btn btn-success" value="+" />
    <input type="button" name="row5" class="btn btn-danger" value="-" />
        </div>
    </form></td>
                  </tr> 
                    
                    <tr  class="row7 box">
                    <td> <input type="text" name="monito_date8" id="datepicker23" value="<?php 
if (!empty ($monito_date ['7'])) { echo $monito_date ['7']; } ?>" /> </td>
                    <td> <input type="number" name="cd48"  value="<?php 
if (!empty ($cd4 ['7'])) { echo $cd4 ['7']; } ?>" style="width:120px" /> </td>
                    <td> <input type="number" name="vl8"   value="<?php 
if (!empty ( $vl ['7'])) { echo  $vl ['7']; } ?>" style="width:120px" /> </td>
                   <td><textarea name="reason_4_detectable_vl8"  value="">
 <?php 
if (!empty ( $reason_4_detectable_vl ['7'])) { echo $reason_4_detectable_vl ['7']; } ?>                       
                        </textarea></td>
                       <td> <input type="number" name="weight8"  value="<?php 
if (!empty ( $weight ['7'])) { echo  $weight ['7']; } ?>" /> </td>
                     <td><form action="#">
        <div class="box3">
    <input type="button" name="row8" class="btn btn-success" value="+" />
    <input type="button" name="row6" class="btn btn-danger" value="-" />
        </div>
    </form></td>
                  </tr>  
                    <tr  class="row8 box">
                    <td> <input type="text" name="monito_date9" id="datepicker24" value="<?php 
if (!empty ($monito_date ['8'])) { echo $monito_date ['8']; } ?>" /> </td>
                    <td> <input type="number" name="cd49"  value="<?php 
if (!empty ($cd4 ['8'])) { echo $cd4 ['8']; } ?>" style="width:120px" /> </td>
                    <td> <input type="number" name="vl9"   value="<?php 
if (!empty ( $vl ['8'])) { echo  $vl ['8']; } ?>" style="width:120px"/> </td>
                   <td><textarea name="reason_4_detectable_vl9"  value="">
 <?php 
if (!empty ( $reason_4_detectable_vl ['8'])) { echo $reason_4_detectable_vl ['8']; } ?>                       
                        </textarea></td>
                       <td> <input type="number" name="weight9"  value="<?php 
if (!empty ( $weight ['8'])) { echo  $weight ['8']; } ?>" /> </td>
                    <td><form action="#">
        <div class="box4">
    <input type="button" name="row9" class="btn btn-success" value="+" />
    <input type="button" name="row7" class="btn btn-danger" value="-" />
        </div>
    </form></td>
                  </tr> 
                <tr  class="row9 box">
                   <td> <input type="text" name="monito_date10" id="datepicker25" value="<?php 
if (!empty ($monito_date ['9'])) { echo $monito_date ['9']; } ?>" /> </td>
                    <td> <input type="number" name="cd410"  value="<?php 
if (!empty ($cd4 ['9'])) { echo $cd4 ['9']; } ?>" style="width:120px" /> </td>
                    <td> <input type="number" name="vl10"   value="<?php 
if (!empty ( $vl ['9'])) { echo  $vl ['9']; } ?>" style="width:120px"/> </td>
                   <td><textarea name="reason_4_detectable_vl10"  value="">
<?php 
if (!empty ( $reason_4_detectable_vl ['9'])) { echo $reason_4_detectable_vl ['9']; } ?>                        
                        </textarea></td>
                       <td> <input type="number" name="weight10"  value="<?php 
if (!empty ( $weight ['9'])) { echo  $weight ['9']; } ?>" /> </td>
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
               <a class="btn" href="app.php?back_treatment1<?php echo '&pat_id='.$pat_id.'&g='.$gender.'&xx='.$age.'' ?>" style="padding:10px; font-size:180%">Back</a>                                                                                                                                    </div> 
                                                                                                                                                   <div class="span3"><!--
											<button type="submit" class="btn btn-primary" style="padding:10px; font-size:180%">Save</button> -->.
											
                                            </div>
                                            
                                            <div class="span3">
											<button type="submit" class="btn btn-success" style="padding:10px; font-size:180%" name="update_treatment2">Next</button> 
                                            </div>
                          </div>
    
</form>