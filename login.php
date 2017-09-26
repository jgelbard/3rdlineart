<?PHP
session_start();
include("includes/config.php");
include("includes/crypt_function.php");

$username = "";
$pword = "";

function quote_smart($value, $handle) {

   if (get_magic_quotes_gpc()) {
       $value = stripslashes($value);
   }

   if (!is_numeric($value)) {
       // $value = "'" . mysqli_real_escape_string($value, $handle) . "'";
       $value = "'" . mysqli_real_escape_string($handle, $value) . "'";       
   }
   return $value;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
   $username = $_POST['username'];
   $pword = $_POST['password'];
   $use=$username;
   $username = htmlspecialchars($username);
   $pword = htmlspecialchars($pword);

   /*  $username = quote_smart($username, $bd);*/
   /*  $pword = quote_smart($pword, $bd);*/

   // echo('key is '.$key);
   // echo('salt is '.$salt);

   $username = encrypt ($username, $key);
   // echo('username is '.$username);
   $pword = hasword ($pword, $salt);

   $SQL = "SELECT * FROM users WHERE username='$username' AND password='$pword';";    			   
   $result = mysqli_query($bd,$SQL);

   $num_rows = mysqli_num_rows($result);
   // echo $username;

     //checking login attempts
   global $attempts, $row_id;

   $select_login_attempts = "SELECT * FROM login_attempts WHERE username=$username";   
   $result_login_attempts = mysqli_query($bd,$select_login_attempts);
   $exist_attempts = mysqli_num_rows($result_login_attempts);
   $row_login_attempts = mysqli_fetch_array($result_login_attempts);
   $row_id = $row_login_attempts['id'];
   $attempts = $row_login_attempts['attempts'];

   // end checking login attempts

   if($num_rows != 0 && $attempts < 5){
    $SQL_user = "SELECT * FROM users WHERE username='$username'";                
    $user = mysqli_query($bd,$SQL_user);

    while($row_user = mysqli_fetch_array($user)) {

        //reset login attempts 
        $reset_login_attempts = "DELETE FROM login_attempts WHERE username=$username";
        mysqli_query($bd, $reset_login_attempts);

        $role = decrypt ($row_user['role'], $key);
        $user_id = $row_user['id'];
        // echo("role is ".$role);
        $_SESSION['login'] = 'true';
        $_SESSION['username'] = $row_user['username'];
        $_SESSION['identification'] = $row_user['id'];           			   
        $_SESSION['start'] = time(); // taking now logged in time (was time())
        $_SESSION['expire'] = $_SESSION['start'] + (20 * 60) ;
        //header ("Location:".$pageLocation);

        if ($role=='Clinician'){
            $SQL_clinician = "SELECT * FROM clinician WHERE user_id=$user_id";
            $clinician = mysqli_query($bd,$SQL_clinician);

            $row_clinician = mysqli_fetch_array($clinician);                
            $_SESSION['id'] = $row_clinician['id'];
            $_SESSION['name'] = $row_clinician['name'];
            $_SESSION['phone'] = $row_clinician['phone'];
            $_SESSION['email'] = $row_clinician['email'];
            $_SESSION['art_clinic'] = $row_clinician['art_clinic'];            
            echo"<meta http-equiv=\"Refresh\" content=\"0; url=app.php?p\">";
        }

        if ($role=='Reviewer'){
            $SQL_reviewer = "SELECT * FROM reviewer WHERE user_id=$user_id";
            $reviewer = mysqli_query($bd,$SQL_reviewer);
            $row_reviewer = mysqli_fetch_array($reviewer);

            $_SESSION['id'] = $row_reviewer['id'];    
            $_SESSION['fname'] = $row_reviewer['fname'];
            $_SESSION['lname'] = $row_reviewer['lname'];
            $_SESSION['phone'] = $row_reviewer['phone'];
            $_SESSION['email'] = $row_reviewer['email'];
            echo"<meta http-equiv=\"Refresh\" content=\"0; url=reviewer/review_p1.php?p\">";
        }

        if ($role=='Secretary'){
            echo 'got a secretary!';
            $SQL_secretary = "SELECT * FROM secretary WHERE user_id=$user_id";
            $secretary = mysqli_query($bd,$SQL_secretary);
            $row_secretary = mysqli_fetch_array($secretary);

            $_SESSION['id'] = $row_secretary['id'];
            $_SESSION['fname'] = $row_secretary['fname'];
            $_SESSION['lname'] = $row_secretary['lname'];
            $_SESSION['phone'] = $row_secretary['phone'];
            $_SESSION['email'] = $row_secretary['email'];
            // echo 'secretary: '. $_SESSION['fname'].' '.$_SESSION['lname'];            
            echo"<meta http-equiv=\"Refresh\" content=\"0; url=check_point/cp_p1.php?p\">";
        }

        if ($role=='Lab'){
            $SQL_pih_lab = "SELECT * FROM pih_lab WHERE user_id=$user_id";
            $pih_lab = mysqli_query($bd,$SQL_pih_lab);
            $row_pih_lab = mysqli_fetch_array($pih_lab);

            $_SESSION['id'] = $row_pih_lab['id'];
            $_SESSION['fname'] = $row_pih_lab['fname'];
            $_SESSION['lname'] = $row_pih_lab['lname'];
            $_SESSION['phone'] = $row_pih_lab['phone'];
            $_SESSION['email'] = $row_pih_lab['email'];
            echo"<meta http-equiv=\"Refresh\" content=\"0; url=pih/pih_p1.php?p\">";
        }				
        if ($role=='Admin'){
            $SQL_admin = "SELECT * FROM admin WHERE user_id=$user_id";
            $admin = mysqli_query($bd,$SQL_admin);
            $row_admin = mysqli_fetch_array($admin);

            $_SESSION['id'] = $row_admin['id'];
            $_SESSION['fname'] = $row_admin['fname'];
            $_SESSION['lname'] = $row_admin['lname'];
            $_SESSION['phone'] = $row_admin['phone'];
            $_SESSION['email'] = $row_admin['email'];
            echo"<meta http-equiv=\"Refresh\" content=\"0; url=admin/dash.php?p\">";
        }				
    }

}


if ($num_rows== 0 || $attempts >=5)
{

    $date = date (Y/m/d);

    if ($exist_attempts > 0){
        $attempts =  $attempts+1; 
        echo $row_id.$attempts;

        $update_login_attempts = "UPDATE login_attempts ".
        "SET attempts='$attempts'
        WHERE id='$row_id'" ;
        mysqli_query($bd, $update_login_attempts);               
    }

    else {
        $attempts = 0;
        $insert_login_attempts="INSERT  INTO login_attempts (username,attempts, date)
        VALUES ('$use', '$attempts','$date' )";
        mysqli_query( $bd,$insert_login_attempts);	
    }
    echo $attempts;
    if ($attempts >=5){
        $error ="blocked";
    }
    else {
        $error="fail";
    }
    echo 'error: '.$error;
	//header ("Location: index.php?error=$error&use=$use");
    echo"<meta http-equiv=\"Refresh\" content=\"3; url=index.php?error=$error&sub=login\">";
}
}
?>