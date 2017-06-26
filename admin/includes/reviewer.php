<form id="edit-profile" class="form-horizontal" action="app.php" method="post">
						 
<a href="dash.php?reviewer" class="btn btn-small btn-success" style="padding:5px; font-size:120%; float:right"> Create New </a>
<h2 style="background-color:#fff; text-align:center; color:#000000">Registered Reviewers</h2>
                        <hr style=" border: 1px solid #cbe509;" />
                          
     <table class="table table-striped table-bordered">
                <thead>
                  <tr>
                      <th> <p style="text-align:center"><strong>User Id </strong></p></th>
                      <th> <p style="text-align:center"><strong>Username </strong></p></th>
                      <th> <p style="text-align:center"><strong>Fullname</strong></p></th>
                    <th class="td-actions"> </th>
                  </tr>
                </thead>
                <tbody>
                 <?php

$reviewer=mysql_query("SELECT * FROM reviewer", $bd); 
    while ($row_reviewer=mysql_fetch_array($reviewer)){
        
        $title =$row_reviewer['title'];
        $fname =$row_reviewer['fname'];
        $lname =$row_reviewer['lname'];
        $rev_id =$row_reviewer['id'];
        $user_id =$row_reviewer['user_id'];
        
        $users=mysql_query("SELECT * FROM users where id='$user_id'", $bd); 
        $row_users=mysql_fetch_array($users);
        $username =$row_users['username'];
        
        $fullname = $fname .'  '. $lname;
        
        echo '
         <tr>
                    <td> <p style="text-align:center"><strong> 3rdLReviewer#0'.$rev_id.'</strong></p> </td>
                    <td> <p style="text-align:center"><strong>'.$username.' </strong></p></td>
                    <td> <p style="text-align:center"><strong>'.$fullname.'</strong></p> </td>
                    <td class="td-actions"><a href="dash.php?rev_edit&id='.$rev_id.'"> Edit </i></a></td>
                  </tr> 
        
        ';
       
    }


?>

                    
         </tbody>
    </table>