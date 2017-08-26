<?php

global $fullname, $username, $role, $key;
if(isset($_GET['update_user'])) {
	$update_id = $_POST['id'];
	$user_id = $_POST['user_id'];

	if(isset($_POST['update_clinician'])){		
		$clin_art_clinic= mysqli_real_escape_string($bd,$_POST['art_clinic']);
		$username= mysqli_real_escape_string($bd,$_POST['username']);
		$fullname= mysqli_real_escape_string($bd,$_POST['name']);
		$email= mysqli_real_escape_string($bd,$_POST['email']);
		$phone= mysqli_real_escape_string($bd,$_POST['phone']);
		$password= mysqli_real_escape_string($bd,$_POST['password']);
		$password_confirm= mysqli_real_escape_string($bd,$_POST['confirm_pswd']);
		$pswd_size = strlen($password);
		
		if ($password!=$password_confirm) {
			echo '<div class="alert alert-warning">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			<p style="color:#f00"><strong>Yoo!</strong> Passwords dont match </p>
		</div>';
		echo"<meta http-equiv=\"Refresh\" content=\"2; url=".$main_page."?clin_edit".$source."&id='.$update_id.'\">";  
        } else {
            if ($pswd_size < 6) {
                echo '<div class="alert alert-warning">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			<p style="color:#f00"><strong>Ooops!</strong>User creation failed, Password length less than 5 characters </p>
		</div>';
                if (isset($_GET['source_page'])) {             
                    include ('includes/welcome_msg.php'); 
                } else {
                    email_msg('send_user_email', $email); 
                    echo"<meta http-equiv=\"Refresh\" content=\"2; url=".$main_page."?clin_edit".$source."&id='.$update_id.'\">";
                }
            } else {
                // echo "we are inww";
                $password = hasword ($password, $salt);
                $username = encrypt ($username, $key);
                
                $sql_update_user = "UPDATE users ".
                    "SET 
		username='$username',

		password='$password'
		WHERE id='$user_id'" ;
                mysqli_query($bd, $sql_update_user);
                
                $sql_update_clinician = "UPDATE clinician".
                    "SET 
		name ='$fullname',
		phone='$phone',
		email='$email',
		art_clinic='$clin_art_clinic'
		WHERE id='$update_id'";
                if (mysqli_query($bd, $sql_update_clinician)) {
                    echo '  <div class="alert alert-success">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			<p style="color:#000">You have <strong> updated Clinician details </strong>. </p>
		</div>';
                    if (isset($_GET['source_page'])){
                        include ('includes/welcome_msg.php');                      
                    } else {
                        email_msg('send_user_email', $email); 
                        echo"<meta http-equiv=\"Refresh\" content=\"2; url=".$main_page."?man_clin".$source."\">";
                    }            
                }
            }
        }
    }
    
if(isset($_POST['update_lab_user'])) { 
	$username= mysqli_real_escape_string($bd,$_POST['username']);
	$fname= mysqli_real_escape_string($bd,$_POST['fname']);
	$lname= mysqli_real_escape_string($bd,$_POST['lname']);
	$email= mysqli_real_escape_string($bd,$_POST['email']);
	$phone= mysqli_real_escape_string($bd,$_POST['phone']);
	$password= mysqli_real_escape_string($bd,$_POST['password']);
	$password_confirm= mysqli_real_escape_string($bd,$_POST['confirm_pswd']);
	$pswd_size = strlen($password);
    $role = 'Lab';
    
	if ($password!=$password_confirm) {
		echo '<div class="alert alert-warning">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
		<p style="color:#f00"><strong>Yoo!</strong> Passwords dont match </p>

	</div>
	';
        echo"<meta http-equiv=\"Refresh\" content=\"2; url=".$main_page."?lab_edit".$source."&id=$update_id\">";  
    } else {
        if ($pswd_size < 6) {
            echo '<div class="alert alert-warning">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
		<p style="color:#f00"><strong>Ooops!</strong>User creation failed, Password length less than 5 characters </p>

	</div>
	';
            
            echo"<meta http-equiv=\"Refresh\" content=\"2; url=".$main_page."?lab_edit".$source."&id=$update_id\">";     
        } else {
            $password= hasword ($password, $salt);
            $username = encrypt ($username, $key);
            
            $sql_update_user =  "UPDATE users ".
                "SET 
	username='$username',
	password='$password'
	WHERE id='$user_id'" ;
            mysqli_query($bd, $sql_update_user);
            
            $sql_update_pih_lab =  "UPDATE pih_lab ".
                "SET 
	fname ='$fname',
	lname ='$lname',
	phone='$phone',
	email='$email'
	WHERE id='$update_id'" ;
            if (mysqli_query($bd, $sql_update_pih_lab)){
                echo '<div class="alert alert-success">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
		<p style="color:#000">You have <strong> updated User details </strong>. </p>
	</div>';
                if (isset($_GET['source_page'])){                    
                    include ('includes/welcome_msg.php'); 
                } else {
                    email_msg('send_user_email', $email); 
                    echo"<meta http-equiv=\"Refresh\" content=\"2; url=".$main_page."?man_lab".$source."\">";
                }
            }
        }
    }
}

if(isset($_POST['update_sec'])) {
	$username= mysqli_real_escape_string($bd,$_POST['username']);
	$fname= mysqli_real_escape_string($bd,$_POST['fname']);
	$lname= mysqli_real_escape_string($bd,$_POST['lname']);
	$email= mysqli_real_escape_string($bd,$_POST['email']);
	$phone= mysqli_real_escape_string($bd,$_POST['phone']);
	$password= mysqli_real_escape_string($bd,$_POST['password']);
	$password_confirm= mysqli_real_escape_string($bd,$_POST['confirm_pswd']);
	$pswd_size = strlen($password);
    $role = 'Secretary';
    
	if ($password!=$password_confirm) {
		echo '<div class="alert alert-warning">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
		<p style="color:#f00"><strong>Yoo!</strong> Passwords dont match </p></div>';
		echo"<meta http-equiv=\"Refresh\" content=\"2; url=".$main_page."?sec_edit".$source."&id=$update_id\">";  
	} else {
		if ($pswd_size < 6) {
			echo '<div class="alert alert-warning">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			<p style="color:#f00"><strong>Ooops!</strong>User creation failed, Password length less than 5 characters </p></div>';
			echo"<meta http-equiv=\"Refresh\" content=\"2; url=".$main_page."?sec_edit".$source."&id=$update_id\">";     
		} else {
			$password= hasword ($password, $salt);
			$username = encrypt ($username, $key);

			$sql_update_user =  "UPDATE users ".
			"SET 
			username='$username',
			password='$password'
			WHERE id='$user_id'" ;
			mysqli_query($bd, $sql_update_user);

			$sql_update_secretary =  "UPDATE secretary ".
			"SET 
			fname ='$fname',
			lname ='$lname',
			phone='$phone',
			email='$email'
			WHERE id='$update_id'" ;

			if (mysqli_query($bd, $sql_update_secretary)) {
				echo '  <div class="alert alert-success">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<p style="color:#000">You have <strong> updated User details </strong>. </p>
			</div>';

                if (isset($_GET['source_page'])) {
                    include ('includes/welcome_msg.php'); 
                } else {
                    email_msg('send_user_email', $email); 
                    echo"<meta http-equiv=\"Refresh\" content=\"2; url=".$main_page."?man_sec".$source."\">"; 
                }                
            }
        }
    }
} 

if(isset($_POST['update_rev'])) { 
	$title= mysqli_real_escape_string($bd,$_POST ['title']);
	$username= mysqli_real_escape_string($bd,$_POST['username']);
	$fname= mysqli_real_escape_string($bd,$_POST ['fname']);
	$lname= mysqli_real_escape_string($bd,$_POST ['lname']);
	$email= mysqli_real_escape_string($bd,$_POST ['email']);
	$phone= mysqli_real_escape_string($bd,$_POST ['phone']);
	$password= mysqli_real_escape_string($bd,$_POST['password']);
	$password_confirm= mysqli_real_escape_string($bd,$_POST['confirm_pswd']);
	$affiliate_institution= mysqli_real_escape_string($bd,$_POST ['affiliate_institution']);
	$snapshot= mysqli_real_escape_string($bd,$_POST['snapshot']);

	$pswd_size = strlen($password);
	if ($password!=$password_confirm) {
		echo '<div class="alert alert-warning">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
		<p style="color:#f00"><strong>Yoo!</strong> Passwords dont match </p>
	</div>';
        echo"<meta http-equiv=\"Refresh\" content=\"2; url=".$main_page."?rev_edit".$source."&id=$update_id\">";  
    } else {
        if ($pswd_size < 6) {
            echo '<div class="alert alert-warning">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
		<p style="color:#f00"><strong>Ooops!</strong>User creation failed, Password length less than 5 characters </p>
	</div>
	';
            if (isset($_GET['source_page'])) {
                include ('includes/welcome_msg.php'); 
            } else {
                email_msg('send_user_email', $email); 
                echo"<meta http-equiv=\"Refresh\" content=\"2; url=".$main_page."?rev_edit".$source."&id=$update_id\">";
            }
        } else {
            $password = hasword ($password, $salt);
            $username = encrypt ($username, $key);
            
            $sql_update_user =  "UPDATE users ".
                "SET 
	username='$username',
	password='$password'
	WHERE id='$user_id'";
            
            mysqli_query($bd, $sql_update_user);
            $sql_update_reviewer =  "UPDATE reviewer ".
                "SET 
	title ='$title',
	fname ='$fname',
	lname ='$lname',
	phone='$phone',
	email='$email',
	affiliate_institution='$affiliate_institution',
	snapshot='$snapshot'
	WHERE id='$update_id'";
            
            $fullname = $title.' '.$fname.' '.$lname;
            // echo "updating $update_id";
            if (mysqli_query($bd, $sql_update_reviewer)) {
                echo '  <div class="alert alert-success">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
		<p style="color:#000">You have <strong> updated User details </strong>. </p>
	</div>';                
                if ($source=='source_page') {
                    include ('includes/welcome_msg.php'); 
                } else {
                    email_msg('send_user_email', $email); 
                    echo"<meta http-equiv=\"Refresh\" content=\"2; url=".$main_page."?man_rev".$source."\">"; 
                }
            }
        }
    }
} 
}
?>