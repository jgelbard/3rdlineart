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
    <div class="span2">
											<button type="submit" class="btn btn-success" style="padding:10px; font-size:150%" name="submit_facility">New Referral</button> 
                                            
        </div><div class="span2">
<a type="submit"  href="app.php?rejec" class="btn btn-danger" style="padding:10px; font-size:150%" name="submit_facility">Rejected forms</a>

        </div>
</form>
<?php if ($tot_number!="0") {

}  ?>
<form id="edit-profile" class="form-horizontal" action="app.php" method="post">
    <div class="span4" style="position:relative; top:0px"><br />
											<a type="submit" class="btn btn-primary" style="padding:10px; font-size:180%" name="submit_facility" href="app.php?rev">Referral with Decisions</a> <strong><?php echo '['.$tot_number.'] ';?></strong>
                                            
    </div>
</form>

    <div class="span4" style="position:relative; top:0px"><br />
											<a type="submit" class="btn btn-revert" style="padding:10px; font-size:180%" href="app.php?conso2">Genotype Results</a> <strong><?php echo '['.$tot_number_conso2.'] ';?></strong>
                                            
    </div>

<<<<<<< HEAD


=======
>>>>>>> 6180365104985e36685b02d7ce57aba484daba0d
                 
 
