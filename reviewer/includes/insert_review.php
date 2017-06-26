<?php

if(isset($_POST['submit_review'])){ 
    
    $formID= $_GET ['formid'];
    
    $genotyping= mysql_real_escape_string(htmlspecialchars($_POST['genotyping']));
    $comment_to_clinician= mysql_real_escape_string(htmlspecialchars($_POST['comment_to_clinician']));
    $date_reviewed= date('Y/m/d');
    
 	
     
$insert_expert_review_Form=" INSERT  INTO  expert_review_Form (form_id,rev_id,genotyping,comment_to_clinician,date_reviewed)
VALUES (
'$formID', '$rev_id', '$genotyping', '$comment_to_clinician', '$date_reviewed')";

mysql_query($insert_expert_review_Form, $bd);
    
    
$sql_form_creation_r = "UPDATE form_creation ".
       "SET status='Reviewed'".
       "WHERE 3rdlineart_form_id='$formID'" ;

mysql_select_db('3rdlineart_db');
$form_reviewed = mysql_query( $sql_form_creation_r, $bd );    
    
    $sql_assigned_forms = "UPDATE assigned_forms ".
       "SET status='Reviewed'".
       "WHERE form_id='$formID' and rev_id='$rev_id' " ;

mysql_select_db('3rdlineart_db');
$form_reviewed_as = mysql_query( $sql_assigned_forms, $bd );    
    
    
    echo '							
<div class="alert alert-success">
                                                  <button type="button" class="close" data-dismiss="alert">&times;</button>
                                                  <strong>Success!</strong> Your review was submitted!!.
                           
                           </div>
                           
                            ';
       echo"<meta http-equiv=\"Refresh\" content=\"1; url=review_p1.php?p\">";   
    
}

?>