<?php

// include ("crypt_function.php");
global $fullname, $username, $key;

if(isset($_POST['register_rev'])){ 
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
	$role ='Reviewer';
    $fullname = "$title. $fname $lname";
	$date_created= date('Y/m/d');

	$find_users=mysqli_query($bd, "SELECT * FROM users where username='".encrypt ($username, $key)."'"); 
	$getusers = mysqli_num_rows ($find_users);
	$pswd_size = strlen($password);
	echo "user: $username pwsize: $pswd_size fullname: $fullname";

	if ($password!=$password_confirm){
		echo '<div class="alert alert-warning">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
		<p style="color:#f00"><strong>Yoo!</strong> Passwords dont match </p>
	</div>
	';
	echo"<meta http-equiv=\"Refresh\" content=\"2; url=dash.php?reviewer\">";  
}

else {
	if ($pswd_size < 6){
		echo '<div class="alert alert-warning">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
		<p style="color:#f00"><strong>Ooops!</strong>User creation failed, Password length less than 5 characters </p>
	</div>
	';
    echo"<meta http-equiv=\"Refresh\" content=\"2; url=dash.php?reviewer\">";     
} else {
	if ($getusers > 0){
		echo '<div class="alert alert-warning">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
		<p style="color:#f00"><strong>Sorry!</strong> Username already taken </p>
	</div>
	';
     echo"<meta http-equiv=\"Refresh\" content=\"2; url=dash.php?reviewer\">"; 
} else {
    echo "about to insert $username as $role";
	$password = hasword ($password, $salt);
	$insert_users = " INSERT INTO users
	(username,password,role,date_created)
	VALUES (
	'".encrypt ($username, $key)."', '$password', '".encrypt ($role, $key)."', '$date_created')";

	mysqli_query($bd, $insert_users);

	$users = mysqli_query($bd, "SELECT * FROM users where username='".encrypt ($username, $key)."'"); 
	$row_users = mysqli_fetch_array($users);
	$user_id = $row_users['id'];

	$insert_reviewer = " INSERT  INTO  reviewer
	(user_id,title,fname,lname,email,phone,affiliate_institution,snapshot)
	VALUES (
	'$user_id', '$title', '$fname', '$lname', '$email', '$phone', '$affiliate_institution','$snapshot')";

	mysqli_query($bd, $insert_reviewer);

	echo '							
	<div class="alert alert-success">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
		<strong>Success!</strong> New User was created.
	</div>
	';

    email_msg('send_user_email', $email);
	echo"<meta http-equiv=\"Refresh\" content=\"2; url=dash.php?reviewer\">"; 
}
}
}
}

?>