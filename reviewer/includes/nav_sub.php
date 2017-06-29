<div class="subnavbar">
  <div class="subnavbar-inner">
    <div class="container">
      <ul class="mainnav">
           <li><a href="review_p1.php?p"><img src="img/app_log.png" width="100px"></a></li> 
          <?php
global $num_forms,$num_forms_lead,$num_forms_my_rev, $num_forms_aap_results; 

$form_creation=mysqli_query( $bd,"SELECT * FROM assigned_forms where  rev_id='$rev_id' and status ='Not Reviewed'"); 
$num_forms_new = mysqli_num_rows ($form_creation);

$assigned_forms_lead=mysqli_query( $bd,"SELECT distinct form_id,date_assigned FROM assigned_forms WHERE form_id in (select form_id from reviewer_team_lead where reviewer_team_lead.rev_id=$rev_id) and form_id not in (select form_id from expert_review_consolidate1) ORDER BY `assigned_forms`.`form_id` DESC"); 

$num_forms_lead = mysqli_num_rows ($assigned_forms_lead);

$form_my_reviews=mysqli_query( $bd,"SELECT * FROM assigned_forms where  rev_id='$rev_id' and status ='Reviewed'"); 
$num_forms_my_rev = mysqli_num_rows ($form_my_reviews);

 global $lead_num_forms;

$lead_assigned_forms=mysqli_query( $bd,"SELECT distinct form_id,date_assigned FROM assigned_app_results WHERE form_id in (select form_id from reviewer_team_lead2 where reviewer_team_lead2.rev_id=$rev_id) and form_id not in (select form_id from expert_review_consolidate2) ORDER BY `assigned_app_results`.`form_id` DESC"); 


$lead_num_forms = mysqli_num_rows ($lead_assigned_forms);

$form_assigned_app_results=mysqli_query( $bd,"SELECT * FROM assigned_app_results where  rev_id='$rev_id' and status ='Not Reviewed'"); 
$num_forms_aap_results = mysqli_num_rows ($form_assigned_app_results);

          if(isset($_GET['p'])){ 
  
              echo ' <li class="active">
            <a href="review_p1.php?p"><i>('.$num_forms_new.')</i><span>New Reviews</span> </a> 
          </li>
           <li class="">
            <a href="review_p1.php?lead_reviewer"><i>('.$num_forms_lead.')</i><span>Lead App Reviewer</span> </a> 
          </li>
        <li class=""><a href="review_p1.php?rev"><i>('.$num_forms_my_rev.')</i><span>My Reviewed Forms</span> </a> </li>
       
        <li class=""><a href="review_p1.php?lead_result"><i>('.$lead_num_forms.')</i><span>Lead Results Reviewer</span> </a> </li>
        <li class=""><a href="review_p1.php?result"><i>('.$num_forms_aap_results.')</i><span>Review Results</span> </a> </li>
      
        
        ';
}

if(isset($_GET['lead_reviewer'])){ 
  
            
    echo ' <li class="">
            <a href="review_p1.php?p"><i>('.$num_forms_new.')</i><span>New Reviews</span> </a> 
          </li>
          <li class="active">
            <a href="review_p1.php?lead_reviewer"><i>('.$num_forms_lead.')</i><span>Lead App Reviewer</span> </a> 
          </li>
        <li class=""><a href="review_p1.php?rev"><i>('.$num_forms_my_rev.')</i><span>My Reviewed Forms</span> </a> </li>
       
        <li class=""><a href="review_p1.php?lead_result"><i>('.$lead_num_forms.')</i><span>Lead Results Reviewer</span> </a> </li>
        <li class=""><a href="review_p1.php?result"><i>('.$num_forms_aap_results.')</i><span>Review Results</span> </a> </li>
       
        ';
}
if(isset($_GET['pending'])){ 
  
            
    echo ' <li class="">
            <a href="review_p1.php?p"><i>('.$num_forms_new.')</i><span>New Reviews</span> </a> 
          </li>
           <li class="">
            <a href="review_p1.php?lead_reviewer"><i>('.$num_forms_lead.')</i><span>Lead App Reviewer</span> </a> 
          </li>
        <li class=""><a href="review_p1.php?rev"><i>('.$num_forms_my_rev.')</i><span>My Reviewed Forms</span> </a> </li>
       
        <li class=""><a href="review_p1.php?lead_result"><i>('.$lead_num_forms.')</i><span>Lead Results Reviewer</span> </a> </li>
        <li class=""><a href="review_p1.php?result"><i>('.$num_forms_aap_results.')</i><span>Review Results</span> </a> </li>
       
        ';
}

