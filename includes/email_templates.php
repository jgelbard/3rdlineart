<?php
if (!file_exists('includes/vendor/autoload.php') and !file_exists('../includes/vendor/autoload.php')) {
    echo '<h1>Put back vendor, stupid!</h1>';
    exit();
}

if (file_exists('../includes/vendor/autoload.php'))
    require '../includes/vendor/autoload.php';    
else
    require 'includes/vendor/autoload.php';

if (file_exists('../includes/crypt_function.php'))
    require_once '../includes/crypt_function.php';
else
    require 'includes/crypt_function.php';

function phpmailer2($to, $subject, $body) {
    global $bd;
    $curMonth = date("m");
    $curDay = date("j");
    $curYear = date("Y");
    $date_sent = "$curYear/$curMonth/$curDay";
    
	$insert_email = "INSERT INTO email_log
	(msg_from, msg_to, subject, body, date_sent)
	VALUES (
	'3rdlineartmalawi@gmail.com', '$to', '$subject', ?, '$date_sent')"; // get_file_contents

    $stmt = mysqli_prepare($bd, $insert_email);
    mysqli_stmt_bind_param($stmt, 'b', mysqli_stmt_send_long_data($stmt, 0, $body));
    mysqli_stmt_execute($stmt);
    
    // mysqli_query( $bd, $insert_email);
    // echo $insert_email;
    return;
}

function phpmailer($to, $subject, $body) {
    global $bd;
    $curMonth = date("m");
    $curDay = date("j");
    $curYear = date("Y");
    $date_sent = "$curYear/$curMonth/$curDay";
    
	$insert_email = "INSERT INTO email_log
	(msg_from, msg_to, subject, body, date_sent)
	VALUES (
	'3rdlineartmalawi@gmail.com', '$to', '$subject', '".base64_encode($body)."', '$date_sent')"; // get_file_contents

    mysqli_query($bd, $insert_email);
    return;
}

function phpmailer_send($to, $subject, $body, $from='3rdlineartmalawi@gmail.com', $attachments=[]) {    
    $mail = new PHPMailer;

    // $mail->SMTPDebug = 3;                               // Enable verbose debug output
    // $mail->SMTPDebug = 2;                               // Enable less verbose debug output
    
    $mail->isSMTP();                                      // Set mailer to use SMTP
    // $mail->Host = 'ssl://email-smtp.us-west-2.amazonaws.com';

    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    
    // PUT THE CREDENTIALS HERE - ultimately they will come from the database !!!
    $mail->Username = '3rdlineartmalawi';                 // SMTP username
    $mail->Password = 'g3n0typ3';                         // SMTP password

    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    // $mail->Port = 443;                                    // TCP port to connect to
    
    $mail->setFrom($from, '3rdlineart Mailer');
    $mail->addAddress($to);     // Add a recipient, Name (2nd arg) is optional
    // $mail->addReplyTo('info@example.com', 'Information');

    // CC and BCC
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    // $mail->addAttachment('/var/tmp/file.tar.gz');      // Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg'); // Optional name
    
    $mail->isHTML(true);                                  // Set email format to HTML

    $mail->Subject = $subject;
    $mail->Body    = $body;
    $mail->AltBody = $body;
    
    // fastcgi_finish_request();
    echo 'about to send!';
    $ret = $mail->send();
    if(!$ret) {
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
        echo 'Message has been sent';
    }
    return $ret;
}

