<?php
global $id;
$id = $_GET['id'];

$pih_lab=mysqli_query($bd, "SELECT * FROM pih_lab  where id='$id'"); 
$row_pih_lab=mysqli_fetch_array($pih_lab);

$fname =$row_pih_lab['fname'];
$lname =$row_pih_lab['lname'];
$email =$row_pih_lab['email'];
$phone =$row_pih_lab['phone'];
$id =$row_pih_lab['id'];
$user_id =$row_pih_lab['user_id'];

$users=mysqli_query($bd, "SELECT * FROM users where id='$user_id'"); 
$row_users=mysqli_fetch_array($users);
$username =$row_users['username'];
$username = decrypt ($username, $key);
?>


<h2 style="background-color:#fff; text-align:left; color:#000000">Edit Lab User Registration</h2>
<hr>

<form id="edit-profile" class="form-horizontal" action="<?php echo $main_page; ?>?update_user<?php echo $source; ?>"  method="post">
	<div class="control-group">											
		<label class="control-label" for="firstname">Username</label>
		<div class="controls">
			<input type="hidden" class="span3" id="id" name="id" value="<?php echo $id; ?>" style="margin:5px" >
			<input type="hidden" class="span3" id="user_id" name="user_id" value="<?php echo $user_id; ?>" style="margin:5px" >
			<input type="text" class="span4" id="username"  name="username" value="<?php echo $username; ?>" style="margin:5px"><br />
		</div>			
	</div>
	<div class="control-group">											
		<label class="control-label" for="firstname">first Name</label>
		<div class="controls">
			<input type="text" class="span4" id="fname"   name="fname" value="<?php echo $fname; ?>" style="margin:5px"><br />
		</div>			
	</div>
	<div class="control-group">											
		<label class="control-label" for="firstname">Last name</label>
		<div class="controls">
			<input type="text" class="span4" id="lname"   name="lname" value="<?php echo $lname; ?>" style="margin:5px"><br />
		</div>			
	</div>
	<div class="control-group">											
		<label class="control-label" for="firstname">Email</label>
		<div class="controls">
			<input type="text" class="span4" id="email"  name="email" value="<?php echo $email; ?>" style="margin:5px"><br />
		</div>			
	</div>
	<div class="control-group">											
		<label class="control-label" for="firstname">Phone</label>
		<div class="controls">
			<input type="tel" class="span4" id="phone"   name="phone" value="<?php echo $phone; ?>" style="margin:5px"><br />
		</div>			
	</div>                   
	<div class="control-group">											
		<label class="control-label" for="firstname">Password</label>
		<div class="controls">
			<input type="password" class="span4" id="firstname"   name="password" style="margin:5px"><br />
		</div>			
	</div>
	<div class="control-group">											
		<label class="control-label" for="firstname">Confirm Password</label>
		<div class="controls">
			<input type="password" class="span4" id="firstname"  name="confirm_pswd" style="margin:5px"><br />
		</div>			
	</div>
	
	<div class="form-actions">
		<div class="span2">
			<a href="dash.php?p" class="btn" style="padding:10px; font-size:180%">Cancel</a>
		</div>
		
		<div class="span3">
			<button type="submit" class="button btn btn-primary btn-large" style="padding:10px; font-size:180%" name="update_lab_user">Register</button>
		</div>
	</div>                   
</form>
