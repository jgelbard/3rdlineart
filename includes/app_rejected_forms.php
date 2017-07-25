
<h2 style="background-color:#fd1f0d; text-align:center; color:#000000">Rejected-Incomplete Forms</h2>
                        <hr style=" border: 1px solid #cbe509;" />
                    
     <table class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th> 3rdlineForm# </th>
                    <th> Patient Name </th>
                    <th> ART_Number</th>
                    <th> Gender</th>
                    <th> Date Created</th>
                    <th> View Comment</th>
                  </tr>
                </thead>
                <tbody>
   <?php
global $num_newforms; 
$form_creation=mysqli_query( $bd,"SELECT * FROM form_creation inner join form_rejected on (form_creation.3rdlineart_form_id =form_rejected.form_id) where status='Complete' and complete ='Rejected' and clinician_id=$clinicianID ORDER BY `form_creation`.`3rdlineart_form_id` DESC "); 
$num_newforms = mysqli_num_rows ($form_creation);
echo '<p>Total forms: [ <i>'. $num_newforms .'</i> ]</p>';
    while ($row_form_creation=mysqli_fetch_array($form_creation)){
        
        $form_id =$row_form_creation['3rdlineart_form_id'];
        $clinician_id =$row_form_creation['clinician_id'];
        $patient_id =$row_form_creation['patient_id'];
        $status =$row_form_creation['status'];
        $form_complete =$row_form_creation['complete'];
        $date_created =$row_form_creation['date_created'];
        $comment =$row_form_creation['comment'];
        
        $patient=mysqli_query( $bd,"SELECT * FROM patient where id='$patient_id' "); 
        $row_pat=mysqli_fetch_array($patient);
        
            $art_id_num =$row_pat['art_id_num'];
            $pat_id = $row_pat['id'];
            $patient_fullname= $row_pat['firstname'].' '.$row_pat['lastname'];
            $gender =$row_pat['gender'];
            $dob =$row_pat['dob'];
            $vl_sample_id =$row_pat['vl_sample_id'];

        
        echo '
                    
           <tr>
                    <td>'.$form_id.'</td>
                    <td>'.$patient_fullname.'</td>
                    <td>'.$art_id_num.'</td>
                    <td>'.$gender.'</td>
                    <td>'.$date_created.'</td>
                    <td>
    <form id="search_art" action="app.php" method="post">
    <input type="hidden" name="form_id" value="'.$form_id.'" />
    <input type="hidden" name="id" value="'.$pat_id.'" />
    <input type="hidden" name="comment" value="'.comment.'" />
                                                    
<button type="submit" name="search" class="btn btn-success" style="width:90%;" >Edit form</button>
 </form>                                                      
                      
                                            
                    </td>
                  </tr> 
                  
                  ';
    }

?>
                 
         </tbody>
    </table>