<?php

if(isset($_POST['submit_review_result'])){ 
    
    $formID= $_GET ['formid'];
    
    $pi_mutation= mysql_real_escape_string(htmlspecialchars($_POST['pi_mutation']));
    $switch= mysql_real_escape_string(htmlspecialchars($_POST['switch']));
    $drug1= mysql_real_escape_string(htmlspecialchars($_POST['drug1']));
    $drug2= mysql_real_escape_string(htmlspecialchars($_POST['drug2']));
    $drug3= mysql_real_escape_string(htmlspecialchars($_POST['drug3']));
    $drug4= mysql_real_escape_string(htmlspecialchars($_POST['drug4']));
    $drug5= mysql_real_escape_string(htmlspecialchars($_POST['drug5']));
    $comment= mysql_real_escape_string(htmlspecialchars($_POST['comment_to_clinician']));
    $feedback_to_clinician= mysql_real_escape_string(htmlspecialchars($_POST['feedback_to_clinician']));
    
    if ($switch=='SwitchYes'){
    $switch ='Yes';
    }
    
    else {
    $switch ='No';
    }
    
    $date_reviewed= date('Y/m/d');
    
 	echo $drug3;
     
$insert_expert_review_result=" INSERT  INTO  expert_review_result (form_id,rev_id,pi_mutation,switch,drug1,drug2,drug3,drug4,drug5,comment,feedback_to_clinician)
VALUES (
'$formID', '$rev_id', '$pi_mutation', '$switch', '$drug1', '$drug2', '$drug3', '$drug4', '$drug5', '$comment', '$feedback_to_clinician')";

mysql_query($insert_expert_review_result, $bd);
    
    
$sql_form_creation_r = "UPDATE form_creation ".
       "SET status='Reviewed'".
       "WHERE 3rdlineart_form_id='$formID'" ;

mysql_select_db('3rdlineart_db');
$form_reviewed = mysql_query( $sql_form_creation_r, $bd );    
    
    $sql_assigned_app_results = "UPDATE assigned_app_results ".
       "SET status='Reviewed'".
       "WHERE form_id='$formID' and rev_id='$rev_id' " ;

mysql_select_db('3rdlineart_db');
$form_reviewed_result = mysql_query( $sql_assigned_app_results, $bd );    
    
    
    echo '							
<div class="alert alert-success">
                                                  <button type="button" class="close" data-dismiss="alert">&times;</button>
                                                  <strong>Success!</strong> Your review was submitted!!.
                           
                           </div>
                           
                            ';
    
      echo"<meta http-equiv=\"Refresh\" content=\"1; url=review_p1.php?result\">";   
    
}

?>