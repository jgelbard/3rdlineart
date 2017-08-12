<?php
global $id;
$id = $_GET['id'];

$reviewer=mysqli_query( $bd,"SELECT * FROM reviewer where id='$id' "); 
$row_reviewer=mysqli_fetch_array($reviewer);

$user_id =$row_reviewer['user_id'];
$title =$row_reviewer['title'];
$fname =$row_reviewer['fname'];
$lname =$row_reviewer['lname'];
$email =$row_reviewer['email'];
$phone =$row_reviewer['phone'];
$affiliate_institution =$row_reviewer['affiliate_institution'];
$snapshot =$row_reviewer['snapshot'];

$users=mysqli_query($bd, "SELECT * FROM users where id='$user_id'"); 
$row_users=mysqli_fetch_array($users);
$username =$row_users['username'];
$username = decrypt ($username, $key);

?>

<h2 style="background-color:#fff; text-align:left; color:#000000">Edit Reviewer Details</h2>
<hr />

<form id="edit-profile" class="form-horizontal" action="dash.php?update_user" method="post">


	<div class="control-group">											
		<label class="control-label" for="firstname">Title</label>
		<div class="controls">
			<select class="span4" id="title"name="title" style="margin:5px; width:150px;">
				<option><?php echo $title; ?></option>
				<option>Choose Title</option>
				<option>Prof</option>
				<option>Dr</option>
				<option>Mr</option>
				<option>Ms</option>
				<option>Mrs</option>
			</select><br />
		</div>			
	</div>    

	<div class="control-group">											
		<label class="control-label" for="firstname">Affliated Institution</label>
		<div class="controls">
			<select name="affiliate_institution" required id="affiliate_institution" style="margin:5px">
				<option selected="selected" value="">select Affliated Institution</option>
				<?php
					//facility
				echo '<option selected="selected">'.$affiliate_institution.'</option>';
				$partner_org=mysqli_query( $bd,"SELECT * FROM partner_org"); 
				while ($row_partner_org=mysqli_fetch_array($partner_org)){
					$partner_org_name =$row_partner_org['partner_org_name'];
					echo '<option>'.$partner_org_name.'</option>';
				}
				?>
			</select><br />
		</div>			
	</div>

	<div class="control-group">											
		<label class="control-label" for="firstname">Username</label>
		<div class="controls">
			<input type="hidden" class="span3" id="id" name="id" value="<?php echo $id; ?>" style="margin:5px" >
			<input type="hidden" class="span3" id="id" name="user_id" value="<?php echo $user_id; ?>" style="margin:5px" >
			<input type="text" class="span4" id="firstname" name="username" value="<?php echo $username; ?>" style="margin:5px"><br />
		</div>			
	</div>

	<div class="control-group">											
		<label class="control-label" for="firstname">Firstname</label>
		<div class="controls">
			<input type="text" class="span4" id="fname"  name="fname" value="<?php echo $fname; ?>" style="margin:5px"><br />
		</div>			
	</div>

	<div class="control-group">											
		<label class="control-label" for="firstname">Lastname</label>
		<div class="controls">
			<input type="text" class="span4" id="lname" name="lname" value="<?php echo $lname; ?>"  style="margin:5px"><br />
		</div>			
	</div>                              

	<div class="control-group">											
		<label class="control-label" for="firstname">Email</label>
		<div class="controls">
			<input type="email" class="span4" id="email"  name="email" value="<?php echo $email; ?>" style="margin:5px"><br />
		</div>			
	</div> 


	<div class="control-group">											
		<label class="control-label" for="firstname">Tel</label>
		<div class="controls">
			<input type="tel" class="span4" id="phone"  name="phone" value="<?php echo $phone; ?>"  style="margin:5px"><br />
		</div>			
	</div>           


	<div class="control-group">											
		<label class="control-label" for="firstname">Password</label>
		<div class="controls">
			<input type="password" class="span4" id="firstname"  name="password"  style="margin:5px"><br />
		</div>			
	</div>

	<div class="control-group">											
		<label class="control-label" for="firstname">Confirm Password</label>
		<div class="controls">
			<input type="password" class="span4" id="firstname"  name="confirm_pswd" style="margin:5px" ><br />
		</div>			
	</div>


	<div class="control-group">											
		<label class="control-label" for="firstname">Expert Snapshot</label>
		<div class="controls">
			<textarea type="text" id="snapshot" rows="8" cols="20" name="snapshot" style="width:100%; margin:5px">
				<?php echo $snapshot; ?>
			</textarea> 
		</div>			
	</div>


	<div class="form-actions">
		<div class="span4">
			<a href="dash.php?p" class="btn" style="padding:10px; font-size:180%">Cancel</a>
		</div>

		<div class="span4">
			<button type="submit" class="button btn btn-primary btn-large" style="padding:10px; font-size:180%" name="update_rev">Register</button>
		</div>
	</div>

</form>
