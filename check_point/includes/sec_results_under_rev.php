<?php
if(isset($_GET['lead'])){ 
    $rev_id = $_GET ['lead'];
    $form_id = $_GET ['formid'];
    
    $SQL_reviewer = "SELECT * FROM reviewer WHERE id=$rev_id";
    $reviewer = mysql_query($SQL_reviewer,$bd);
    
                $row_reviewer = mysql_fetch_array($reviewer);
                $rev_email_address = $row_reviewer['email'];
                $rev_title = $row_reviewer['title'];
                $rev_lname = $row_reviewer['lname'];
 
  /*   
 $to = 'j.dumisani7291@gmail.com';
   $subject = "3RD Line Expert: Review Consolidation";
   $message = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>New form to review</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body>

<p>Lead Expert, '.$rev_title.' '.$rev_lname.'!</p>
<p>&nbsp;</p>
<p>Please consolidate the reviews for the form application #'.$form_id.'.</p>

<p>Regards,</p>
<p><strong>Mercy</strong></p>
<p><span style="text-decoration: underline;"><strong>3<sup>rd</sup> line committee Secretary</strong></span></p>

</body>
</html>
';   
 $header = "From:dumi_ndhlovu@lighthouse.org.mw\r\n";
   $header .= "Cc:j.dumisani7291@gmail.com\r\n";
   $header .= "MIME-Version: 1.0\r\n";
   $header .= "Content-type: text/html\r\n";
   $retval = mail ($to,$subject,$message,$header);   */ 
    
echo '							
<div class="alert alert-success">
                                                  <button type="button" class="close" data-dismiss="alert">&times;</button>
                                                  <p style="color:#30af0a"><strong>Notification Send!</strong> Reviews sent for Consolidation.</p>
                           
                           </div>';
    
echo"<meta http-equiv=\"Refresh\" content=\"6; url=cp_p1.php?pending\">";   
}

?>

<form id="edit-profile" class="form-horizontal" action="#" method="post">
						 

<h2 style="background-color:#0eaff7; text-align:center; color:#000000">Genotype Result Under Review</h2>
                        <hr style=" border: 1px solid #cbe509;" />
                          
     <table class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th style="text-align:center"> <p><strong>FORM Id</strong></p></th>
                    <th style="text-align:center"> <p><strong>Date Assigned</strong></p></th>   
                    <th class="td-actions" style="text-align:center"><p><strong>Reviewer 1</strong></p> </th>
                    <th class="td-actions" style="text-align:center"><p><strong>Reviewer 2</strong></p> </th>
                    <th class="td-actions" style="text-align:center"><p><strong>Reviewer 3</strong></p> </th>
                    <th class="td-actions" style="text-align:center"><p><strong>Expert Reviews</strong></p> </th>
                   
                  </tr>
                </thead>
                <tbody>
                  <?php

/*
$assigned_app_results=mysql_query("SELECT distinct form_id,date_assigned FROM assigned_app_results WHERE form_id not in (select form_id from expert_review_consolidate2) ORDER BY `assigned_app_results`.`form_id` DESC", $bd); 
    while ($row_assigned_app_results=mysql_fetch_array($assigned_app_results)){
        
        $form_id =$row_assigned_app_results['form_id'];
        $date_assigned =$row_assigned_app_results['date_assigned'];
      
     echo '
         <tr>
          <td> <p style="text-align:center"><strong> 3rdLForm#'.$form_id.'</strong></p> </td>
                    <td> <p style="text-align:center"><strong>'.$date_assigned.'</strong></p> </td>
         ';
        
        $assigned=mysql_query("SELECT rev_id, status FROM assigned_app_results where form_id='$form_id'", $bd); 
        
        $assigned_count=mysql_query("SELECT rev_id, status FROM assigned_app_results where form_id='$form_id' and status ='Reviewed'", $bd);
        
        $complete_review = mysql_num_rows ($assigned_count); 
        
    while ($row_assigned=mysql_fetch_array($assigned)){
       $rev_id =$row_assigned['rev_id']; 
       $rev_status =$row_assigned['status']; 
        
            $select_reviewer=mysql_query("SELECT * FROM reviewer where id='$rev_id'", $bd); 
            $row_select_reviewer=mysql_fetch_array($select_reviewer);
                
                $rev_fname =$row_select_reviewer['fname']; 
                $rev_lname =$row_select_reviewer['lname']; 
                $rev_title =$row_select_reviewer['title']; 
                
                $rev_fullname = $rev_title.'.  '.$rev_fname.' '.$rev_lname;
        
        if ($rev_status=='Not Reviewed'){
         echo '
      
                    <td class="td-actions" > <p><u>'.$rev_fullname.'</u></p><a href="cp_p1.php?assign&id='.$rev_id.'" class="btn btn-small btn-warning" disabled="disabled"><i class="btn-icon-only icon-ok"> Not Reviewed </i></a></td>
                            
       
       ';
        }
        
        else {
         echo '
      
                    <td class="td-actions"> <p><u>'.$rev_fullname.'</u></p><a href="#" class="btn btn-small btn-success"><i class="btn-icon-only icon-ok"> Result Reviewed </i></a></td>
                   
                   
       
       ';
        
        }
        
      
    }
      
         if ($complete_review >='3'){
       
               echo ' 
                <td class="td-actions"><a href="cp_p1.php?consolidate_result&formid='.$form_id.'" class="btn btn-large btn-invert"><i class="btn-icon-only icon-ok"> Consolidate</i></a></td>
                  </tr> 
        
        ';
         }
        
        else {
        
         echo ' <td class="td-actions"> 2 Review days remaining   </td>';   
        }
       
    }
*/

