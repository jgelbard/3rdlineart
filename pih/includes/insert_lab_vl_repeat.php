<?php

if(isset($_POST['submit_vl_done'])){ 
    
    
    $sampleid= mysql_real_escape_string(htmlspecialchars($_POST['sampleid']));
    $form_id= mysql_real_escape_string(htmlspecialchars($_GET['formID']));
    $receive_date= mysql_real_escape_string(htmlspecialchars($_POST['receive_date']));
    $vl_result= mysql_real_escape_string(htmlspecialchars($_POST['vl_result']));
    $dispatch_date= mysql_real_escape_string(htmlspecialchars($_POST['dispatch_date']));
    $nhls_receive_date= mysql_real_escape_string(htmlspecialchars($_POST['nhls_receive_date']));
    $date_created = date ('Y-m-d  h:m:s');
 	
$insert_lab_vl_repeat=" INSERT  INTO  lab_vl_repeat (form_id,receive_date,vl_result,dispatch_date,nhls_receive_date,lab_personel_id,date_record_created)
VALUES (
'$form_id', '$receive_date', '$vl_result', '$dispatch_date', '$nhls_receive_date', '$pih_staff_id', '$date_created')";

mysql_query($insert_lab_vl_repeat, $bd);	
    
    $sql_sample = "UPDATE sample ".
       "SET status='Dispatched'".
       "WHERE id='$sampleid'" ;

mysql_select_db('3rdlineart_db');
$sample_recieved = mysql_query( $sql_sample, $bd );
    
 echo '							
<div class="alert alert-success">
                                                  <button type="button" class="close" data-dismiss="alert">&times;</button>
                                                  <strong>Success!</strong> You have Dispatched the sample.
                           
                           </div>
                   ';    
  
 /*   
 $to = $email;
   $subject = "New Patient Sample 3RD Line";
   $message = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>New form to review</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body>
<p>Dear </p>
<p>Kindly note/receive sample for patient form #'.$form_id.'</p>
<p>Thank you very much,</p>
<p>Regards</p>
<p>&nbsp;</p>
<p>'.$fullname.'</p>
<p>Clinician at: '.$facility.'</p>

</body>
</html>
';   
 $header = "From:dumi_ndhlovu@lighthouse.org.mw\r\n";
   $header .= "Cc:j.dumisani7291@gmail.com\r\n";
   $header .= "MIME-Version: 1.0\r\n";
   $header .= "Content-type: text/html\r\n";
   $retval = mail ($to,$subject,$message,$header);    */
    
}

  echo"<meta http-equiv=\"Refresh\" content=\"6; url=pih_p1.php?p\">";

?>