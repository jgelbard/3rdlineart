<?PHP
session_start();
include("includes/config.php");
$username = "";
$pword = "";
$errorMessage = "";
//==========================================
//	ESCAPE DANGEROUS SQL CHARACTERS
//==========================================
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

   $username = quote_smart($username, $bd);
   $pword = quote_smart($pword, $bd);
         
    $SQL = "SELECT * FROM users WHERE username=$username AND password=$pword;";
			   
    $result = mysqli_query($bd,$SQL);
			
    $num_rows = mysqli_num_rows($result);

    if($num_rows!=0){
        $SQL_user = "SELECT * FROM users WHERE username=$username";                
        $user = mysqli_query($bd,$SQL_user);
                
	while($row_user = mysqli_fetch_array($user)) {
                    
                    $role = $row_user['role'];
                    $user_id = $row_user['id'];
		    echo("role is ".$role);
                    $_SESSION['login'] = 'true';
				    $_SESSION['username'] = $row_user['username'];
                    //$_SESSION['session_number'] = $row['session_number'];
                    /*$_SESSION['fname'] = $row_learner['fname'];
                    $_SESSION['lname'] = $row_learner['lname'];*/
				    $_SESSION['identification'] = $row_user['id'];
           
			   
                    $_SESSION['start'] = time(); // taking now logged in time
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
                $SQL_secretary = "SELECT * FROM secretary WHERE user_id=$user_id";
                    $secretary = mysqli_query($bd,$SQL_secretary);
                    
                    $row_secretary = mysqli_fetch_array($secretary);
                
                        $_SESSION['id'] = $row_secretary['id'];
                        $_SESSION['fname'] = $row_secretary['fname'];
                        $_SESSION['lname'] = $row_secretary['lname'];
                        $_SESSION['phone'] = $row_secretary['phone'];
                        $_SESSION['email'] = $row_secretary['email'];
                        
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
	    
	    
	    
				
}
			
			}
		
	
	if ($num_rows== 0)
	{
		
	$error="fail" ;
	//header ("Location: index.php?error=$error&use=$use");
	echo"<meta http-equiv=\"Refresh\" content=\"0; url=index.php?error=$error&sub=login\">";
		}
	
	
}
		
		
	



?>
