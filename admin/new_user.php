<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>Application Form</title>
	
	<?php
	include ('../includes/head.php');
	if (file_exists('../includes/crypt_function.php'))
		require_once '../includes/crypt_function.php';
	else
		require 'includes/crypt_function.php';
	?>
	
	<style>
		input[type="text"] {
			height: 35px; 
		}

	</style>
</head>
<body>
	<?php
	include ('../includes/nav_main.php');
	?>
	
	<div class="main">
		
		<div class="main-inner">

			<div class="container">
				
				<div class="row">
					
					<div class="span12">
						
						<div class="widget">
							<div class="widget-content">
								
								<div class="pricing-plans plans-3">
									<p><br /></p>
									<?php
									
									if(isset($_GET['u'])) { 
										$username =$_GET['u'];
									}
									if(isset($_GET['r'])) { 
										$role = $_GET['r'];                          
									}
									if(isset($_GET['source_page'])){ 
										$main_page ="new_user.php";   
										$source ="&source_page";                               
									}
									else {
										$main_page ="dash.php";
										$source ="";
									} 
									
									if (($role=='Reviewer') or isset($_GET['rev_edit']) ){
										include ('includes/reviewer_edit.php');     
									}    
									if (($role=='Secretary') or isset($_GET['sec_edit']) ){
										include ('includes/sec_edit.php');      
									}    
									if (($role=='Clinician') or isset($_GET['clin_edit']) ){
										include ('includes/clinician_edit.php');    
									}
									if (($role=='Lab') or isset($_GET['lab_edit']) ){
										include ('includes/labuser_edit.php');     
									}
									
									
									include ('includes/update_user.php');  
									
									?>
									
									
								</div>
							</div> 
							
						</div>>
						
					</div>				
					
				</div>    	
				
				
			</div>
			
		</div>
		
	</div>
	
	<!--/div> <!-- /main -->
	
<!-- Le javascript
	================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	<script src="../js/jquery-1.7.2.min.js"></script>
	<script src="../js/bootstrap.js"></script>
	<script src="../js/base.js"></script>

</body>

</html>
