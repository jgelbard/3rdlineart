<h2 style="background-color:#f8f7f7; text-align:center"> Treatment History</h2>
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
                          <select name="art_drug">   
                        <option>select drug</option>
                        <?php
        $retrieve_drugs ="SELECT * FROM drugs";

     $drugs = mysqli_query($bd, $retrieve_drugs);
	       
while($drug_row = mysqli_fetch_array($drugs)) {
    
    
	$drug_name = $drug_row['drug_name'];
    echo '<option value='.$drug_name.'>'.$drug_name.'</option>';
    
}

?>
                  
                        </select> </td>
                    <td> <input type="text" name="start_date" id="datepicker6"  /> </td>
                     <td> <input type="text" name="stop_date" id="datepicker7" /> </td>
                    <td><textarea name="reason_for_change">
                        
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
                    <tr>
                     <td>  <select name="art_drug2">
                      <option>select drug</option>
                        <?php
        $retrieve_drugs ="SELECT * FROM drugs";

     $drugs = mysqli_query($bd, $retrieve_drugs);
	       
while($drug_row = mysqli_fetch_array($drugs)) {
    
    
	$drug_name = $drug_row['drug_name'];
    echo '<option value='.$drug_name.'>'.$drug_name.'</option>';
    
}

?>
                        </select> </td>
                    <td> <input type="text" name="start_date2" id="datepicker8" /> </td>
                     <td> <input type="text" name="stop_date2" id="datepicker9" /> </td>
                     <td><textarea name="reason_for_change2">
                        
                        </textarea></td>
                     <tr>
                      <td>  <select name="art_drug3">
                        <option>select drug</option>
                        <?php
        $retrieve_drugs ="SELECT * FROM drugs";

     $drugs = mysqli_query($bd, $retrieve_drugs);
	       
while($drug_row = mysqli_fetch_array($drugs)) {
    
    
	$drug_name = $drug_row['drug_name'];
    echo '<option value='.$drug_name.'>'.$drug_name.'</option>';
    
}

?>
                        </select> </td>
                    <td> <input type="text" name="start_date3" id="datepicker10" /> </td>
                     <td> <input type="text" name="stop_date3" id="datepicker11" /> </td>
                   <td><textarea name="reason_for_change3">
                        
                        </textarea></td>
                  </tr>
                     <tr>
                      <td>  <select name="art_drug4">
              <option>select drug</option>
                        <?php
        $retrieve_drugs ="SELECT * FROM drugs";

     $drugs = mysqli_query($bd, $retrieve_drugs);
	       
while($drug_row = mysqli_fetch_array($drugs)) {
    
    
	$drug_name = $drug_row['drug_name'];
    echo '<option value='.$drug_name.'>'.$drug_name.'</option>';
    
}

?>
                        </select> </td>
                    <td> <input type="text" name="start_date4" id="datepicker12" /> </td>
                     <td> <input type="text" name="stop_date4" id="datepicker13" /> </td>
                    <td><textarea name="reason_for_change4">
                        
                        </textarea></td>
                  </tr>
                    
                     <tr>
                      <td>  <select name="art_drug5">
                       <option>select drug</option>
                        <?php
        $retrieve_drugs ="SELECT * FROM drugs";

     $drugs = mysqli_query($bd, $retrieve_drugs);
	       
while($drug_row = mysqli_fetch_array($drugs)) {
    
    
	$drug_name = $drug_row['drug_name'];
    echo '<option value='.$drug_name.'>'.$drug_name.'</option>';
    
}

?>
                        </select> </td>
                  <td> <input type="text" name="start_date5" id="datepicker14" /> </td>
                     <td> <input type="text" name="stop_date5" id="datepicker15" /> </td>
                   <td><textarea name="reason_for_change5">
                        
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
                        <option>select drug</option>
                        <?php
        $retrieve_drugs ="SELECT * FROM drugs";

     $drugs = mysqli_query($bd, $retrieve_drugs);
	       
while($drug_row = mysqli_fetch_array($drugs)) {
    
    
	$drug_name = $drug_row['drug_name'];
    echo '<option value='.$drug_name.'>'.$drug_name.'</option>';
    
}

