

	
       	<h1 style="text-align:center">Create Clinician</h1>	
        <hr />

	
<form id="edit-profile" class="form-horizontal" action="dash.php" method="post">

                          
                               <select name="art_clinic" required id="art_clinic" style="margin:5px">
                              <option selected="selected" value="">select ART Clinic</option>
                              <?php
//facility

$facility=mysqli_query( $bd,"SELECT * FROM facility"); 
    while ($row_facility=mysqli_fetch_array($facility)){
        
        $facility_name =$row_facility['facilityName'];
        
        echo '<option>'.$facility_name.'</option>';
       
    }
?>
                              </select><br />
                              <input type="text" class="span4" id="firstname" placeholder="username" name="username" style="margin:5px"><br />
                            
                              
                              <input type="text" class="span4" id="fullname" placeholder="Full Name"  name="name" style="margin:5px"><br />
                              
                              <input type="text" class="span4" id="email" placeholder="Email"  name="email" style="margin:5px"><br />
                              <input type="text" class="span4" id="phone" placeholder="Phone Number"  name="phone" style="margin:5px"><br />
                              <input type="password" class="span4" id="pswd" placeholder="Password"  name="password" style="margin:5px"><br />
                              <input type="password" class="span4" id="pswd" placeholder="Confirm Password"  name="confirm_pswd" style="margin:5px"><br />

                                                                                                                                       <div class="form-actions">
                                                                                                                                                   <div class="span2">
               <button class="btn" style="padding:10px; font-size:180%">Cancel</button>                                                                                                                                    </div>
                                 
                                            <div class="span3">
											<button type="submit" class="button btn btn-primary btn-large" style="padding:10px; font-size:180%" name="register_clinician">Register</button>
                                            </div>
                          </div>
    
                           
</form>
