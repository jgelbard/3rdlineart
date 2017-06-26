
  <h2 style="background-color:#f8f7f7; text-align:center"> ART Treatment History</h2>
                        <!--   <hr style=" border: 2px solid #1c952f;" />  --> 
<?php

global $pat_id;
$pat_id= $_GET['pat_id'];
$age= $_GET['xx'];
$gender= $_GET['g'];
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

echo '
<form id="edit-profile" class="form-horizontal" action="app.php?pat_id='.$pat_id.'&xx='.$age.'" method="post">

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

     $drugs = mysql_query($retrieve_drugs);
	       
while($drug_row = mysql_fetch_array($drugs)) {
    
    
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
                     <td>  <select name="art_drug2">
                      <option>select drug</option>
                        <?php
        $retrieve_drugs ="SELECT * FROM drugs";

     $drugs = mysql_query($retrieve_drugs);
	       
while($drug_row = mysql_fetch_array($drugs)) {
    
    
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

     $drugs = mysql_query($retrieve_drugs);
	       
while($drug_row = mysql_fetch_array($drugs)) {
    
    
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

     $drugs = mysql_query($retrieve_drugs);
	       
while($drug_row = mysql_fetch_array($drugs)) {
    
    
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

     $drugs = mysql_query($retrieve_drugs);
	       
while($drug_row = mysql_fetch_array($drugs)) {
    
    
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

     $drugs = mysql_query($retrieve_drugs);
	       
while($drug_row = mysql_fetch_array($drugs)) {
    
    
	$drug_name = $drug_row['drug_name'];
    echo '<option value='.$drug_name.'>'.$drug_name.'</option>';
    
}

?>
                  
                        </select> </td>
                    <td> <input type="text" name="start_date6" id="datepicker16"  /> </td>
                     <td> <input type="text" name="stop_date6" id="datepicker17" /> </td>
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
                        <option>select drug</option>
                        <?php
        $retrieve_drugs ="SELECT * FROM drugs";

     $drugs = mysql_query($retrieve_drugs);
	       
while($drug_row = mysql_fetch_array($drugs)) {
    
    
	$drug_name = $drug_row['drug_name'];
    echo '<option value='.$drug_name.'>'.$drug_name.'</option>';
    
}

?>
                  
                        </select> </td>
                    <td> <input type="text" name="start_date7" id="datepicker18"  /> </td>
                     <td> <input type="text" name="stop_date7" id="datepicker19" /> </td>
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
                        <option>select drug</option>
                        <?php
        $retrieve_drugs ="SELECT * FROM drugs";

     $drugs = mysql_query($retrieve_drugs);
	       
while($drug_row = mysql_fetch_array($drugs)) {
    
    
	$drug_name = $drug_row['drug_name'];
    echo '<option value='.$drug_name.'>'.$drug_name.'</option>';
    
}

?>
                  
                        </select> </td>
                    <td> <input type="text" name="start_date8" id="datepicker20"  /> </td>
                     <td> <input type="text" name="stop_date8" id="datepicker21" /> </td>
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
                        <option>select drug</option>
                        <?php
        $retrieve_drugs ="SELECT * FROM drugs";

     $drugs = mysql_query($retrieve_drugs);
	       
while($drug_row = mysql_fetch_array($drugs)) {
    
    
	$drug_name = $drug_row['drug_name'];
    echo '<option value='.$drug_name.'>'.$drug_name.'</option>';
    
}

?>
                  
                        </select> </td>
                    <td> <input type="text" name="start_date9" id="datepicker22"  /> </td>
                     <td> <input type="text" name="stop_date9" id="datepicker23" /> </td>
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
                        <option>select drug</option>
                        <?php
        $retrieve_drugs ="SELECT * FROM drugs";

     $drugs = mysql_query($retrieve_drugs);
	       
while($drug_row = mysql_fetch_array($drugs)) {
    
    
	$drug_name = $drug_row['drug_name'];
    echo '<option value='.$drug_name.'>'.$drug_name.'</option>';
    
}

?>
                  
                        </select> </td>
                    <td> <input type="text" name="start_date10" id="datepicker24"  /> </td>
                     <td> <input type="text" name="stop_date10" id="datepicker25" /> </td>
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
    
                      <div class="form-actions">
                                                                                                                                                   <div class="span3">  
                           <a class="btn" href="app.php?back&back_3<?php echo '&pat_id='.$pat_id.'&g='.$gender.'&xx='.$age.'' ?>" style="padding:10px; font-size:180%">Back</a>    
                          </div>
                                                                                                                                                   <div class="span3"><!--
											<button type="submit" class="btn btn-primary" style="padding:10px; font-size:180%">Save</button> -->.
											
                                            </div>
                                            
                                            <div class="span3">
											<button type="submit" class="btn btn-success" style="padding:10px; font-size:180%" name="submit_treatment1">Next</button> 
                                            </div>
                          </div>
    
</form>