?>
                  
                        </select> </td>
                    <td> <input type="text" name="start_date6" id="datepicker6"  /> </td>
                     <td> <input type="text" name="stop_date6" id="datepicker7" /> </td>
                    <td><textarea name="reason_for_change6">
                        
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
                        <option>select drug1</option>
                        <?php
        $retrieve_drugs ="SELECT * FROM drugs";

     $drugs = mysqli_query($bd, $retrieve_drugs);
	       
while($drug_row = mysqli_fetch_array($drugs)) {
    
    
	$drug_name = $drug_row['drug_name'];
    echo '<option value='.$drug_name.'>'.$drug_name.'</option>';
    
}

?>
                  
                        </select> </td>
                    <td> <input type="text" name="start_date7" id="datepicker6"  /> </td>
                     <td> <input type="text" name="stop_date7" id="datepicker7" /> </td>
                    <td><textarea name="reason_for_change7">
                        
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
                        <option>select drug2</option>
                        <?php
        $retrieve_drugs ="SELECT * FROM drugs";

     $drugs = mysqli_query($bd, $retrieve_drugs);
	       
while($drug_row = mysqli_fetch_array($drugs)) {
    
    
	$drug_name = $drug_row['drug_name'];
    echo '<option value='.$drug_name.'>'.$drug_name.'</option>';
    
}

?>
                  
                        </select> </td>
                    <td> <input type="text" name="start_date8" id="datepicker6"  /> </td>
                     <td> <input type="text" name="stop_date8" id="datepicker7" /> </td>
                    <td><textarea name="reason_for_change8">
                        
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
                        <option>select drug3</option>
                        <?php
        $retrieve_drugs ="SELECT * FROM drugs";

     $drugs = mysqli_query($bd, $retrieve_drugs);
	       
while($drug_row = mysqli_fetch_array($drugs)) {
    
    
	$drug_name = $drug_row['drug_name'];
    echo '<option value='.$drug_name.'>'.$drug_name.'</option>';
    
}

?>
                  
                        </select> </td>
                    <td> <input type="text" name="start_date9" id="datepicker6"  /> </td>
                     <td> <input type="text" name="stop_date9" id="datepicker7" /> </td>
                    <td><textarea name="reason_for_change9">
                        
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
                        <option>select drug4</option>
                        <?php
        $retrieve_drugs ="SELECT * FROM drugs";

     $drugs = mysqli_query($bd, $retrieve_drugs);
	       
while($drug_row = mysqli_fetch_array($drugs)) {
    
    
	$drug_name = $drug_row['drug_name'];
    echo '<option value='.$drug_name.'>'.$drug_name.'</option>';
    
}

?>
                  
                        </select> </td>
                    <td> <input type="text" name="start_date10" id="datepicker6"  /> </td>
                     <td> <input type="text" name="stop_date10" id="datepicker7" /> </td>
                    <td><textarea name="reason_for_change10">
                        
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
      <hr style=" border: 1px solid #cbe509;" />
    <h3>Monitoring</h3>
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
                    <td> <input type="text" name="monito_date" id="datepicker16" /> </td>
                    <td> <input type="text" name="cd4" style="width:120px" /> </td>
                    <td> <input type="text" name="vl" /> </td>
                   <td><textarea name="reason_4_detectable_vl" >
                        
                        </textarea></td>
                       <td> <input type="number" name="weight"  /> </td>
                  </tr>  
                    
                    <tr>
                    <td> <input type="text" name="monito_date2" id="datepicker17" /> </td>
                    <td> <input type="text" name="cd42"  value="" style="width:120px" /> </td>
                    <td> <input type="text" name="vl2"  value="" /> </td>
                   <td><textarea name="reason_4_detectable_vl2"  value="">
                        
                        </textarea></td>
                       <td> <input type="number" name="weight2"  value="" /> </td>
                  </tr> 
                      
                  <tr>
                   <td> <input type="text" name="monito_date3" id="datepicker18"   value=""/> </td>
                    <td> <input type="text" name="cd43"  value="" style="width:120px" /> </td>
                    <td> <input type="text" name="vl3"   value="" /> </td>
                   <td><textarea name="reason_4_detectable_vl3"  value="">
                        
                        </textarea></td>
                       <td> <input type="number" name="weight3"  value=""  /> </td>
                  </tr>  
                     <tr>
                    <td> <input type="text" name="monito_date4" id="datepicker19" /> </td>
                    <td> <input type="text" name="cd44"  value="" style="width:120px" /> </td>
                    <td> <input type="text" name="vl4"  value="" /> </td>
                   <td><textarea name="reason_4_detectable_vl4"  value="">
                        
                        </textarea></td>
                       <td> <input type="number" name="weight4"  value="" /> </td>
                  </tr>  
                    
                    <tr>
                   <td> <input type="text" name="monito_date5" id="datepicker20" /> </td>
                    <td> <input type="text" name="cd45"  value="" style="width:120px" /> </td>
                    <td> <input type="text" name="vl5"  value="" /> </td>
                   <td><textarea name="reason_4_detectable_vl5"  value="">
                        
                        </textarea></td>
                       <td> <input type="number" name="weight5"  value="" /> </td>
                  </tr> 
                    
                    
        </tbody>
    </table>
    </fieldset>
    <script type="text/javascript">
