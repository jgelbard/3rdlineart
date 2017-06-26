
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

  <h2 style="background-color:#f8f7f7; text-align:center">Pediatric Section</h2>
  <hr style=" border: 2px solid #5e09e5;" />
<?php

global $pat_id;
$pat_id= $_GET['pat_id'];
/*echo $pat_id;*/

 $patient=mysql_query("SELECT * FROM patient where id='$pat_id' ", $bd); 
    $row_pat=mysql_fetch_array($patient);
        
        $art_id_num =$row_pat['art_id_num'];
        $firstname =$row_pat['firstname'];
        $lastname =$row_pat['lastname'];
        $gender =$row_pat['gender'];
        $dob =$row_pat['dob'];
        $vl_sample_id =$row_pat['vl_sample_id'];

$client_name = $firstname.' '.$lastname;

//pediatric age < 3
$pediatric=mysql_query("SELECT * FROM pediatric where pat_id='$pat_id' ", $bd); 
    $row_pediatric=mysql_fetch_array($pediatric);
        
        $mother_had_single_dose_NVP =$row_pediatric['mother_had_single_dose_NVP'];
        $given_NVP =$row_pediatric['given_NVP'];
        $mother_had_PMTCT =$row_pediatric['mother_had_PMTCT'];
        $swallow_tablets =$row_pediatric['swallow_tablets'];

echo '
<form id="edit-profile" class="form-horizontal" action="app.php?pat_id='.$pat_id.'" method="post">

';
?> 

<h3>Client Name: <strong><i style="color:red"><?php echo $client_name; ?></i></strong></h3>

<input type="hidden" name="pat_id" value="<?php echo $pat_id; ?>"   />
<input type="hidden" name="dob" value="<?php echo $dob; ?>"  /> 
                      
                        
        
                              <table style="width:100%" border="0">
                              <tr>
                                  
                          <td>
                            <label class="control-label">Has mother had single dose NVP?</label>
                              
                              <div style="width:110px; float:left" class="radio_sty">
    <input type="radio" id="yes_mother_had_single_dose_NVP" name="mother_had_single_dose_NVP" required value="Yes" <?php 

if (!empty ($mother_had_single_dose_NVP)) { if ($mother_had_single_dose_NVP =='Yes') { echo  'checked="checked"';} } ?>>
    <label for="yes_mother_had_single_dose_NVP">Yes</label>
    
    <div class="check">
		</div>
  </div>
    <div style="width:100px; float:left" class="radio_sty">
    <input type="radio" id="no_mother_had_single_dose_NVP" name="mother_had_single_dose_NVP" value="No" <?php 

if (!empty ($mother_had_single_dose_NVP)) { if ($mother_had_single_dose_NVP =='No') { echo  'checked="checked"';} } ?> >
    <label for="no_mother_had_single_dose_NVP">No</label>
    
    <div class="check">
		</div>
  </div>
                            
                         <!--    <div class="controls">
                                            <label class="radio inline">
                                              <input type="radio"  name="mother_had_single_dose_NVP" value="Yes" id="app_radio"> Yes
                                            </label>
                                            
                                            <label class="radio inline">
                                              <input type="radio" name="mother_had_single_dose_NVP" value="No" id="app_radio"> No
                                            </label>
                                          </div>	 /controls 	-->
</td>    
                          
                          <td>
                            <label class="control-label">Has mother had PMTCT?</label>
                               <div style="width:110px; float:left" class="radio_sty">
    <input type="radio" id="yes_given_NVP" name="given_NVP" required  value="Yes" <?php 

if (!empty ($given_NVP)) { if ($given_NVP =='Yes') { echo  'checked="checked"';} } ?> >
    <label for="yes_given_NVP">Yes</label>
    
    <div class="check">
		</div>
  </div>
    <div style="width:100px; float:left" class="radio_sty">
    <input type="radio" id="no_given_NVP" name="given_NVP" value="No" <?php 

if (!empty ($given_NVP)) { if ($given_NVP =='No') { echo  'checked="checked"';} } ?> >
    <label for="no_given_NVP">No</label>
    
    <div class="check">
		</div>
  </div>
                           <!--  <div class="controls">
                                            <label class="radio inline">
                                              <input type="radio"  name="given_NVP" value="Yes" id="app_radio"> Yes
                                            </label>
                                            
                                            <label class="radio inline">
                                              <input type="radio" name="given_NVP" value="No" id="app_radio"> No
                                            </label>
                                          </div>	 /controls 	-->
</td>    
                          </tr>  
                                   <table style="width:100%" border="0">
                              <tr>
                                  
                          <td>
                            <label class="control-label">Was baby given NVP?</label>
                              
                               <div style="width:110px; float:left" class="radio_sty">
    <input type="radio" id="yes_mother_had_PMTCT" name="mother_had_PMTCT" required  value="Yes" <?php 

if (!empty ($mother_had_PMTCT)) { if ($mother_had_PMTCT =='Yes') { echo  'checked="checked"';} } ?>>
    <label for="yes_mother_had_PMTCT">Yes</label>
    
    <div class="check">
		</div>
  </div>
    <div style="width:100px; float:left" class="radio_sty">
    <input type="radio" id="no_mother_had_PMTCT" name="mother_had_PMTCT" value="No" <?php 

if (!empty ($mother_had_PMTCT)) { if ($mother_had_PMTCT =='No') { echo  'checked="checked"';} } ?> >
    <label for="no_mother_had_PMTCT">No</label>
    
    <div class="check">
		</div>
  </div>
                           <!--  <div class="controls">
                                            <label class="radio inline">
                                              <input type="radio"  name="mother_had_PMTCT" value="Yes" id="app_radio"> Yes
                                            </label>
                                            
                                            <label class="radio inline">
                                              <input type="radio" name="mother_had_PMTCT" value="No" id="app_radio"> No
                                            </label>
                                          </div>	 /controls 	-->
</td>    
                          
                          <td>
                            <label class="control-label">Is the child able to swallow tablets?</label>
                              
                              <div style="width:110px; float:left" class="radio_sty">
    <input type="radio" id="yes_swallow_tablets" name="swallow_tablets" required  value="Yes" <?php 

if (!empty ($swallow_tablets)) { if ($swallow_tablets =='Yes') { echo  'checked="checked"';} } ?> >
    <label for="yes_swallow_tablets">Yes</label>
    
    <div class="check">
		</div>
  </div>
    <div style="width:100px; float:left" class="radio_sty">
    <input type="radio" id="no_swallow_tablets" name="swallow_tablets" value="No" <?php 

if (!empty ($swallow_tablets)) { if ($swallow_tablets =='No') { echo  'checked="checked"';} } ?> >
    <label for="no_swallow_tablets">No</label>
    
    <div class="check">
		</div>
  </div>
                           
</td>    
                          </tr>  
                                 
                                 
                                 
                              
                          </table>
    </table>
     <div class="form-actions">
                           <div class="span3">
               <a class="btn" href="app.php?back&part_2<?php echo '&pat_id='.$pat_id.'&g='.$gender.'&xx='.$age.'' ?>" style="padding:10px; font-size:180%">Back</a>                                                                                                                                    </div> 
                                                                                                                                                   <div class="span3"><!--
											<button type="submit" class="btn btn-primary" style="padding:10px; font-size:180%">Save</button> -->.
											
                                            </div>
                                            
                                            <div class="span3">
											<button type="submit" name="update_pediatric" class="btn btn-success" style="padding:10px; font-size:180%">Next</button> 
                                            </div>
                          </div>
    
</form>