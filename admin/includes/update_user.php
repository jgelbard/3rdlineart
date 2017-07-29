<?php

if(isset($_POST['update_user'])){ 
    
        
    $clin_art_clinic= mysqli_real_escape_string($bd,$_POST['art_clinic']);
    
    $username= mysqli_real_escape_string($bd,$_POST['username']);
    $password= mysqli_real_escape_string($bd,$_POST['password']);
    $password_confirm= mysqli_real_escape_string($bd,$_POST['confirm_pswd']);
    
    
    $fullname= mysqli_real_escape_string($bd,$_POST['name']);
    $email= mysqli_real_escape_string($bd,$_POST['email']);
    $phone= mysqli_real_escape_string($bd,$_POST['phone']);
    $password= mysqli_real_escape_string($bd,$_POST['password']);
    $password_confirm= mysqli_real_escape_string($bd,$_POST['confirm_pswd']);
    
    
    $fname= mysqli_real_escape_string($bd,$_POST['fname']);
    $lname= mysqli_real_escape_string($bd,$_POST['lname']);
    $email= mysqli_real_escape_string($bd,$_POST['email']);
    $phone= mysqli_real_escape_string($bd,$_POST['phone']);
   
     $title= mysqli_real_escape_string(htmlspecialchars( $bd,  $_POST ['title']));

    $fname= mysqli_real_escape_string(htmlspecialchars( $bd,  $_POST ['fname']));
    $lname= mysqli_real_escape_string(htmlspecialchars( $bd,  $_POST ['lname']));
    $email= mysqli_real_escape_string(htmlspecialchars( $bd,  $_POST ['email']));
    $phone= mysqli_real_escape_string(htmlspecialchars( $bd,  $_POST ['phone']));

    $affiliate_institution= mysqli_real_escape_string(htmlspecialchars( $bd,  $_POST ['affiliate_institution']));
    $snapshot= mysqli_real_escape_string(htmlspecialchars( $bd,  $_POST ['snapshot']));
    
$sql_form_creation = "UPDATE user ".
       "SET 
            username='',
            complete='No'
       WHERE patient_id='$pat_id'" ;

mysqli_select_db($bd, '3rdlineart_db');
    
$form_submited = mysqli_query($bd, $sql_form_creation );    

}
?