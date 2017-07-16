<h2 style="background-color:#f8f7f7; text-align:center">CD4 &VL Monitoring</h2>
                        <!--   <hr style=" border: 2px solid #1c952f;" />  --> 
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
                    <td> <input type="text" name="monito_date1" id="datepicker16" /> </td>
                    <td> <input type="text" name="cd41" style="width:120px" /> </td>
                    <td> <input type="text" name="vl1" style="width:120px" /> </td>
                   <td><textarea name="reason_4_detectable_vl1" >
                        
                        </textarea></td>
                       <td> <input type="number" name="weight"  /> </td>
                  </tr>  
                    
                    <tr>
                    <td> <input type="text" name="monito_date2" id="datepicker17" /> </td>
                    <td> <input type="text" name="cd42"  value="" style="width:120px" /> </td>
                    <td> <input type="text" name="vl2"  value="" style="width:120px" /> </td>
                   <td><textarea name="reason_4_detectable_vl2"  value="">
                        
                        </textarea></td>
                       <td> <input type="number" name="weight2"  value="" /> </td>
                  </tr> 
                      
                  <tr>
                   <td> <input type="text" name="monito_date3" id="datepicker18"   value=""/> </td>
                    <td> <input type="text" name="cd43"  value="" style="width:120px" /> </td>
                    <td> <input type="text" name="vl3"   value="" style="width:120px" /> </td>
                   <td><textarea name="reason_4_detectable_vl3"  value="">
                        
                        </textarea></td>
                       <td> <input type="number" name="weight3"  value=""  /> </td>
                  </tr>  
                     <tr>
                    <td> <input type="text" name="monito_date4" id="datepicker19" /> </td>
                    <td> <input type="text" name="cd44"  value="" style="width:120px" style="width:120px" /> </td>
                    <td> <input type="text" name="vl4"  value="" style="width:120px" /> </td>
                   <td><textarea name="reason_4_detectable_vl4"  value="">
                        
                        </textarea></td>
                       <td> <input type="number" name="weight4"  value="" /> </td>
                  </tr>  
                    
                    <tr>
                   <td> <input type="text" name="monito_date5" id="datepicker20" /> </td>
                    <td> <input type="text" name="cd45"  value="" style="width:120px" /> </td>
                    <td> <input type="text" name="vl5"  value="" style="width:120px" /> </td>
                   <td><textarea name="reason_4_detectable_vl5"  value="">
                        
                        </textarea></td>
                       <td> <input type="number" name="weight5"  value="" /> </td>
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
                   
       <td> <input type="text" name="monito_date6" id="datepicker21" /> </td>
                    <td> <input type="text" name="cd46"  value="" style="width:120px" /> </td>
                    <td> <input type="text" name="vl6"  value="" style="width:120px" /> </td>
                   <td><textarea name="reason_4_detectable_vl6"  value="">
                        
                        </textarea></td>
                       <td> <input type="number" name="weight6"  value="" /> </td>
                      <td><form action="#">
        <div class="box1">
    <input type="button" name="row6" class="btn btn-success" value="+" />
        </div>
    </form></td>
                  </tr> 
                    
                    <tr  class="row6 box">
                    <td> <input type="text" name="monito_date7" id="datepicker22" /> </td>
                    <td> <input type="text" name="cd47"  value="" style="width:120px" /> </td>
                    <td> <input type="text" name="vl7"  value="" style="width:120px" /> </td>
                   <td><textarea name="reason_4_detectable_vl7"  value="">
                        
                        </textarea></td>
                       <td> <input type="number" name="weight7"  value="" /> </td>
                     <td><form action="#">
        <div class="box2">
    <input type="button" name="row7" class="btn btn-success" value="+" />
    <input type="button" name="row5" class="btn btn-danger" value="-" />
        </div>
    </form></td>
                  </tr> 
                    
                    <tr  class="row7 box">
                    <td> <input type="text" name="monito_date8" id="datepicker23" /> </td>
                    <td> <input type="text" name="cd48"  value="" style="width:120px" /> </td>
                    <td> <input type="text" name="vl8"  value="" style="width:120px" /> </td>
                   <td><textarea name="reason_4_detectable_vl8"  value="">
                        
                        </textarea></td>
                       <td> <input type="number" name="weight8"  value="" /> </td>
                     <td><form action="#">
        <div class="box3">
    <input type="button" name="row8" class="btn btn-success" value="+" />
    <input type="button" name="row6" class="btn btn-danger" value="-" />
        </div>
    </form></td>
                  </tr>  
                    <tr  class="row8 box">
                    <td> <input type="text" name="monito_date9" id="datepicker24" /> </td>
                    <td> <input type="text" name="cd49"  value="" style="width:120px" /> </td>
                    <td> <input type="text" name="vl9"  value="" style="width:120px"/> </td>
                   <td><textarea name="reason_4_detectable_vl9"  value="">
                        
                        </textarea></td>
                       <td> <input type="number" name="weight9"  value="" /> </td>
                    <td><form action="#">
        <div class="box4">
    <input type="button" name="row9" class="btn btn-success" value="+" />
    <input type="button" name="row7" class="btn btn-danger" value="-" />
        </div>
    </form></td>
                  </tr> 
                <tr  class="row9 box">
                   <td> <input type="text" name="monito_date10" id="datepicker25" /> </td>
                    <td> <input type="text" name="cd410"  value="" style="width:120px" /> </td>
                    <td> <input type="text" name="vl10"  value="" style="width:120px"/> </td>
                   <td><textarea name="reason_4_detectable_vl10"  value="">
                        
                        </textarea></td>
                       <td> <input type="number" name="weight10"  value="" /> </td>
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
               <button class="btn" style="padding:10px; font-size:180%"><a href="app.php?part_1<?php echo '&pat_id='.$pat_id.'' ?>">Back</a></button>                                                                                                                                    </div>
                                                                                                                                                   <div class="span3"><!--
											<button type="submit" class="btn btn-primary" style="padding:10px; font-size:180%">Save</button> -->.
											
                                            </div>
                                            
                                            <div class="span3">
											<button type="submit" class="btn btn-success" style="padding:10px; font-size:180%" name="submit_treatment2">Next</button> 
                                            </div>
                          </div>
    
</form>