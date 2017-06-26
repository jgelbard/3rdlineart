<?php 
 session_start();
 global $now,$expire,$user_id,$fullname;
 if (isset($_SESSION['identification'])){

	/* global  $fullname;*/
       $fname= $_SESSION['fname'];
       $lname= $_SESSION['lname'];
       $fullname =$fname . " " .$lname;
    
       /*$fname= $_SESSION['fname'];*/
      $rev_id= $_SESSION['id'];
       $user_id=$_SESSION['identification'];
     
	   $now = time(); 
	   $expire= $_SESSION['expire'];}
	   
	   ?>
<!DOCTYPE html>
<html lang="en">
  
<head>
    <meta charset="utf-8">
    <title>Application Form</title>
    
   <?php 
    
include ('../includes/head.php');
    
    ?>
    
    <style>
    input[type="text"] {
    height: 35px; 
    }
   /* input[type="submit"] {
    width: 200px;
        
    }
    */
    </style>
</head>
<body>
<?php
    include ('includes/nav_main.php');
    include ('includes/nav_sub.php');
    
    ?>
    
<div class="main">
	
	<div class="main-inner">

	    <div class="container">
	 
	      <div class="row">
              
	      	<div class="span12">
	      		
	      		<div class="widget">
						
					<!--<div class="widget-header">
						<i class="icon-th-large"></i>
						<h3 style="text-align:right">3rd Line ART Application Form</h3>
                        
					</div>  /widget-header -->
					
					<div class="widget-content">
						
						<div class="pricing-plans plans-3">
                      <?php

include ('includes/insert_reviewer.php'); 

if(isset($_GET['p'])){ 

 echo '<div class="span11">
          <div class="widget">
            <div class="widget-header"> 
             
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
              <div class="shor-tcuts"> 
                  <a href="dash.php?rev" class="shortcut"><i class="shortcut-icon icon-list-alt"></i><span
                                        class="shortcut-label">Manage Reviewers</span> </a><br />
                  <a href="dash.php?lab" class="shortcut"><i
                                            class="shortcut-icon icon-bookmark"></i><span class="shortcut-label">Manage Lab user</span> </a><br />
                  <a href="dash.php?sec" class="shortcut"> <i class="shortcut-icon icon-comment"></i><span class="shortcut-label">Manage Sec</span> </a><br />
                  <a href="dash.php?clin" class="shortcut"><i class="shortcut-icon icon-signal"></i> <span class="shortcut-label">Manage Clinician</span> </a><br />
                  <a href="javascript:;" class="shortcut"><i class="shortcut-icon icon-user"></i><span
                                                class="shortcut-label">All Users</span> </a><br />
                  <a href="../reports.php" target="_blank" class="shortcut"> <i class="shortcut-icon icon-signal"></i> <span class="shortcut-label">Reports</span> </a> </div>
              <!-- /shortcuts --> 
            </div>
            <!-- /widget-content --> 
          </div>
                            </div>
					  ';   
    
}


if(isset($_GET['clin'])){ 
 include ('includes/clinician.php');   
}
if(isset($_GET['sec'])){ 
 include ('includes/sec.php');   
}

if(isset($_GET['lab'])){ 
 include ('includes/lab_staff.php');   
}
if(isset($_GET['rev'])){ 
 include ('includes/reviewer.php');   
}

if(isset($_GET['create_clin'])){ 
 include ('includes/create_clin.php');   
}

if(isset($_GET['create_sec'])){ 
 include ('includes/create_sec.php');   
}

if(isset($_GET['reviewer'])){ 
 include ('includes/reviewer_new.php');   
}

if(isset($_GET['edit_reviewer'])){ 
 include ('includes/reviewer_edit.php');   
}




?>
                            
	
				
					</div> <!-- /pricing-plans -->
						
					</div> <!-- /widget-content -->
						
				</div> <!-- /widget -->					
				
		    </div> <!-- /span12 -->     	
	      	
	      	
	      </div> <!-- /row -->
	
	    </div> <!-- /container -->
	    
	</div>
    
</div> <!-- /main -->
    
 <?php /*include ('includes/footer.php');*/ ?>   

<!-- Le javascript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="js/jquery-1.7.2.min.js"></script>

<script src="js/bootstrap.js"></script>
<script src="js/base.js"></script>

  </body>

</html>
