<?php 

  if(isset($_POST['submit_consolidate1'])){
	
$formID= $_POST['formid']; 
$clinician_email= $_POST['clinician_email']; 
$clinician_name= $_POST['clinician_name']; 
$comment_to_clinician= $_POST['comment_to_clinician']; 
$genotyping= $_POST['genotyping']; 
      
$date_reviewed = date('Y/m/d');
      
	 
$insert_expert_review_consolidate1=" INSERT  INTO  expert_review_consolidate1 (form_id,genotyping,comment_to_clinician, date_reviewed)
VALUES (
'$formID', '$genotyping', '$comment_to_clinician', '$date_reviewed')";

mysqli_query( $bd,$insert_expert_review_consolidate1);	
    
 
     
 $to = $clinician_email;
   $subject = "3RD Line Expert Application form review";
   $message = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>New form to review</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body>
'.$comment_to_clinician.'

</body>
</html>
';   
 $header = "From:dumi_ndhlovu@lighthouse.org.mw\r\n";
   $header .= "Cc:j.dumisani7291@gmail.com\r\n";
   $header .= "MIME-Version: 1.0\r\n";
   $header .= "Content-type: text/html\r\n";
   $retval = mail ($to,$subject,$message,$header);    
    
    
}
    
?>