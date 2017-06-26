						 

<h2 style="background-color:#c77539; text-align:center; color:#fff">Forms to Review</h2>
                        <hr style=" border: 1px solid #cbe509;" />
<?php    
global $num_forms; 
$form_creation=mysql_query("SELECT * FROM assigned_forms where  rev_id='$rev_id' and status ='Not Reviewed'", $bd); 
$num_forms = mysql_num_rows ($form_creation);
echo '<p>Total forms: [ <i>'. $num_forms .'</i> ]</p>';
?>
     <table class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th style="text-align:center"> <p><strong>FORM Id</strong></p></th>
                    <th style="text-align:center"> <p><strong>Date Assigned</strong></p></th> 
                    <th class="td-actions"> </th>
                  </tr>
                </thead>
                <tbody>
                 <?php

    while ($row_form_creation=mysql_fetch_array($form_creation)){
        
        $form_id =$row_form_creation['form_id'];
        $sec_id =$row_form_creation['sec_id'];
        $status =$row_form_creation['status'];
        $date_assigned =$row_form_creation['date_assigned'];
        
       /* $SQL_clinician = "SELECT * FROM clinician WHERE id=$clinician_id";
                    $clinician = mysql_query($SQL_clinician,$bd);
                    
                    $row_clinician = mysql_fetch_array($clinician);
                        $art_clinic = $row_clinician['art_clinic'];*/
                       
        
        echo '
         <tr>
                    <td> <p style="text-align:center"><strong> 3rdLForm#'.$form_id.'</strong></p> </td>
                    <td> <p style="text-align:center"><strong>'.$date_assigned.'</strong></p> </td>
                    <td class="td-actions"><a href="review_p1.php?review&id='.$form_id.'" class="btn btn-small btn-warning"><i class="btn-icon-only icon-ok"> Review Form </i></a></td>
                  </tr> 
        
        ';
       
    }


?>

                    
         </tbody>
    </table>