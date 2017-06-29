<?php 

  if(isset($_POST['submit_reviewers'])){
      
      	
$formID= $_POST['formID']; 
      
      /*$rev_lead = $_POST['rev_lead'];
      echo $rev_lead;
      
      $insert_reviewer_team_lead =" INSERT  INTO  reviewer_team_lead (rev_id,form_id,sec_id)
VALUES (
'$rev_lead', '$formID', '$sec_id')";

mysqli_query( $bd,$insert_reviewer_team_lead);	
      
      */

      $date_assigned = date ('Y/m/d');
      
	  if(!empty($_POST['checkbox'])){   
 $checkbox = $_POST['checkbox'];
 
	
	
for($i=0;$i<count($_POST['checkbox']);$i++){
	
    if(!empty($checkbox[$i])){  
$rev_id = $checkbox[$i];
	}

    
$insert_assigned_forms=" INSERT  INTO  assigned_forms (form_id,sec_id,rev_id,date_assigned)
VALUES (
'$formID', '$sec_id', '$rev_id', '$date_assigned')";

mysqli_query( $bd,$insert_assigned_forms);	
    
    $SQL_reviewer = "SELECT * FROM reviewer WHERE id=$rev_id";
    $reviewer = mysqli_query($bd,$SQL_reviewer);
    
                $row_reviewer = mysqli_fetch_array($reviewer);
                $rev_email_address = $row_reviewer['email'];
                $rev_title = $row_reviewer['title'];
                $rev_lname = $row_reviewer['lname'];
 
     
 $to = $rev_email_address;
   $subject = "3RD Line Expert Application form review";
   $message = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>New form to review</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body>

<p>Dear '.$rev_title.' '.$rev_lname.',</p>
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

</body>
</html>
';   
 $header = "From:dumi_ndhlovu@lighthouse.org.mw\r\n";
   $header .= "Cc:j.dumisani7291@gmail.com\r\n";
   $header .= "MIME-Version: 1.0\r\n";
   $header .= "Content-type: text/html\r\n";
   $retval = mail ($to,$subject,$message,$header);    
    
    
}
      }
      
  }
?>