<h2 style="background-color:#f8f7f7; text-align:center"> ART Adherence</h2>
                          <!-- <hr style=" border: 2px solid #1c952f;" />-->
                                
<?php 
global $pat_id;
$pat_id= $_GET['pat_id'];

global $location;
if(isset($_POST['submit_clinicstatus'])){ 
    $location ="app.php";  
} else {
    $location ="complete_form.php";  
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

echo 'action="'.$location.'?pat_id='.$pat_id.'"';
echo '
<form id="edit-profile" class="form-horizontal" action="'.$location.'?pat_id='.$pat_id.'" method="post">
';
?> 

<h3>Client Name: <strong><i style="color:red"><?php echo $client_name; ?></i></strong></h3>

<input type="hidden" name="pat_id" value="<?php echo $pat_id; ?>"  /> 
 <input type="hidden" name="dob" value="<?php echo $dob; ?>" /> 
   <script>
  $( function() {
    $( "#datepickersVis_Date1" ).datepicker({
      changeMonth: true,
      changeYear: true
    });
  } );
  </script>     
<script>
  $( function() {
    $( "#datepickeraVis_Date1" ).datepicker({
      changeMonth: true,
      changeYear: true
    });
  } );
  </script>     
<script>
  $( function() {
    $( "#datepickersVis_Date2" ).datepicker({
      changeMonth: true,
      changeYear: true
    });
  } );
  </script>     
<script>
  $( function() {
    $( "#datepickeraVis_Date2" ).datepicker({
      changeMonth: true,
      changeYear: true
    });
  } );
  </script>     
<script>
  $( function() {
    $( "#datepickersVis_Date3" ).datepicker({
      changeMonth: true,
      changeYear: true
    });
  } );
  </script>     
<script>
  $( function() {
    $( "#datepickeraVis_Date3" ).datepicker({
      changeMonth: true,
      changeYear: true
    });
  } );
  </script>     
<fieldset>
    <h3>Adherence Section <i>(Patient adherence in the last 3 visits)</i></h3>
    <table style="width:100%" border="0">
                <tbody>
			<?php     
			for($i=1; $i<=3; $i++) {
				eval("\$scheduled_visit_date = !empty ( \$scheduled_visit_date$i) ? \$scheduled_visit_date$i : '';");
				eval("\$actual_visit_date = !empty ( \$actual_visit_date$i) ? \$actual_visit_date$i : '';");
				eval("\$pill_count = !empty ( \$pill_count$i) ? \$pill_count$i : '';");
				echo "date is ".$scheduled_visit_date;
        $svd = $scheduled_visit_date; // if I dont do this, the code doesn't work
        echo "<tr>
        <td> <h4>Schedule visit date:</h4><label><i>(dd/mm/yyyy)</i></label> </td>
        <td> <input type=\"text\" name=\"scheduled_visit_date$i\" id=\"datepickersVis_Date$i\"  value=\"$svd\" onchange=\"updatedate();\"/> </td>
        <td> <h4>Actual visit date </h4><label><i>(dd/mm/yyyy)</i></td>
        <td> <input type=\"text\" name=\"actual_visit_date$i\" id=\"datepickeraVis_Date$i"."2\" required value=\"$actual_visit_date\" /> </td>
        <td> <h4>Pill Count (%) </h4> </td>
        <td> <input type=\"number\" name=\"pill_count$i\" id=\"pill_count$i\" style=\"width:80px; height:50px;\"  value=\"$pill_count\"/> </td>
    </tr>";
}
?>
        </tbody>
    </table>
</fieldset>
     <hr style=" border: 1px solid #cbe509;" />
<fieldset>
    <h3>Adherence questions <i>(circle answer)</i></h3>
  
    <table>
        <tr>     <td><h4>Do you ever forget to take your medicine?</h4></td>    
               <td> 
                   
                   <div style="width:110px; float:left" class="radio_sty">
    <input type="radio" id="f-ever_forget_2_take_meds"   name="ever_forget_2_take_meds" value="Yes" required>
    <label for="f-ever_forget_2_take_meds">Yes</label>
    
    <div class="check">
		</div>
  </div>
    <div style="width:100px; float:left" class="radio_sty">
    <input type="radio" id="n-ever_forget_2_take_meds" name="ever_forget_2_take_meds" value="No" >
    <label for="n-ever_forget_2_take_meds">No</label>
    
    <div class="check">
		</div>
  </div>
                   <!--<label class="control-label"></label>
                      <div class="controls">
                            <label class="radio inline">
                              <input type="radio"  name="ever_forget_2_take_meds" value="Yes"> Yes
                            </label>

                            <label class="radio inline">
                              <input type="radio" name="ever_forget_2_take_meds" value="No"> No
                            </label>
                          </div>	 /controls 	-->
                  </td>
                  </tr>
        <tr>     <td><h4>Are you careless at times about taking your medicine?</h4></td>    
               <td> 
                   
                    
                   <div style="width:110px; float:left" class="radio_sty">
    <input type="radio" id="f-careless_taking_meds"   name="careless_taking_meds" value="Yes" required>
    <label for="f-careless_taking_meds">Yes</label>
    
    <div class="check">
		</div>
  </div>
    <div style="width:100px; float:left" class="radio_sty">
    <input type="radio" id="n-careless_taking_meds" name="careless_taking_meds" value="No" >
    <label for="n-careless_taking_meds">No</label>
    
    <div class="check">
		</div>
  </div>
                  <!-- <label class="control-label"></label>
                      <div class="controls">
                            <label class="radio inline">
                              <input type="radio"  name="careless_taking_meds" value="Yes"> Yes
                            </label>

                            <label class="radio inline">
                              <input type="radio" name="careless_taking_meds" value="No"> No
                            </label>
                          </div>	 /controls 	-->
                  </td>
                  </tr>
        <tr>     <td><h4>Sometimes if you feel worse, do you stop taking your medicine?</h4></td>    
               <td> 
                   
                     <div style="width:110px; float:left" class="radio_sty">
    <input type="radio" id="f-stop_taking_meds"    name="stop_taking_meds" value="Yes" required>
    <label for="f-stop_taking_meds">Yes</label>
    
    <div class="check">
		</div>
  </div>
    <div style="width:100px; float:left" class="radio_sty">
    <input type="radio" id="n-stop_taking_meds" name="stop_taking_meds" value="No"  >
    <label for="n-stop_taking_meds">No</label>
    
    <div class="check">
		</div>
  </div>
                  <!-- <label class="control-label"></label>
                      <div class="controls">
                            <label class="radio inline">
                              <input type="radio"  name="stop_taking_meds" value="Yes"> Yes
                            </label>

                            <label class="radio inline">
                              <input type="radio" name="stop_taking_meds" value="No" > No
                            </label>
                          </div>	 /controls 	-->
                  </td>
                  </tr>
        <tr>     <td><h4>Thinking about the last week. How often have you not taken your medicine</h4></td>    
               <td>
                    <div style="width:110px; float:left" class="radio_sty">
    <input type="radio" id="f-not_taken_meds"    name="not_taken_meds" value="Never" required>
    <label for="f-not_taken_meds">Never</label>
    
    <div class="check">
		</div>
  </div>
    <div style="width:140px; float:left" class="radio_sty">
    <input type="radio" id="n-not_taken_meds" name="not_taken_meds" value="1-2"  >
    <label for="n-not_taken_meds">1-2</label>
    
    <div class="check">
		</div>
  </div> 
                   <div style="width:140px; float:left" class="radio_sty">
    <input type="radio" id="3-not_taken_meds"    name="not_taken_meds" value="3-5" required>
    <label for="3-not_taken_meds">3-5</label>
    
    <div class="check">
		</div>
  </div>
    <div style="width:100px; float:left" class="radio_sty">
    <input type="radio" id="5-not_taken_meds" name="not_taken_meds" value="> 5"  >
    <label for="5-not_taken_meds">>5</label>
    
    <div class="check">
		</div>
  </div>
                   
                 <!--  <label class="control-label"></label>
                      <div class="controls">
                            <label class="radio inline">
                              <input type="radio"  name="not_taken_meds" value="Never"> Never
                            </label>

                            <label class="radio inline">
                              <input type="radio" name="not_taken_meds" value="1-2"> 1-2
                            </label>
                          
                          <label class="radio inline">
                              <input type="radio" name="not_taken_meds" value="3-5"> 3-5
                            </label>
                          <label class="radio inline">
                              <input type="radio" name="not_taken_meds" value="> 5"> >5
                            </label>
                          
                          </div>	 /controls 	-->
                  </td>
                  </tr>
        <tr>     <td><h4>Did you not take any of your medicine over the past weekend?</h4></td>    
               <td> 
                      <div style="width:110px; float:left" class="radio_sty">
    <input type="radio" id="f-taken_meds_past_weekend"    name="taken_meds_past_weekend" value="Yes" required>
    <label for="f-taken_meds_past_weekend">Yes</label>
    
    <div class="check">
		</div>
  </div>
    <div style="width:100px; float:left" class="radio_sty">
    <input type="radio" id="n-taken_meds_past_weekend" name="taken_meds_past_weekend" value="No"  >
    <label for="n-taken_meds_past_weekend">No</label>
    
    <div class="check">
		</div>
  </div>
                   
                  <!-- <label class="control-label"></label>
                      <div class="controls">
                            <label class="radio inline">
                              <input type="radio"  name="taken_meds_past_weekend" value="Yes"> Yes
                            </label>

                            <label class="radio inline">
                              <input type="radio" name="taken_meds_past_weekend" value="No"> No
                            </label>
                          </div>	 /controls 	-->
                  </td>
                  </tr>
        <tr>     <td><h4>Over the past 3 months, how many days have you not taken any medicine at all?</h4></td>    
               <td> 
                   
                    <div style="width:150px; float:left" class="radio_sty">
    <input type="radio" id="f-3months_days_not_taken_meds"    name="3months_days_not_taken_meds"  value="< 2days" required>
    <label for="f-3months_days_not_taken_meds"><2days</label>
    
    <div class="check">
		</div>
  </div>
    <div style="width:170px; float:left" class="radio_sty">
    <input type="radio" id="n-3months_days_not_taken_meds" name="3months_days_not_taken_meds" value="> 2days"  >
    <label for="n-3months_days_not_taken_meds">>2 days</label>
    
    <div class="check">
		</div>
  </div>
                   
                  <!-- <label class="control-label"></label>
                      <div class="controls">
                            <label class="radio inline">
                              <input type="radio"  name="3months_days_not_taken_meds"  value="< 2days"> <2days
                            </label>

                            <label class="radio inline">
                              <input type="radio" name="3months_days_not_taken_meds" value="> 2days"> >2 days
                            </label>
                          </div>	 /controls 	-->
                  </td>
                  </tr>
    
    
    
    </table>
</fieldset>
<fieldset>
      <h3>Laboratory Section <i>(compulsory)</i></h3>
    <table style="width:100%" border="0">
                <tbody>
                    <tr>
                        <td><h4> Hb:</h4> </td>
                        <td> <label><i>*g/dl</i></label><input type="text" name="hb" value=""  />  </td>
                    </tr>
                    <tr>
                        <td><h4> ALT: </h4></td>
                        <td> <label><i>*U/l</i></label><input type="text" name="alt" value=""   /> </td>
                    </tr>
                    <tr>
                   
                        <td> <h4>Bilirubin: </h4></td>
                        <td><label><i>*mg/dl</i></label> <input type="text" name="bilirubin" value=""   /> </td>
                  
                  </tr>   
                  <tr>
                      <td> <h4>Creatinine :</h4> </td>
                      <td> <label><i>*mg/dl</i></label><input type="text" name="creatinine" value=""   /> </td>
                    </tr>
                    <tr>
                        <td><h4>HepB Ag</h4></td>
                     <td>
                        <div style="width:120px; float:left" class="radio_sty">
    <input type="radio" id="f-hepbag"     name="hepbag" value="negative" required>
    <label for="f-hepbag">Neg</label>
    
    <div class="check">
		</div>
  </div>
    <div style="width:140px; float:left" class="radio_sty">
    <input type="radio" id="n-hepbag" name="hepbag" value="positive"  >
    <label for="n-hepbag">Pos</label>
    
    <div class="check">
		</div>
  </div> 
                   <div style="width:220px; float:left" class="radio_sty">
    <input type="radio" id="3-hepbag"    name="hepbag" value="Not tested" >
    <label for="3-hepbag">Not tested</label>
    
    <div class="check">
		</div>
  </div>  
                         
                   <!--<label class="control-label"></label>
                      <div class="controls">

                            <label class="radio inline">
                              <input type="radio" name="hepbag" value="negative"> neg
                            </label>
                          
                          <label class="radio inline">
                              <input type="radio" name="hepbag" value="positive"> pos
                            </label>
                          <label class="radio inline">
                              <input type="radio" name="hepbag" value="Not tested"> not tested
                            </label>
                          
                          </div>	 /controls 	-->
                  </td>
                  
                  </tr> 
        </tbody>
    </table>
</fieldset>
    <hr />
    <h3>Important Note:</h3>
    <div class="text"> <p style="color:#f00">While this form is processed keep the patient on his current treatment regimen. It may still confer some benefit to be patient and resistance testing can only be done while patient is on treatment</p> </div>
    
                      <div class="form-actions">
                                                                                                                                                   <div class="span3">
                                                                                                                                                   <?php include ('includes/app_edit_first.php'); ?>
               <button class="btn" name="submit_patD" style="padding:10px; font-size:180%">Back</button>                                                                                                                                    </div>
                                                                                                                                                   <div class="span3"><!--
											<button type="submit" class="btn btn-primary" style="padding:10px; font-size:180%">Save</button> -->.
											
                                            </div>
                                            
                                            <div class="span3">
											<button type="submit" class="btn btn-success" style="padding:10px; font-size:180%" name="submit_adher">Next</button> 
                                            </div>
                          </div>
    
</form>