$(document).ready(function(){
    $('input[type="radio"]').click(function(){
        if($(this).attr("value")=="Yes"){
            $(".box").not(".yes").hide();
            $(".yes").show();
        }
        if($(this).attr("value")=="No"){
            $(".box").not(".no").hide();
            $(".no").show();
        }
        
    });
});

</script>
     
     <hr style=" border: 1px solid #cbe509;" />
    <h3>TB Treatment</h3>
<fieldset>
 <div class="controls" style="position:relative; left:-150px">
                                            <label class="radio inline">
                                              <input type="radio"  name="tb_treat" value="Yes" id="app_radio"> Yes
                                            </label>
                                            
                                            <label class="radio inline">
                                              <input type="radio" name="tb_treat" value="No" id="app_radio" checked="checked"> No
                                            </label>
</div>    
<hr />
<script type="text/javascript">
      jQuery(document).ready(function ($) {
    $('input[name="tb_treat"]').on('click', function () {
        if ($(this).val() === 'Yes') {
            $('#td_treatment,#td_treatment1,#td_treatment12,#td_treatment13,#td_treatment2,#td_treatment21,#td_treatment23,#datepicker21,#datepicker22,#datepicker23,#datepicker24,#reason_o_changes1,#reason_o_changes2 ').prop("disabled", false);
        } else {
            $('#td_treatment,#td_treatment1,#td_treatment12,#td_treatment13,#td_treatment2,#td_treatment21,#td_treatment23,#datepicker21,#datepicker22,#datepicker23,#datepicker24,#reason_o_changes1,#reason_o_changes2 ').prop("disabled", "disabled");
        }
    });
});
</script>
 <div class="yes box">

    <table style="width:90%" border="0">
                <thead>
                    <tr>
           <th><label><input type="checkbox" name="colorCheckbox" value="red"> Regimen 1</label></th>
           <th><label><input type="checkbox" name="colorCheckbox" value="green"> Regimen 2</label>   </th>
           <th><label><input type="checkbox" name="colorCheckbox" value="blue"> MDR</label>  </th>
                   
                    
                    </tr>             
                 
                </thead>
                <tbody>
                    <tr style="background-color:#cb9112; font-size:112%; font-weight:300; color:#000">
                    <td> </td>
                    <td> Regimen Drug </td>
                 <!--   <th> MDR</th> -->
                    <td> Start Date</td>
                    <td> Stop Date</td>
                    <td> Reason for changes (toxicities?)</td>
                   <td> </td>
                  </tr>
             <script type="text/javascript">
$(document).ready(function(){
    $('input[type="checkbox"]').click(function(){
        if($(this).attr("value")=="red"){
            $(".red").toggle();
        }
        if($(this).attr("value")=="green"){
            $(".green").toggle();
        }
        if($(this).attr("value")=="blue"){
            $(".blue").toggle();
        }
    });
});
</script>
      <!--<script type="text/javascript">
$(document).ready(function(){
    $('a').click(function(){
        
        if($(this).attr("name")=="row1"){
            $(".sec").not(".row1").hide();
            $(".new").show();
            $(".red").show();
        } 
        
        
        
    });
});
 
