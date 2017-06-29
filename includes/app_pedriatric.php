

  <h2 style="background-color:#f8f7f7; text-align:center">Pediatric Section</h2>
  <hr style=" border: 2px solid #5e09e5;" />
<?php

global $pat_id;
$pat_id= $_GET['pat_id'];
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
    <input type="radio" id="yes_mother_had_single_dose_NVP" name="mother_had_single_dose_NVP" value="Yes">
    <label for="yes_mother_had_single_dose_NVP">Yes</label>
    
    <div class="check">
		</div>
  </div>
    <div style="width:100px; float:left" class="radio_sty">
    <input type="radio" id="no_mother_had_single_dose_NVP" name="mother_had_single_dose_NVP" value="No" >
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
    <input type="radio" id="yes_given_NVP" name="given_NVP" value="Yes" >
    <label for="yes_given_NVP">Yes</label>
    
    <div class="check">
		</div>
  </div>
    <div style="width:100px; float:left" class="radio_sty">
    <input type="radio" id="no_given_NVP" name="given_NVP" value="No" >
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
    <input type="radio" id="yes_mother_had_PMTCT" name="mother_had_PMTCT" value="Yes" >
    <label for="yes_mother_had_PMTCT">Yes</label>
    
    <div class="check">
		</div>
  </div>
    <div style="width:100px; float:left" class="radio_sty">
    <input type="radio" id="no_mother_had_PMTCT" name="mother_had_PMTCT" value="No" >
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
    <input type="radio" id="yes_swallow_tablets" name="swallow_tablets" value="Yes" >
    <label for="yes_swallow_tablets">Yes</label>
    
    <div class="check">
		</div>
  </div>
    <div style="width:100px; float:left" class="radio_sty">
    <input type="radio" id="no_swallow_tablets" name="swallow_tablets" value="No" >
    <label for="no_swallow_tablets">No</label>
    
    <div class="check">
		</div>
  </div>
                            <!-- <div class="controls">
                                            <label class="radio inline">
                                              <input type="radio"  name="swallow_tablets" value="Yes" id="app_radio"> Yes
                                            </label>
                                            
                                            <label class="radio inline">
                                              <input type="radio" name="swallow_tablets" value="No" id="app_radio"> No
                                            </label>
                                          </div>	 /controls 	-->
</td>    
                          </tr>  
                                 
                                 
                                 
                              
                          </table>
    </table>
     <div class="form-actions">
                           <div class="span3">
               <button class="btn" style="padding:10px; font-size:180%"><a href="app.php?back&part_2<?php echo '&pat_id='.$pat_id.'' ?>">Back</a></button>                                                                                                                                    </div> 
                                                                                                                                                   <div class="span3"><!--
											<button type="submit" class="btn btn-primary" style="padding:10px; font-size:180%">Save</button> -->.
											
                                            </div>
                                            
                                            <div class="span3">
											<button type="submit" name="submit_pediatric" class="btn btn-success" style="padding:10px; font-size:180%">Next</button> 
                                            </div>
                          </div>
    
</form>