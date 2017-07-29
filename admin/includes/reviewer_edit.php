<?php
global $id;
$id = $_GET['id'];

 $reviewer=mysqli_query( $bd,"SELECT * FROM reviewer where id='$id' "); 
    $row_reviewer=mysqli_fetch_array($reviewer);
        
        $user_id =$row_reviewer['user_id'];

    $user = mysqli_query( $bd,"SELECT * FROM users where id='$user_id' "); 
    $row_user=mysqli_fetch_array($user);

        $username =$row_user['username'];
        $password =$row_user['password'];

        $title =$row_reviewer['title'];
        $fname =$row_reviewer['fname'];
        $lname =$row_reviewer['lname'];
        $email =$row_reviewer['email'];
        $phone =$row_reviewer['phone'];
        $affiliate_institution =$row_reviewer['affiliate_institution'];
        $snapshot =$row_reviewer['snapshot'];
       
?>


       <h2 style="background-color:#fff; text-align:center; color:#000000">Edit Reviewer Details</h2>	
        <hr />
        
	
<form id="edit-profile" class="form-horizontal" action="dash.php" method="post">

                               <select class="span4" id="title"name="title" style="margin:5px">
                              <option><?php echo $title; ?></option>
                              <option>Prof</option>
                              <option>Dr</option>
                              <option>Mr</option>
                              <option>Ms</option>
                              <option>Mrs</option>
                              </select>
                            <br />  
    <span></span>	
    
    <select name="affiliate_institution" required id="affiliate_institution" style="margin:5px">
                            <option  value="">select Affliated Institution</option>
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
    
                              <!--<input type="text" class="span3" id="firstname" placeholder="Affliated Institution" name="affiliate_institution" style="margin:5px" value="<?php //echo  $affiliate_institution; ?>"><br />
    -->
                              <input type="text" class="span4" id="firstname" placeholder="username" name="username" value="<?php echo $username; ?>" style="margin:5px"><br />
                            
                              
                              <input type="text" class="span4" id="fname" placeholder="First Name"  name="fname" value="<?php echo $fname; ?>" style="margin:5px"><br />
                              <input type="text" class="span4" id="lname" placeholder="Last Name"  name="lname" value="<?php echo $lname; ?>" style="margin:5px"><br />
                              <input type="text" class="span4" id="email" placeholder="Email"  name="email" value="<?php echo $email; ?>" style="margin:5px"><br />
                              <input type="text" class="span4" id="phone" placeholder="Phone Number"  name="phone" value="<?php echo $phone; ?>" style="margin:5px"><br />
                              <input type="password" class="span4" id="firstname" placeholder="Password"  name="password" value="<?php echo  $password; ?>" style="margin:5px"><br />
                              <input type="password" class="span4" id="firstname" placeholder="Confirm Password"  name="confirm_pswd" style="margin:5px" value="<?php echo  $password; ?>" ><br />
                        
                         
                              <h4>Expert Snapshot</h4>
                                <textarea type="text" id="email" rows="8" cols="12" name="snapshot"  style="width:100%; margin:5px">
     
      </textarea>

                                                                                                                                       <div class="form-actions">
                                                                                                                                                   <div class="span4">
               <button class="btn" style="padding:10px; font-size:180%">Cancel</button>                                                                                                                                    </div>
                                 
                                            <div class="span4">
											<button type="submit" class="button btn btn-primary btn-large" style="padding:10px; font-size:180%" name="update_rev">Register</button>
                                            </div>
                          </div>
    
                           
</form>
