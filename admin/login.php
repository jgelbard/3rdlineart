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
       $value = "'" . mysql_real_escape_string($value, $handle) . "'";
   }
   return $value;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
	$username = $_POST['username'];
	$pword = $_POST['password'];
	//$pageLocation=$_POST['location'];
    $use=$username;
	$username = htmlspecialchars($username);
	$pword = htmlspecialchars($pword);

	
	//	Connect to db
	
	$user_name = "root";
	$pass_word = "";
	$database = "3rdlineart_db";
	$server = "Localhost";


	$db_handle = mysql_connect($server, $user_name, $pass_word);
	$db_found = mysql_select_db($database, $db_handle);

	

		$username = quote_smart($username, $db_handle);
		$pword = quote_smart($pword, $db_handle);
         
		$SQL = "SELECT * FROM users WHERE 	username=$username AND password=$pword;";
		
		   
    $result = mysql_query($SQL,$bd);
			
    $num_rows = mysql_num_rows($result);
			if($num_rows!=0){
                
                $SQL_user = "SELECT * FROM users WHERE username=$username";
                
                $user = mysql_query($SQL_user,$bd);
                
				while($row_user = mysql_fetch_array($user)) {
                    
                    $role = $row_user['role'];
                    $user_id = $row_user['id'];
                    $_SESSION['login'] = 'true';
				    $_SESSION['username'] = $row_user['username'];
                    //$_SESSION['session_number'] = $row['session_number'];
                    /*$_SESSION['fname'] = $row_learner['fname'];
                    $_SESSION['lname'] = $row_learner['lname'];*/
				    $_SESSION['identification'] = $row_user['id'];
           
			   
                    $_SESSION['start'] = time(); // taking now logged in time
                    $_SESSION['expire'] = $_SESSION['start'] + (20 * 60) ;
                    //header ("Location:".$pageLocation);
                    
                     if ($role=='Admin'){
                     $SQL_admin = "SELECT * FROM admin WHERE user_id=$user_id";
                    $admin = mysql_query($SQL_admin,$bd);
                    
                    $row_admin = mysql_fetch_array($admin);
                
                        $_SESSION['id'] = $row_admin['id'];
                        $_SESSION['fname'] = $row_admin['fname'];
                        $_SESSION['lname'] = $row_admin['lname'];
                     echo"<meta http-equiv=\"Refresh\" content=\"0; url=dash.php?p\">";    
                     }
                    
                if ($role=='Clinician'){
                $SQL_clinician = "SELECT * FROM clinician WHERE user_id=$user_id";
                    $clinician = mysql_query($SQL_clinician,$bd);
                    
                    $row_clinician = mysql_fetch_array($clinician);
                
                        $_SESSION['id'] = $row_clinician['id'];
                        $_SESSION['name'] = $row_clinician['name'];
                        $_SESSION['phone'] = $row_clinician['phone'];
                        $_SESSION['email'] = $row_clinician['email'];
                        $_SESSION['art_clinic'] = $row_clinician['art_clinic'];
                    echo"<meta http-equiv=\"Refresh\" content=\"0; url=app.php?p\">";
                }
	
                if ($role=='Reviewer'){
                $SQL_reviewer = "SELECT * FROM reviewer WHERE user_id=$user_id";
                    $reviewer = mysql_query($SQL_reviewer,$bd);
                    
                    $row_reviewer = mysql_fetch_array($reviewer);
                
                        $_SESSION['id'] = $row_reviewer['id'];    
                        $_SESSION['fname'] = $row_reviewer['fname'];
                        $_SESSION['lname'] = $row_reviewer['lname'];
                        $_SESSION['phone'] = $row_reviewer['phone'];
                        $_SESSION['email'] = $row_reviewer['email'];
                        
                    echo"<meta http-equiv=\"Refresh\" content=\"0; url=reviewer/review_p1.php?p\">";
                }
                    
                if ($role=='Secretary'){
                $SQL_secretary = "SELECT * FROM secretary WHERE user_id=$user_id";
                    $secretary = mysql_query($SQL_secretary,$bd);
                    
                    $row_secretary = mysql_fetch_array($secretary);
                
                        $_SESSION['id'] = $row_secretary['id'];
                        $_SESSION['fname'] = $row_secretary['fname'];
                        $_SESSION['lname'] = $row_secretary['lname'];
                        $_SESSION['phone'] = $row_secretary['phone'];
                        $_SESSION['email'] = $row_secretary['email'];
                        
                    echo"<meta http-equiv=\"Refresh\" content=\"0; url=check_point/cp_p1.php?p\">";
                }
                    
                     if ($role=='Lab'){
                $SQL_pih_lab = "SELECT * FROM pih_lab WHERE user_id=$user_id";
                    $pih_lab = mysql_query($SQL_pih_lab,$bd);
                    
                    $row_pih_lab = mysql_fetch_array($pih_lab);
                
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
