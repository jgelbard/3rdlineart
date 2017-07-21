<?php
$from3rdlineemail = "From:3rdlineart@lighthouse.org.mw\r\n";
$ccemail = "Cc:j.dumisani7291@gmail.com\r\n";
$bccemail = "Bcc:dumi_ndhlovu@lighthouse.org.mw\r\n";

function email_msg($email_template, $to='3rdlineartmw@gmail.com') {
    global $facility, $rev_title, $rev_lname, $fullname, $username, $decision, $attachments;
        
    switch ($email_template) {
	case 'complete_form':
		$subject = "New 3rd Line ART Application";
		$message = "<p>Dear 3<sup>rd</sup> Line ART Secretary,</p>
		<p>&nbsp;</p>
		<p>You have a new 3<sup>rd</sup> Line ART Expert committee application form from $facility.</p>
		<p>Kindly check its completeness and do following the SOP.</p>
		<p>&nbsp;</p>
		<p>Regards</p>
		<p>System email Notification &nbsp;</p>"; 
		$header = $from3rdlineemail;
		$header .= $bccemail;
		$header .= "MIME-Version: 1.0\r\n";
		$header .= "Content-type: text/html\r\n";
		$retval = mail ($to,$subject,$message,$header);
		break;

	case 'cp_p1':
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

        $header = $from3rdlineemail;
        $header .= $ccemail;
		$header .= "MIME-Version: 1.0\r\n";
		$header .= "Content-type: text/html\r\n";
		$retval = mail ($to,$subject,$message,$header);    
		break;

	case 'insert_consolidate1':
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
		$header = $from3rdlineemail;
		$header .= $ccemail;
		$header .= "MIME-Version: 1.0\r\n";
		$header .= "Content-type: text/html\r\n";
		$retval = mail ($to,$subject,$message,$header);    
		break;

	case 'insert_consolidate2':
		$subject = "3RD Line Expert Committee Genotype Result review";
		$message = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
		<html xmlns="http://www.w3.org/1999/xhtml">
		<head>
			<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
			<title>New form to review</title>
			<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		</head>
		<body>
			'.$decision.'
			<p>Find attachments:</p>
			'.$attachements.'
		</body>
		</html>
		';   
		$header = $from3rdlineemail;
		$header .= $ccemail;
		$header .= "MIME-Version: 1.0\r\n";
		$header .= "Content-type: text/html\r\n";
		$retval = mail ($to,$subject,$message,$header);   
		break;

	case 'insert_attach_result':
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
		$header = $from3rdlineemail;
		$header .= $ccemail;
		$header .= "MIME-Version: 1.0\r\n";
		$header .= "Content-type: text/html\r\n";
		$retval = mail ($to,$subject,$message,$header);    
		break;

	case 'insert_assign_reviewer':
        // $to = $rev_email_address;
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
		$header = $from3rdlineemail;
		$header .= $ccemail;
		$header .= "MIME-Version: 1.0\r\n";
		$header .= "Content-type: text/html\r\n";
		$retval = mail ($to,$subject,$message,$header);    
		break;

	case 'send_user_email':
        // $to = $email;
		$subject = "New Member";
		$message = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
		<html xmlns="http://www.w3.org/1999/xhtml">
		<head>
			<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
			<title>New User Account</title>
			<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		</head>
		<body>
			<p>Welcome '.$fullname.'!</p>
			<p>You have been registered as a '.$role.' in the 3<sup>rd</sup> Line ART Expert Committee Malawi. Follow the link to complete your registration:</p>
			<a href="http://localhost/3rdline_git/3rdlineart5/admin/new_user.php?'.encrypt ($username, $key).'"></a>
			<p>&nbsp;</p>
			<p>Regards</p>
			<p>Admin</p>
		</body>
		</html>
		';

		$header = $from3rdlineemail;
		$header .= $ccemail;
		$header .= "MIME-Version: 1.0\r\n";
		$header .= "Content-type: text/html\r\n";
		$retval = mail ($to,$subject,$message,$header);    
		break;

	case 'insert_sample':
        // $to = $email;
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
		$header = $from3rdlineemail;
		$header .= $cc3rdlineemail;
		$header .= "MIME-Version: 1.0\r\n";
		$header .= "Content-type: text/html\r\n";
		$retval = mail ($to,$subject,$message,$header);    
		break;
   }
}
?>









