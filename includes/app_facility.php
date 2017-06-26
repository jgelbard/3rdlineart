<div class="span9" style="background-color:#cbed509; margin:10px; border:1; border-style:ridge">
    <link href="css/pages/faq.css" rel="stylesheet"> 
       <ol class="faq-list" style="position:relative; top:-50px">
							
							<li style="background-color:#ff0825; height:60px; width:60px; border-radius:100px; text-align:center; float:left; margin:20px; mousehover-color:#fff">
                                
								<h4 style="padding:23px 30px; position:absolute; top:-30px; left:-2px">Rejec</h4>
								<h4 style="padding:23px 30px;">33</h4>
									
							</li><li style="background-color:#df0; height:60px; width:60px; border-radius:100px; text-align:center; float:left; margin:20px;">
           <h4 style="padding:23px 30px; position:absolute; top:-30px">GN</h4>
								<h4 style="padding:23px 30px;">33</h4>
									
							</li><li style="background-color:#90ff94; height:60px; width:60px; border-radius:100px; text-align:center; float:left; margin:20px;">
           <h4 style="padding:23px 30px; position:absolute; top:-30px">Lab</h4>
								<h4 style="padding:23px 30px;">33</h4>
									
							</li><li style="background-color:#2ffa36; height:60px; width:60px; border-radius:100px; text-align:center; float:left; margin:20px;">
           <h4 style="padding:23px 10px; position:absolute; top:-30px;">Resul</h4>
								<h4 style="padding:23px 30px;">33</h4>
									
							</li><li style="background-color:#08950e; height:60px; width:60px; border-radius:100px; text-align:center; float:left; margin:20px;">
			<h4 style="padding:23px 10px; position:absolute; top:-30px;">Complete</h4>					
           <h4 style="padding:23px 30px;">33</h4>
									
							</li><li style="background-color:#f5b013; height:60px; width:60px; border-radius:100px; text-align:center; float:left; margin:20px;">
           <h4 style="padding:23px 10px; position:absolute; top:-30px;">After 6 months</h4>
								<h4 style="padding:23px 30px;">33</h4>
									
							</li>
           
       </ol>
</div>
   <div class="span6" style="background-color:#cbe509; padding:10px; position:relative; top:0px">
       
       
        <table style="width:100%" border="0">
                          
            <tr style="background-color:#f8f7f; text-align:center; color:#000">
                          <td>
                             <h4>ART Clinic</h4>
                              <h4><u><?php echo $facility ?></u></h4> 
                          </td>
                    <td>
                             <h3><?php echo $fullname ?></h4>
                          </td>
                
            </tr></table>
               
       <hr style=" border: 1px solid #cbe509;" />
       <table style="width:100%" border="0" style="background-color:#0eaff7; ">
                          
            <tr style="background-color:#fcfgcfc; text-align:center; color:#000">
                          <td>
                              <h4>Tel. Number</h4>
                               <h4>Email Address</h4>
                          </td>
                    <td>
                             <h4><?php echo $clin_phone ?></h4>
                             <h4><?php echo $clin_email ?></h4>
                          </td>
                
            </tr></table>
      
       
    </div>

<form id="edit-profile" class="form-horizontal" action="app.php" method="post">
    <div class="span3">
											<button type="submit" class="btn btn-success" style="padding:10px; font-size:180%" name="submit_facility">New Referal</button> 
                                            
    </div>
</form>
<?php if ($tot_number!="0") {

}  ?>
<form id="edit-profile" class="form-horizontal" action="app.php" method="post">
    <div class="span4" style="position:relative; top:0px"><br />
											<a type="submit" class="btn btn-primary" style="padding:10px; font-size:180%" name="submit_facility" href="app.php?rev">Referal with Decisions</a> <strong><?php echo '['.$tot_number.'] ';?></strong>
                                            
    </div>
</form>

    <div class="span4" style="position:relative; top:0px"><br />
											<a type="submit" class="btn btn-revert" style="padding:10px; font-size:180%" href="app.php?conso2">Genotype Results</a> <strong><?php echo '['.$tot_number_conso2.'] ';?></strong>
                                            
    </div>


                 
 