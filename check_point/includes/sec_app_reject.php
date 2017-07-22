<?php
$form_ID= $_GET['form_id'];
    
$sql_form_creation_not_complete = "UPDATE form_creation ".
       "SET complete='Rejected'".
       "WHERE 3rdlineart_form_id='$form_ID'" ;

mysqli_select_db($bd , '3rdlineart_db');
$form_submited_not_complete = mysqli_query( $bd , $sql_form_creation_not_complete);   
    

$clinician_email= $_POST['email_address']; 
$comment= $_POST['comment']; 
	 
$insert_form_rejected=" INSERT  INTO  form_rejected (form_id,comment)
VALUES ('$form_ID', '$comment')";

mysqli_query( $bd,$insert_form_rejected);	
         
 $to = $clinician_email;

   $subject = "3RD Line Expert Application form rejected";
   $message = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>New form to review</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body>
'.$comment.'

</body>
</html>
';   
 $header = "From:dumi_ndhlovu@lighthouse.org.mw\r\n";
   $header .= "Cc:j.dumisani7291@gmail.com\r\n";
   $header .= "MIME-Version: 1.0\r\n";
   $header .= "Content-type: text/html\r\n";
   $retval = mail ($to,$subject,$message,$header);    

?>