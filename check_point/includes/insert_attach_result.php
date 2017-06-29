

<?php 

  if(isset($_POST['submit_assign_result'])){
	
$formID= $_POST['formID']; 
    
      $date_assigned = date ('Y/m/d');
      $rev_lead = $_POST['rev_lead'];
      
      $insert_reviewer_team_lead =" INSERT  INTO  reviewer_team_lead2 (rev_id,form_id,sec_id)
VALUES (
'$rev_lead', '$formID', '$sec_id')";

mysqli_query( $bd,$insert_reviewer_team_lead);	
      
	  if(!empty($_POST['checkbox'])){   
 $checkbox = $_POST['checkbox'];
 
	
	
for($i=0;$i<count($_POST['checkbox']);$i++){
	
    if(!empty($checkbox[$i])){  
$rev_id = $checkbox[$i];
	}

    
$insert_assigned_app_results=" INSERT  INTO  assigned_app_results (form_id,sec_id,rev_id,date_assigned)
VALUES (
'$formID', '$sec_id', '$rev_id', '$date_assigned')";

mysqli_query( $bd,$insert_assigned_app_results);	
    
    $SQL_reviewer = "SELECT * FROM reviewer WHERE id=$rev_id";
    $reviewer = mysqli_query($bd,$SQL_reviewer);
    
                $row_reviewer = mysqli_fetch_array($reviewer);
                $rev_email_address = $row_reviewer['email'];
                $rev_title = $row_reviewer['title'];
                $rev_lname = $row_reviewer['lname'];
 
     
 $to = $rev_email_address;
   $subject = "3RD Line Expert Commitee: Results for Genotyping received from NHLS";
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
<p>Please review the following results for genotyping for resistance mutations which was received from NHLS.</p>
<p>Attached you will find:</p>
<p>a) The original application form with the clinical information</p>
<p>b) The result and documentation from NHLS.</p>
<p>&nbsp;</p>
<p>After your review please state:</p>
<p>-PI mutation present yes/no</p>
<p>-switch to 3rd line drug indicated yes/no</p>
<p>&nbsp;</p>
<p>If switch is not indicated please additionally provide feedback to the clinician.</p>
<p>&nbsp;</p>
<p>If switch is indicated, indicate suggested ART regimen (Drug 1,2,3).</p>
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
  
      
	$date_created= date('Y-m-d hr:m:s');


	//$date= date ('Y'-'M'-'D');
	
	 $file=$_FILES['file'];  
// file properties  
   $file_name=$file['name'];  
   $file_temp=$file['tmp_name'];  
   $file_size=$file['size'];  
   $file_error=$file['error'];  
  				  
// file extension  
   $file_ext= explode('.',$file_name);  
   $file_ext=strtolower(end($file_ext));  
   $allow= array('txt','jpg','docx','pdf');  
     if(in_array($file_ext,$allow)){  
       if($file_error===0){  
         if($file_size<=2097152){  
              //$file_name_new= uniqid('',true) . '.' .$file_ext;  
			  $file_name_new=time().'-3rdartline-result.'.$file_ext;  
              $file_dest ='../documents/results/'.$file_name_new;  
			  
              move_uploaded_file($file_temp,$file_dest); 
	
echo 'form'.$formID;	
  $insert_app_results=" INSERT  INTO app_results (form_id,result_pdf,date_created)
VALUES (
'$formID','$file_name_new','$date_created')";

$retval=mysqli_query( $bd,$insert_app_results);
             
         }
       }
     }
             
               echo"<meta http-equiv=\"Refresh\" content=\"4; url=cp_p1.php?pending_result\">";  
  }
?>