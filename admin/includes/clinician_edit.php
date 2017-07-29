<?php
global $id;
$id = $_GET['id'];

$clinician=mysqli_query($bd, "SELECT * FROM clinician where id='$id'"); 
    $row_clinician=mysqli_fetch_array($clinician);

        $art_clinic =$row_clinician['art_clinic'];
        $clinician_name =$row_clinician['name'];
        $email =$row_clinician['email'];
        $phone =$row_clinician['phone'];
        $id =$row_clinician['id'];
        $user_id =$row_clinician['user_id'];
        
        $users=mysqli_query($bd, "SELECT * FROM users where id='$user_id'"); 
        $row_users=mysqli_fetch_array($users);
        $username =$row_users['username'];
        $username = decrypt ($username, $key);
?>

<h2 style="background-color:#fff; text-align:left; color:#000000">Edit Clinician</h2>
        <hr />

	
<form id="edit-profile" class="form-horizontal" action="dash.php" method="post">

    
<div class="control-group">											
			<label class="control-label" for="firstname">ART Clinic</label>
			<div class="controls">                          
                              <select name="art_clinic" required id="art_clinic" style="margin:5px">
                              <option value="">select ART Clinic</option>
                              <option selected="selected" value="<?php echo $art_clinic; ?>"><?php echo $art_clinic; ?></option>
                              <?php
//facility

$facility=mysqli_query( $bd,"SELECT * FROM facility"); 
    while ($row_facility=mysqli_fetch_array($facility)){
        
        $facility_name =$row_facility['facilityName'];
        
        echo '<option>'.$facility_name.'</option>';
       
    }
?>
                              </select><br />
   	            	</div>			
</div> 
<div class="control-group">											
			<label class="control-label" for="firstname">Username</label>
		  	<div class="controls">   
                              <input type="text" class="span4" id="firstname" name="username" value="<?php echo $username; ?>"  style="margin:5px"><br />
                            
   	            	</div>			
</div>                           
<div class="control-group">											
			<label class="control-label" for="firstname">Full Name</label>
		  	<div class="controls"> 
                              <input type="text" class="span4" id="fullname" name="name" value="<?php echo  $clinician_name; ?>" style="margin:5px"><br />
   	            	</div>			
</div>  
<div class="control-group">											
			<label class="control-label" for="firstname">Email</label>
		  	<div class="controls">                               
                              <input type="text" class="span4" id="email"  name="email" value="<?php echo  $email; ?>" style="margin:5px"><br />
   	            	</div>			
</div>  
<div class="control-group">											
			<label class="control-label" for="firstname">Phone Number</label>
		  	<div class="controls"> 
                              <input type="text" class="span4" id="phone" placeholder="+265 xyz xyx"  name="phone" value="<?php echo $phone; ?>"  style="margin:5px"><br />
   	            	</div>			
</div>
<div class="control-group">											
			<label class="control-label" for="firstname">Password</label>
		  	<div class="controls"> 
                             <input type="password" class="span4" id="pswd"  name="password" required style="margin:5px"><br />
   	            	</div>			
</div>

<div class="control-group">											
			<label class="control-label" for="firstname">Confirm Password</label>
		  	<div class="controls"> 
                              <input type="password" class="span4" id="pswd"  name="confirm_pswd" required style="margin:5px"><br />
   	            	</div>			
</div>

<div class="form-actions">
	<div class="span2">
           	<a href="dash.php?p" class="btn" style="padding:10px; font-size:180%">Cancel</a>
	</div>
	<div class="span3">
		<button type="submit" class="button btn btn-primary btn-large" style="padding:10px; font-size:180%" name="update_clinician">Register</button>
	</div>
 </div>
    
                           
</form>