// $from3rdlineemail = "From:3rdlineart@lighthouse.org.mw\r\n";
function email_msg($email_template, $to='3rdlineartmalawi@gmail.com') {
    global $facility, $rev_title, $rev_lname, $fullname, $username, $key, $decision, $attachements;
    global $password, $role;
    global $comment_to_clinician;
    global $secretary_name, $email_secretary;
    global $rooturl;
    
    $from3rdlineemail = "From:3rdlineartmalawi@gmail.com\r\n";
    $ccemail = ""; // "Cc:j.dumisani7291@gmail.com\r\n";
    $bccemail = ""; // "Bcc:dumi_ndhlovu@lighthouse.org.mw\r\n";

    // echo 'email: '.$email_template;
    // echo 'email: to: '.$to;
    // echo 'email: facility: '.$facility;
    // echo 'role is: '.$role;
    
    switch ($email_template) {
	case 'test':
		$subject = "New 3rd Line ART Application";
		$message = "<p>Dear 3<sup>rd</sup> Line ART Secretary,</p>
		<p>&nbsp;</p>
		<p>You have a new 3<sup>rd</sup> Line ART Expert committee application form from $facility.</p>
		<p>Kindly check its completeness and follow the SOP.</p>
		<p>&nbsp;</p>
		<p>Regards</p>
		<p>System email Notification &nbsp;</p>";
        $retval = phpmailer($to, $subject, $message);
		break;

	case 'complete_form':
		$subject = "New 3rd Line ART Application";
		$message = "<p>Dear 3<sup>rd</sup> Line ART Secretary,</p>
		<p>&nbsp;</p>
		<p>You have a new 3<sup>rd</sup> Line ART Expert committee application form from $facility.</p>
		<p>Kindly check its completeness and follow the SOP.</p>
		<p>&nbsp;</p>
		<p>Regards</p>
		<p>System email Notification &nbsp;</p>";
        // bcc;
		$retval = phpmailer($to,$subject,$message);
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
			<p><strong>'.$secretary_name.'</strong></p>
			<p><span style="text-decoration: underline;"><strong>3<sup>rd</sup> line committee Secretary</strong></span></p>
		</body>
		</html>
		';
        // cc;
		$retval = phpmailer($to,$subject,$message);
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
            <p><strong>'.$secretary_name.'</strong></p>
            <p><span style="text-decoration: underline;"><strong>3<sup>rd</sup> line committee Secretary</strong></span></p>
        </body>
        </html>';
        // echo $message;
		$retval = phpmailer($to,$subject,$message);        
		break;

 	case 'insert_reminder_consolidate':
		$subject = "3RD Line Expert Committee Genotype Result review";
		$message = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
		<html xmlns="http://www.w3.org/1999/xhtml">
		<head>
			<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
			<title>Review Consolidation Reminder</title>
			<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		</head>
		<body>
            Dear Lead Reviewer,
<br>
			<p>Please go ahead and consolidate the form application reviews to determine Genotyping qualification
            <p><a href="'.$rooturl.'">Click Here To Log In</a>
		</body>
		</html>
		';
        // cc;
		$retval = phpmailer($to,$subject,$message);
		break;
       
	case 'insert_consolidate2':
		$subject = "3RD Line Expert Committee Genotype Result review";
		$message = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
		<html xmlns="http://www.w3.org/1999/xhtml">
		<head>
			<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
			<title>New Consolidated Review</title>
			<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		</head>
		<body>
			'.$decision.'
			<p>Find attachments:</p>
			'.$attachements.'
		</body>
		</html>
		';
        // cc;
		$retval = phpmailer($to,$subject,$message);
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
			<p>Please review the following results for genotyping for resistance mutations which were received from NHLS.</p>
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
			<p><strong>'.$secretary_name.'</strong></p>
			<p><span style="text-decoration: underline;"><strong>3<sup>rd</sup> line committee Secretary</strong></span></p>
		</body>
		</html>
		';
        // cc;
		$retval = phpmailer($to,$subject,$message);    
		break;

	case 'insert_assign_reviewer':
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
			<p><strong>'.$secretary_name.'</strong></p>
			<p><span style="text-decoration: underline;"><strong>3<sup>rd</sup> line committee Secretary</strong></span></p>
		</body>
		</html>
		';
        // cc;
		$retval = phpmailer($to,$subject,$message);
		break;

	case 'send_user_email':
        // echo 'send_user_email: '.$to.', username: '.$username.', key: '.$key.', role: '.$role;
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
			<p>You have been registered as a '.$role.' user in the 3<sup>rd</sup> Line ART Expert Committee Malawi. Follow the link to complete your registration:</p>
            <a href="'.$rooturl.'/new_user_account.php?x='.urlencode(encrypt($username, $key)).'&y='.urlencode(encrypt($role, $key)).'&z='.urlencode($password).'">Click Here</a>
			<p>&nbsp;</p>
			<p>Regards</p>
			<p>Admin</p>
		</body>
		</html>
		';
        // cc;
        // echo 'encrypt: '.encrypt ($username, $key);
		$retval = phpmailer ($to,$subject,$message);
        echo 'phpmailer returned: '.$retval;
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
        // cc;
		$retval = phpmailer($to,$subject,$message);    
		break;
        
    case 'sec_app_reject':
        // $to = $clinician_email;
        $subject = "3RD Line Expert Application form rejected";
        $message = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
            <html xmlns="http://www.w3.org/1999/xhtml">
            <head>
            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
            <title>New form to review (Rejected)</title>
            <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
            </head>
            <body>
            '.$comment_to_clinician.'
            </body>
            </html>
            ';
        $retval = phpmailer($to,$subject,$message);
        break;
    }
    return $retval;
}
// echo email_msg('complete_form', 'jeffgelbard@gmail.com');
// phpmailertest();
?>