
<form id="edit-profile" class="form-horizontal" action="app.php" method="post">
						 

<h2 style="background-color:#98a31a; text-align:center; color:#000000">6 Months Reminder</h2>
                        <hr style=" border: 1px solid #cbe509;" />
                    
     <table class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th> Id NoR </th>
                    <th> 3rd Line switch start Date</th>
                    <th> Remind</th>
                  </tr>
                </thead>
                <tbody>
                 <?php
global $num_newforms; 
$expert_review_consolidate2=mysqli_query( $bd,"SELECT * FROM expert_review_consolidate2 ORDER BY `expert_review_consolidate2`.`id` DESC "); 
$num_newforms = mysqli_num_rows ($expert_review_consolidate2);
echo '<p>All reveiwed forms: [ <i>'. $num_newforms .'</i> ]</p>';
    while ($row_expert_review_consolidate2=mysqli_fetch_array($expert_review_consolidate2)){
        
        $form_id =$row_expert_review_consolidate2['form_id'];
        $id =$row_expert_review_consolidate2['id'];
        $date_reviewed =$row_expert_review_consolidate2['consolidate2_date'];
        
        
        $date_rev=explode("/",$date_reviewed); 
        $curMonth = date("m");
        $curDay = date("j");
        $curYear = date("Y");
            
        $rew_Month = $date_rev['1'];
        $rew_day = $date_rev['0'];
        $rew_year = $date_rev['2'];
        
        $y = ($curYear - $rew_year) * 12;
        $m = ($curMonth - $rew_Month);
        $d = ($curDay - $rew_day)/30;
        
        $elapsed_months = round ($y+$m+$d,2);
        $months_remaining = 6 - $elapsed_months;
       /* echo $months_remaining;*/
              
        
        
        echo '
         <tr>
                    <td> <p style="text-align:center"><a href="#"><strong> 3rdLForm#'. $form_id.'</strong></a></p> </td>
                    <td> <p style="text-align:center"><strong>'. $date_reviewed.'</strong></p> </td>
                    <td><p><b>'.$months_remaining.'</b> months remaining.</p>
                    
                        
  <a href="#myModal" role="button" class="btn btn-warning"  data-toggle="modal" style="padding:6px; font-size:110%; position:relative; top:-5px;" >Send Reminder</a>
  
												
													<!--  Button to trigger modal 
                                                    <a href="#myModal" role="button" class="btn">Launch demo modal</a>
                                                     -->
                                                    <!-- Modal -->
                                                    <div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                      <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                        <h4 style="text-align:center">Compose Reminder</h3>
                                                      </div>
                                                      <div class="modal-body"> 
                                                      <form>
                                                      
                                                      <input type="text" name="subject" style="width:93%" />
                                                      <h4>Compose Message</h4>
                                                      <textarea style="width:93%" rows="12">
                                                      
                                                      </textarea>
                                                      </form>
                                                      
                                                      
                                                      <div style="width:90%; background-color:#f2f2f2; border-radius: 5px; padding:5px; text-align:center; margin:5px;" >
                                                       <a href="#myModal" role="button" class="btn btn-warning"   data-toggle="modal" style="width:90%;" >Patient Details</a>
                                                       </div>
                                                       
                                                      
                    </td>
                  </tr> 
        
        ';
       
    }


?>

                    
         </tbody>
    </table>