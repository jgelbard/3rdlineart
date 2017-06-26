<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $('input[type="radio"]').click(function(){
        if($(this).attr("value")=="Yes_preg"){
            $(".box").not(".yes").hide();
            $(".yes").show();
        }
        if($(this).attr("value")=="No_preg"){
            $(".box").not(".no").hide();
            $(".no").show();
        }
        
    });
});
</script>

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
				              
                who_stage: {
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
								
                who_stage: {
					required: "Please Select WHO stage"
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
					required: "Curr Weight",
					minlength: "Under Height",
					maxlength: "Over Height"
					
				},
               
			}
		});

	
	});
	</script>

<?php

global $pat_id;
$pat_id= $_GET['pat_id'];

$patient=mysql_query("SELECT * FROM patient where id='$pat_id' ", $bd); 
    $row_pat=mysql_fetch_array($patient);
        
        $art_id_num =$row_pat['art_id_num'];
        $firstname =$row_pat['firstname'];
        $lastname =$row_pat['lastname'];
        $gender =$row_pat['gender'];
        $dob =$row_pat['dob'];
        $vl_sample_id =$row_pat['vl_sample_id'];

//pregnacy for females age greater than 10
$pregnancy=mysql_query("SELECT * FROM pregnancy where pat_id='$pat_id' ", $bd); 
    $row_pregnancy=mysql_fetch_array($pregnancy);
        
        $pregnant =$row_pregnancy['pregnant'];
        $weeks_o_preg =$row_pregnancy['weeks_o_preg'];
        $breastfeeding =$row_pregnancy['breastfeeding'];
      
    

$client_name = $firstname.' '.$lastname;


echo '
<form id="edit-profile" class="form-horizontal" action="app.php?pat_id='.$pat_id.'&xx='.$age.'" method="post">

';
?>
<input type="hidden" name="pat_id" value="<?php echo $pat_id; ?>" />
 <input type="hidden" name="dob" value="<?php echo $dob; ?>" /> 
<h2 style="background-color:#f8f7f7; text-align:center"> Pregnancy Section</h2>
<h3>Client Name: <strong><i style="background-color:#f8f7f7; color:red"><?php echo $client_name; ?></i></strong></h3>
                           <hr style=" border: 2px solid #1c952f;" />
<fieldset>
                            <table style="width:100%" border="0">
                             <div class="box">
                                  <tr>
                                      
                          <td>
                                  
                            <label class="control-label">Is the patient currently pregnant?</label>
                           
                             
                                  <div style="width:110px; float:left" class="radio_sty">
    <input type="radio" id="yes_pregnant" name="pregnant" value="Yes_preg"  <?php if ($pregnant=='Yes'){ echo ' checked="checked" '; } ?> required>
    <label for="yes_pregnant">Yes</label>
    
    <div class="check">
		</div>
  </div>
    <div style="width:100px; float:left" class="radio_sty">
    <input type="radio" id="no_pregnant" name="pregnant" value="No_preg" <?php if ($pregnant=='No'){ echo ' checked="checked" '; } ?>>
    <label for="no_pregnant">No</label>
    
    <div class="check">
		</div>
  </div>
                           
                                 
</td>    
                           
                                      <td class="yes box">
                                           
                                          <p>Week of Pregnancy </p>
                                          
                          </td>
                          <td class="yes box">
                               
                              <select name="weeks_o_preg">
                                  <?php
                                if ($pregnant=='Yes'){
                            
                                  echo '<option>'.$weeks_o_preg.'</option>';
                                  
                                  } 
                                if ($pregnant=='No'){
                            
                                  echo '<option>Number of weeks</option>';
                                  
                                  }

                                  
                                  for ($wk=0; $wk < 60; $wk ++ ){
                              echo '<option>'.$wk.'</option>';
                              }
?>
                              </select>
                            
                          </td> 
                                        
                                      
                          </tr>
                                </div>
</table>
</fieldset>
<fieldset>
                         <table style="width:100%" border="0">
                               <tr>
                          <td>
                            <label class="control-label">Is the patient breastfeeding?</label>
                             
                              
                                 <div style="width:110px; float:left" class="radio_sty">
    <input type="radio" id="yes_breastfeeding" name="breastfeeding" value="Yes"  <?php 
 if ($breastfeeding=='Yes'){ echo ' checked="checked" '; } ?> required>
    <label for="yes_breastfeeding">Yes</label>
    
    <div class="check">
		</div>
  </div>
    <div style="width:100px; float:left" class="radio_sty">
    <input type="radio" id="no_breastfeeding" name="breastfeeding" value="No" <?php 
 if ($breastfeeding=='No'){ echo ' checked="checked" '; } ?> >
    <label for="no_breastfeeding">No</label>
    
    <div class="check">
		</div>
  </div>
             
</td>    
                                      <td>
                             
                          </td>
                          <td>
                             
                          </td> 
                          </tr>
                          </table>
</fieldset>
                      <div class="form-actions">
                                                                                                                                                    <div class="span3">
               <a class="btn" href="app.php?back&part_2<?php echo '&pat_id='.$pat_id.'&g='.$gender.'&xx='.$age.'' ?>" style="padding:10px; font-size:180%">Back</a>                                                                                                                                    </div>                                                                                                                   <div class="span3"><!--
											<button type="submit" class="btn btn-primary" style="padding:10px; font-size:180%">Save</button> -->.
											
                                            </div>
                                            
                                            <div class="span3">
											<button type="submit" class="btn btn-success" style="padding:10px; font-size:180%" name="update_Preg">Next</button> 
                                            </div>
                          </div>
    
</form>