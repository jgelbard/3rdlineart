
<h2 style="background-color:#fff; text-align:left; color:#000000">New Reviewer Registration</h2>
        <hr />

	
<form id="edit-profile" class="form-horizontal" action="dash.php" method="post">
    
<div class="control-group">											
				<label class="control-label" for="firstname">Title</label>
				<div class="controls">
				<select class="span4" id="title"name="title" style="margin:5px; width:150px;">
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
				 <input type="text" class="span4" id="firstname" name="username" style="margin:5px"><br />
   	            </div>			
</div>

<div class="control-group">											
				<label class="control-label" for="firstname">Firstname</label>
				<div class="controls">
				 <input type="text" class="span4" id="fname"  name="fname" style="margin:5px"><br />
   	            </div>			
</div>
        
<div class="control-group">											
				<label class="control-label" for="firstname">Lastname</label>
				<div class="controls">
				  <input type="text" class="span4" id="lname" name="lname" style="margin:5px"><br />
   	            </div>			
</div>
                          
              
<div class="control-group">											
				<label class="control-label" for="firstname">Email</label>
				<div class="controls">
				  <input type="email" class="span4" id="email"  name="email" style="margin:5px"><br />
   	            </div>			
</div>                       
              
<div class="control-group">											
				<label class="control-label" for="firstname">Tel</label>
				<div class="controls">
				  <input type="tel" class="span4" id="phone"  name="phone" style="margin:5px"><br />
   	            </div>			
</div>
                          
                    
<div class="control-group">											
				<label class="control-label" for="firstname">Password</label>
				<div class="controls">
				   <input type="password" class="span4" id="firstname"  name="password" style="margin:5px"><br />
   	            </div>			
</div>
                               
<div class="control-group">											
				<label class="control-label" for="firstname">Confirm Password</label>
				<div class="controls">
				 <input type="password" class="span4" id="firstname"  name="confirm_pswd" style="margin:5px"><br />
   	            </div>			
</div>
    
<div class="control-group">											
				<label class="control-label" for="firstname">Expert Snapshot</label>
				<div class="controls">
				        <textarea type="text" id="email" rows="8" cols="20" name="snapshot"  style="width:100%; margin:5px">
     
      </textarea> 
       </div>			
</div>
                                                                                                                               <div class="form-actions">
                                                                                                                                                   <div class="span2">
               <button class="btn" style="padding:10px; font-size:180%">Cancel</button>                                                                                                                                    </div>
                                 
                                            <div class="span2">
											<button type="submit" class="button btn btn-primary btn-large" style="padding:10px; font-size:180%" name="register_rev">Register</button>
                                            </div>
                          </div>
    
                           
</form>
 