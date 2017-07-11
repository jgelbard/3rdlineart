

       	<h1 style="text-align:center; background-color:#e8e8e8">New Reviewer Registration</h1>	
        <hr />

	
<form id="edit-profile" class="form-horizontal" action="dash.php" method="post">

    <select class="span4" id="title"name="title" style="margin:5px; width:150px;">
                              <option>Choose Title</option>
                              <option>Prof</option>
                              <option>Dr</option>
                              <option>Mr</option>
                              <option>Ms</option>
                              <option>Mrs</option>
                              </select><br />
    
   <span></span>												
                              
      <select name="affiliate_institution" required id="affiliate_institution" style="margin:5px">
                              <option selected="selected" value="">select Affliated Institution</option>
                              <?php
//facility

$partner_org=mysqli_query( $bd,"SELECT * FROM partner_org"); 
    while ($row_partner_org=mysqli_fetch_array($partner_org)){
        
        $partner_org_name =$row_partner_org['partner_org_name'];
        
        echo '<option>'.$partner_org_name.'</option>';
       
    }
?>
                              </select><br />
                              <input type="text" class="span4" id="firstname" placeholder="username" name="username" style="margin:5px"><br />
                            
                              
                              <input type="text" class="span4" id="fname" placeholder="First Name"  name="fname" style="margin:5px"><br />
                              <input type="text" class="span4" id="lname" placeholder="Last Name"  name="lname" style="margin:5px"><br />
                              <input type="email" class="span4" id="email" placeholder="Email"  name="email" style="margin:5px"><br />
                              <input type="text" class="span4" id="phone" placeholder="Phone Number"  name="phone" style="margin:5px"><br />
                              <input type="password" class="span4" id="firstname" placeholder="Password"  name="password" style="margin:5px"><br />
                              <input type="password" class="span4" id="firstname" placeholder="Confirm Password"  name="confirm_pswd" style="margin:5px"><br />
    
    
                              <h4>Expert Snapshot</h4>
                                <textarea type="text" id="email" rows="18" cols="20" name="snapshot"  style="width:100%; margin:5px">
     
      </textarea> 
    
                                                                                                                                       <div class="form-actions">
                                                                                                                                                   <div class="span2">
               <button class="btn" style="padding:10px; font-size:180%">Cancel</button>                                                                                                                                    </div>
                                 
                                            <div class="span2">
											<button type="submit" class="button btn btn-primary btn-large" style="padding:10px; font-size:180%" name="register_rev">Register</button>
                                            </div>
                          </div>
    
                           
</form>
 