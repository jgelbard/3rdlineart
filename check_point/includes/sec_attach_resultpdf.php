
<?php
include ('includes/insert_attach_result.php');  

global $formID;
$formID= $_GET['id'];

echo '
<h2 style="background-color:#8985f0; text-align:center; color:#fff">Application Results from NHLS</h2>
                        <hr style=" border: 1px solid #cbe509;" />
                        <form id="edit-profile" class="form-horizontal" action="cp_p1.php?received&id='.$formID.'" method="post" style="background-color:#fdfdfd; padding:20px;" enctype="multipart/form-data" >';

/*
$reviewer=mysqli_query( $bd,"SELECT * FROM reviewer"); 

    while ($row_reviewer=mysqli_fetch_array($reviewer)){
        
        $id =$row_reviewer['id'];
        $title =$row_reviewer['title'];
        $fname =$row_reviewer['fname'];
        $lname =$row_reviewer['lname'];
        $email =$row_reviewer['email'];
        $phone =$row_reviewer['phone'];
        
        $rev_fullname =$title.'. '. $fname. ' '. $lname;
        
        $assigned_forms=mysqli_query( $bd,"SELECT * FROM assigned_forms where rev_id=' $id'");
        $count = mysqli_num_rows ($assigned_forms);
       
        echo '
        <label class="checkbox ">
                                              <input type="checkbox" name="checkbox[]" id="checkbox[]" value="'.$id.'" > '.$rev_fullname.' <span style="color:#69330c"> ('.$count.')</span>
                                            </label>';
    }*/

$form_creation=mysqli_query( $bd,"SELECT * FROM form_creation where 3rdlineart_form_id ='$formID'"); 


    while ($row_form_creation=mysqli_fetch_array($form_creation)){
        
        $clinician_id =$row_form_creation['clinician_id'];
        $patient_id =$row_form_creation['patient_id'];
        
        
        $SQL_clinician = "SELECT * FROM clinician WHERE id=$clinician_id";
                    $clinician = mysqli_query($bd,$SQL_clinician);
                    
                    $row_clinician = mysqli_fetch_array($clinician);
                        $art_clinic = $row_clinician['art_clinic'];
                        $clinician_name = $row_clinician['name'];
        
         $SQL_patient = "SELECT * FROM patient WHERE id=$patient_id";
                    $patient = mysqli_query($bd,$SQL_patient);
                    
                    $row_patient = mysqli_fetch_array($patient);
                        $firstname = $row_patient['firstname'];
                        $lastname = $row_patient['lastname'];
                        $art_id_num = $row_patient['art_id_num'];
                        $gender = $row_patient['gender'];
                        $dob = $row_patient['dob'];
        
        $patient_name = $firstname .' '.$lastname;
        
    }

echo '<h2 style="background-color:#dedd6;  text-align:center; color:#000000">Assign Reveiwers</h2>
       <i style="float:right    ">You have so much number of reviewers, Please TICK only <u>three reviewers </u>and Pick one as <u>Lead reveiwer</u></i>                 
                        <form id="edit-profile" class="form-horizontal" action="cp_p1.php?p" method="post">
    <h4 style="color:#69330c; padding:10px; background-color:#deed6;">3rdLineForm#: '. $formID.'</h4>
    <table style="width:100%; background-color:#f7cf75; padding:5px;" >
    <td><p style="color:#000">Name: <strong>'.$patient_name.'</strong>   ART Number: <strong>'.$art_id_num.' </strong> Gender: <strong>'.$gender.'</strong>
    Dob: '.$dob.' </p>
    </td>
    <td>
    <p style="color:#000">Facility: <strong>'.$art_clinic.'</strong> Clinician: <strong>'.$clinician_name.'</strong> </p>
    </td>
    </tr>
    </table>
 
    <table class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th> <h4 style="text-align:center">Reviewer</h4> </th>
                    <th><h4 style="text-align:center">Lead Reviewer </h4></th>
                  </tr>
                </thead>
                <tbody>
    ';