if(isset($_GET['result'])){ 
  
              echo ' <li class="">
            <a href="review_p1.php?p"><i>('.$num_forms_new.')</i><span>New Reviews</span> </a> 
          </li> 
           <li class="">
            <a href="review_p1.php?lead_reviewer"><i>('.$num_forms_lead.')</i><span>Lead App Reviewer</span> </a> 
          </li>
        <li class=""><a href="review_p1.php?rev"><i>('.$num_forms_my_rev.')</i><span>My Reviewed Forms</span> </a> </li>
    
        <li class=""><a href="review_p1.php?lead_result"><i>('.$lead_num_forms.')</i><span>Lead Results Reviewer</span> </a> </li> 
        <li class="active"><a href="review_p1.php?result"><i>('.$num_forms_aap_results.')</i><span>Review Results</span> </a> </li>
       
        ';
}
if(isset($_GET['lead_result'])){ 
  
              echo ' <li class="">
            <a href="review_p1.php?p"><i>('.$num_forms_new.')</i><span>New Reviews</span> </a> 
          </li> 
           <li class="">
            <a href="review_p1.php?lead_reviewer"><i>('.$num_forms_lead.')</i><span>Lead App Reviewer</span> </a> 
          </li>
        <li class=""><a href="review_p1.php?rev"><i>('.$num_forms_my_rev.')</i><span>My Reviewed Forms</span> </a> </li>
    
        <li class="active"><a href="review_p1.php?lead_result"><i>('.$lead_num_forms.')</i><span>Lead Results Reviewer</span> </a> </li> 
        <li class=""><a href="review_p1.php?result"><i>('.$num_forms_aap_results.')</i><span>Review Results</span> </a> </li>
       
        ';
}

if(isset($_GET['rev'])){ 
 echo ' <li class="">
            <a href="review_p1.php?p"><i>('.$num_forms_new.')</i><span>New Reviews</span> </a> 
          </li>
           <li class="">
            <a href="review_p1.php?lead_reviewer"><i>('.$num_forms_lead.')</i><span>Lead App Reviewer</span> </a> 
          </li>
        <li class="active"><a href="review_p1.php?rev"><i>('.$num_forms_my_rev.')</i><span>My Reviewed Forms</span> </a> </li>
    
        <li class=""><a href="review_p1.php?lead_result"><i>('.$lead_num_forms.')</i><span>Lead Results Reviewer</span> </a> </li>
        <li class=""><a href="review_p1.php?result"><i>('.$num_forms_aap_results.')</i><span>Review Results</span> </a> </li>
       
        ';
}
          
          ?>
 <li><a href="../reports.php" target="_blank"><i class="icon-bar-chart"></i><span>Reports</span> </a> </li>       
        
          <!--<li><a href="guidely.html"><i class="icon-facetime-video"></i><span>App Tour</span> </a></li>
        <li><a href="charts.html"><i class="icon-bar-chart"></i><span>Charts</span> </a> </li>
        <li><a href="shortcodes.html"><i class="icon-code"></i><span>Shortcodes</span> </a> </li>
        <li class="dropdown"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-long-arrow-down"></i><span>Drops</span> <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="icons.html">Icons</a></li>
            <li><a href="faq.html">FAQ</a></li>
            <li><a href="pricing.html">Pricing Plans</a></li>
            <li><a href="login.html">Login</a></li>
            <li><a href="signup.html">Signup</a></li>
            <li><a href="error.html">404</a></li>
          </ul>
        </li>-->
      </ul>
    </div>
  </div>
</div>
