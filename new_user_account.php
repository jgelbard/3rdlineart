<?php
include("includes/config.php");
include ("admin/includes/crypt_function.php");
if ($_SERVER['REQUEST_METHOD'] == 'GET'){
   $username = $_GET['x'];
   $role = $_GET['y'];
   $pword = $_GET['z'];
   
 /*  echo('key is '.$key);
   echo('salt is '.$salt); */

   $SQL = "SELECT * FROM users WHERE username='$username' AND role='$role' AND password='$pword';";    			   
   $result = mysqli_query($bd,$SQL);

   $num_rows = mysqli_num_rows($result);
   //echo $role.$num_rows;
   
    if($num_rows!=0){
        
        $row_users=mysqli_fetch_array($result);
        $user_id =$row_users['id'];
        
        $username = decrypt ($username, $key);
        $role = decrypt ($role, $key);
        echo('username is '.$username);
        echo('role is '.$role);
        global $id;
        
        if ($role=='Clinician'){
            $SQL_clinician = "SELECT * FROM clinician WHERE user_id=$user_id";
            $clinician = mysqli_query($bd,$SQL_clinician);
            $row_clinician = mysqli_fetch_array($clinician);                
            $id = $row_clinician['id'];
        }

        if ($role=='Reviewer'){
            $SQL_reviewer = "SELECT * FROM reviewer WHERE user_id=$user_id";
            $reviewer = mysqli_query($bd,$SQL_reviewer);
            $row_reviewer = mysqli_fetch_array($reviewer);
            $id = $row_reviewer['id'];               
        }

        if ($role=='Secretary'){
            $SQL_secretary = "SELECT * FROM secretary WHERE user_id=$user_id";
            $secretary = mysqli_query($bd,$SQL_secretary);
            $row_secretary = mysqli_fetch_array($secretary);
            $id = $row_secretary['id'];           
        }

        if ($role=='Lab'){
            $SQL_pih_lab = "SELECT * FROM pih_lab WHERE user_id=$user_id";
            $pih_lab = mysqli_query($bd,$SQL_pih_lab);
            $row_pih_lab = mysqli_fetch_array($pih_lab);
            $id = $row_pih_lab['id'];        
        }				
        
        echo "<meta http-equiv=\"Refresh\" content=\"0; url=admin/new_user.php?u=$username&r=$role&source_page&id=$id\">";
    }
    
    else {
        echo '  <div class="span11" style="padding:100px 50px">
				    <h1 style="font-size:300%; color:#fa3232; text-decoration: blink;">Denied Access </h1>
                </div>';
    }

}

?>