$reviewer=mysqli_query( $bd,"SELECT * FROM reviewer"); 
    while ($row_reviewer=mysqli_fetch_array($reviewer)){
        
        $id =$row_reviewer['id'];
        $title =$row_reviewer['title'];
        $fname =$row_reviewer['fname'];
        $lname =$row_reviewer['lname'];
        $email =$row_reviewer['email'];
        $phone =$row_reviewer['phone'];
        
        $rev_fullname =$title.'. '. $fname. ' '. $lname;
        
        $assigned_forms=mysqli_query( $bd,"SELECT * FROM assigned_app_results where rev_id=' $id'");
        $count = mysqli_num_rows ($assigned_forms);
        
        $assigned_forms_reviewed=mysqli_query( $bd,"SELECT * FROM assigned_app_results where status = 'Reviewed' and rev_id=' $id'");
        $rev_count = mysqli_num_rows ($assigned_forms_reviewed);
        $pending = $count - $rev_count;
       
        echo '<tr><td>
        <label class="checkbox ">
                                              <input type="checkbox" name="checkbox[]" id="checkbox[]" value="'.$id.'" style="transform:scale(2, 2); margin: 3px;" ><p>'.'__'.$rev_fullname.'</p> <span style="color:#0b13d0">Assig <i>('.$count.')</i> Pending <i>('.$pending.')</i></span>
                                            </label></td><td><div style="width:110px; float:left" class="radio_sty">
    <input type="radio" id="yes_'.$id.'" name="rev_lead" value="'.$id.'" required>
    <label for="yes_'.$id.'">Yes</label>
    
    <div class="check">
		</div>
  </div>
  </div></td></tr>';
    }
?>
</tbody></table>
            <input type="hidden" name="formID" value="<?php echo $formID; ?>" /> 
          


    <div class="form-actions">  
        <h3 style="color:#689d04"><span>Attach Result : </span><input type="file" name="file" value="Attach Result" required /></h3>
    </div>
						 
 <!--<div class="control-group">
<br />											
											
										<div class="span3">	
                                            
                                          
                                            <label class="checkbox ">
                                              <input type="checkbox"> Dr Tom Heller <span style="color:#0adb52"> (0)</span>
                                            </label>
                                            
                                            <label class="checkbox ">
                                              <input type="checkbox"> Dr Kasambala <span style="color:#0adb52"> (0)</span>
                                            </label>
                                                
                                                 <label class="checkbox ">
                                              <input type="checkbox"> Dr Phiri <span style="color:#0adb52"> (0)</span>
                                            </label>
                                      
     </div>
     <div class="span3">
     
    
                                            <label class="checkbox ">
                                              <input type="checkbox"> Dr Nyauti <span style="color:#0adb52"> (0)</span>
                                            </label>
                                            
                                            <label class="checkbox ">
                                              <input type="checkbox"> Dr Banda <span style="color:#0adb52"> (0)</span>
                                            </label>
                                            <label class="checkbox ">
                                              <input type="checkbox"> Dr Tembo <span style="color:#0adb52"> (0)</span>
                                            </label>
         </div>
     <div class="span3">
    
                                            <label class="checkbox ">
                                              <input type="checkbox"> Dr K <span style="color:#0adb52"> (0)</span>
                                            </label>
                                            
                                            <label class="checkbox ">
                                              <input type="checkbox"> Dr C <span style="color:#0adb52"> (0)</span>
                                            </label>
                                            <label class="checkbox ">
                                              <input type="checkbox"> Reviewer Q <span style="color:#0adb52"> (0)</span>
                                            </label>
        </div>
										</div>--> <!-- /control-group -->
                                         
    <!--<div>
        
        <script type="text/javascript" src="js/tinymce/tinymce.min.js"></script>
<script type="text/javascript">
tinymce.init({
    selector: "textarea",
    theme: "modern",
    plugins: [
        "advlist autolink lists link image charmap print preview hr anchor pagebreak",
        "searchreplace wordcount visualblocks visualchars code fullscreen",
        "insertdatetime nonbreaking save table contextmenu directionality",
        "emoticons template paste textcolor colorpicker textpattern"
    ],
    toolbar1: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
    toolbar2: "print preview | forecolor backcolor emoticons",
    image_advtab: true,
    templates: [
        {title: 'Test template 1', content: 'Test 1'},
        {title: 'Test template 2', content: 'Test 2'}
    ]
});
</script>    
        <h3>Email Message to Experts:</h3>
    <textarea rows="10" name="emailmessage" style="width:90%" id="area1" >
        <p>Dear 3<sup>rd</sup> line Committee expert,</p>
<p>&nbsp;</p>
<p>Please review the following application for genotyping for resistance mutations.</p>
<p>After review please state:</p>
<p>-Genotyping indicated yes/no.</p>
<p>&nbsp;</p>
<p>If genotyping is not indicated please additionally provide feedback to the clinician.</p>
<p>&nbsp;</p>
<p>Thank you very much,</p>
<p><strong>Mercy</strong></p>
<p><span style="text-decoration: underline;"><strong>3<sup>rd</sup> line committee Secretary</strong></span></p>

        </textarea>
    </div>                  -->
  <div class="form-actions">
                                                                                                                                                   <div class="span4">
               <button class="btn" style="padding:10px; font-size:180%"><a href="cp_p1.php?p">Cancel</a></button>                                                                                                                                </div>
                             
                                            <div class="span3">
											<button type="submit" class="btn btn-primary" style="padding:10px; font-size:180%" name="submit_assign_result">Submit For Review</button> 
                                            </div>
                          </div>				
                        
    
</form>