$assigned_app_results=mysql_query("SELECT distinct form_id,date_assigned FROM assigned_app_results WHERE form_id not in (select form_id from expert_review_consolidate2) ORDER BY `assigned_app_results`.`form_id` DESC", $bd); 


    while ($row_assigned_app_results=mysql_fetch_array($assigned_app_results)){
        
        $form_id =$row_assigned_app_results['form_id'];
        $date_assigned =$row_assigned_app_results['date_assigned'];
      
     echo '
         <tr>
          <td> <p style="text-align:center"><strong> 3rdLForm#'.$form_id.'</strong></p> </td>
                    <td> <p style="text-align:center"><strong>'.$date_assigned.'</strong></p> </td>
         ';
        
        $assigned=mysql_query("SELECT rev_id, status FROM assigned_app_results where form_id='$form_id'", $bd); 
        
        $assigned_count=mysql_query("SELECT rev_id, status FROM assigned_app_results where form_id='$form_id' and status ='Reviewed'", $bd);
        
        $complete_review = mysql_num_rows ($assigned_count);
        
    $select_team_lead=mysql_query("SELECT * FROM reviewer_team_lead2 where form_id='$form_id'", $bd);
         $row_team_lead=mysql_fetch_array($select_team_lead);
        
        $team_leader_id = $row_team_lead ['rev_id'];
        
    while ($row_assigned=mysql_fetch_array($assigned)){
       $rev_id =$row_assigned['rev_id']; 
       $rev_status =$row_assigned['status']; 
        
            $select_reviewer=mysql_query("SELECT * FROM reviewer where id='$rev_id'", $bd); 
            $row_select_reviewer=mysql_fetch_array($select_reviewer);
                
                $rev_fname =$row_select_reviewer['fname']; 
                $rev_lname =$row_select_reviewer['lname']; 
                $rev_title =$row_select_reviewer['title']; 
                
                $rev_fullname = $rev_title.'.  '.$rev_fname.' '.$rev_lname;
        
        if ($rev_status=='Not Reviewed'){
         echo '
      
                    <td class="td-actions" > <p><u>'.$rev_fullname.'</u></p><a href="#" class="btn btn-small btn-warning" disabled="disabled"><i class="btn-icon-only icon-ok"> Not Reviewed </i></a></td>
                            
       
       ';
        }
        
        else {
         echo '
      
                    <td class="td-actions"> <p><u>'.$rev_fullname.'</u></p><a href="#" class="btn btn-small btn-success"><i class="btn-icon-only icon-ok"> Reviewed </i></a></td>
                   
                   
       
       ';
        
        }
        
      
    }
      
         if ($complete_review >='3'){
       
               echo ' 
                <td class="td-actions"><a href="cp_p1.php?pending&lead='.$team_leader_id.'&formid='.$form_id.'" class="btn btn-large btn-invert" style="color:#f00"><i class="btn-icon-only icon-ok"> '. $team_leader_id.'Notify Lead Expert </i></a></td>
                  </tr> 
        
        ';
              }
        
        else {
        
         echo ' <td class="td-actions"> 2 Review days remaining   </td>';   
        }
       
    }


?>

                    
         </tbody>
    </table>