</script>
-->
                    <tr class="red sec">
                       
                        
                    <td style="background-color:#f7cc6d; color:#000; min-width:110px"><h4>Regimen. 1 </h4></td>
                    <td><input type="text" name="reg1" value="2RHZE/4RH"  style="width:150px" id="td_treatment21" /></td>
                    <td> <input type="text" name="tbstart_date1" id="datepicker21" /> </td>
                    <td> <input type="text" name="tbstop_date1"  id="datepicker22"/> </td>
                    <td><textarea name="reason_o_changes1" id="reason_o_changes1">
                        
                        </textarea></td>
                      <!--<td style="background-color:#f7cc6d; color:#000; min-width:110px">
        <div class="sec1">
            <a name="row1" class="btn btn-success" href="#"> + </a>
    <input type="button" name="row1"  value="+" />
        </div>
    </td>-->
                  </tr>  
                    
                   <!-- <tr class="new sec">
                       
                        
                    <td style="background-color:#f7cc6d; color:#000; min-width:110px"><h4>Regimen. 1 </h4></td>
                    <td><input type="text" name="reg1" value="2RHZE/4RH"  style="width:150px" id="td_treatment21" /></td>
                    <td> <input type="text" name="tbstart_date1" id="datepicker21" /> </td>
                    <td> <input type="text" name="tbstop_date1"  id="datepicker22"/> </td>
                    <td><textarea name="reason_o_changes1" id="reason_o_changes1">
                        
                        </textarea></td>
                      <td style="background-color:#f7cc6d; color:#000; min-width:110px"><form action="#">
        <div class="sec1">
    <input type="button" name="row1" class="btn btn-success" value="+" />
        </div>
    </form></td>
                  </tr>  
                -->
                
                    
                    <tr class="green sec">
                    <!--<td> <input type="text" name="reg12" style="width:150px" id="td_treatment2" /> </td>-->
                           <td> <label class="checkbox ">
                                               Regimen. 2 <span style="color:#0adb52"></span><input type="checkbox" name="regimen2_checked">
                                            </label></td>
                    <!--<td> <input type="text" name="reg22"  style="width:150px" id="td_treatment21" /> </td>
                    <td> <input type="text" name="mdr2" style="width:150px" id="td_treatment23" /> </td>-->
                    <td><input type="text" name="reg2" value="2SRHZE/1RHZE/5RH"  style="width:150px" id="td_treatment21" /></td>
                    <td> <input type="text" name="tbstart_date2" id="datepicker23" /> </td>
                     <td> <input type="text" name="tbstop_date2" id="datepicker24" /> </td>
                   <td><textarea name="reason_o_changes2" id="reason_o_changes2">
                        
                        </textarea></td>
                  </tr>       
      
                     
                     
                       <tr class="blue sec">
                    <!--<td> <input type="text" name="reg12" style="width:150px" id="td_treatment2" /> </td>-->
                           <td> <label class="checkbox ">
                                               MDR <span style="color:#0adb52"></span><input type="checkbox" name="mdr_checked">
                                            </label></td>
                    <!--<td> <input type="text" name="reg22"  style="width:150px" id="td_treatment21" /> </td>
                    <td> <input type="text" name="mdr2" style="width:150px" id="td_treatment23" /> </td>-->
                    <td><input type="text" name="mdr" value="Km-Et-Z-Of-Cs"  style="width:150px" id="td_treatment21" /></td>
                    <td> <input type="text" name="tbstart_date_mdr" id="datepicker23" /> </td>
                     <td> <input type="text" name="tbstop_date_mdr" id="datepicker24" /> </td>
                   <td><textarea name="reason_o_changes_mdr" id="reason_o_changes_mdr">
                        
                        </textarea></td>
                  </tr>  
        </tbody>
    </table>
</div>
 </fieldset>   
    
                      <div class="form-actions">
                                                                                                                                                   <div class="span3">
               <button class="btn" style="padding:10px; font-size:180%"><a href="app.php?part_1<?php echo '&pat_id='.$pat_id.'' ?>">Back</a></button>                                                                                                                                    </div>
                                                                                                                                                   <div class="span3"><!--
											<button type="submit" class="btn btn-primary" style="padding:10px; font-size:180%">Save</button> -->.
											
                                            </div>
                                            
                                            <div class="span3">
											<button type="submit" class="btn btn-success" style="padding:10px; font-size:180%" name="submit_treat">Next</button> 
                                            </div>
                          </div>
    
</form>