<div class="subnavbar">
  <div class="subnavbar-inner">
    <div class="container">
      <ul class="mainnav">
          <li><a href="cp_p1.php?p"><img src="../img/app_log.png" width="100px"></a></li> 
           <?php
global $num_newforms; 
$form_creation=mysqli_query($bd, "SELECT * FROM form_creation where status='Complete' and complete !='Rejected' ORDER BY `form_creation`.`3rdlineart_form_id` DESC "); 
$num_newforms = mysqli_num_rows ($form_creation);

?>
          
          <?php 
          if(isset($_GET['p'])){ 
  
              echo ' <li class="active">
            <a href="cp_p1.php?p"><i>('.$num_newforms.')</i><span>New App</span> </a> 
          </li>
        <li class=""><a href="cp_p1.php?rev"><i class="icon-th-list"></i><span>App Under Rev</span> </a> </li>
         <li class=""><a href="cp_p1.php?reviewed_app"><i class="icon-th-list"></i><span>Reviewed App</span> </a> </li>
         <li class=""><a href="cp_p1.php?pending_sample"><i class="icon-th-list"></i><span>Pending Samples</span> </a> </li>
         <li class=""><a href="cp_p1.php?pending_result"><i class="icon-th-list"></i><span>Pending Results</span> </a> </li>
         <li class=""><a href="cp_p1.php?pending"><i class="icon-th-list"></i><span>Results Under Rev</span> </a> 
         <li class=""><a href="cp_p1.php?reviewed_result"><i class="icon-th-list"></i><span>Reveiwed Results</span> </a> </li>
         <li class=""><a href="cp_p1.php?reminder"><i class="icon-th-list"></i><span>6 Months Reminder</span> </a> </li>
       
        
        
        ';
}

if(isset($_GET['reviewed_app'])){ 
  
               echo ' <li class="">
            <a href="cp_p1.php?p"><i>('.$num_newforms.')</i><span>New App</span> </a> 
          </li>
        <li class=""><a href="cp_p1.php?rev"><i class="icon-th-list"></i><span>App Under Rev</span> </a> </li>
         <li class="active"><a href="cp_p1.php?reviewed_app"><i class="icon-th-list"></i><span>Reviewed App</span> </a> </li>
         <li class=""><a href="cp_p1.php?pending_sample"><i class="icon-th-list"></i><span>Pending Samples</span> </a> </li>
         <li class=""><a href="cp_p1.php?pending_result"><i class="icon-th-list"></i><span>Pending Results</span> </a> </li>
         <li class=""><a href="cp_p1.php?pending"><i class="icon-th-list"></i><span>Results Under Rev</span> </a> 
         <li class=""><a href="cp_p1.php?reviewed_result"><i class="icon-th-list"></i><span>Reveiwed Results</span> </a> </li>
         <li class=""><a href="cp_p1.php?reminder"><i class="icon-th-list"></i><span>6 Months Reminder</span> </a> </li>
       
        
        
        ';
}
if(isset($_GET['pending'])){ 
  
               echo ' <li class="">
            <a href="cp_p1.php?p"><i>('.$num_newforms.')</i><span>New App</span> </a> 
          </li>
        <li class=""><a href="cp_p1.php?rev"><i class="icon-th-list"></i><span>App Under Rev</span> </a> </li>
         <li class=""><a href="cp_p1.php?reviewed_app"><i class="icon-th-list"></i><span>Reviewed App</span> </a> </li>
         <li class=""><a href="cp_p1.php?pending_sample"><i class="icon-th-list"></i><span>Pending Samples</span> </a> </li>
         <li class=""><a href="cp_p1.php?pending_result"><i class="icon-th-list"></i><span>Pending Results</span> </a> </li>
         <li class="active"><a href="cp_p1.php?pending"><i class="icon-th-list"></i><span>Results Under Rev</span> </a> 
         <li class=""><a href="cp_p1.php?reviewed_result"><i class="icon-th-list"></i><span>Reveiwed Results</span> </a> </li>
         <li class=""><a href="cp_p1.php?reminder"><i class="icon-th-list"></i><span>6 Months Reminder</span> </a> </li>
       
        
        
        ';
}
if(isset($_GET['pending_sample'])){ 
  
               echo ' <li class="">
            <a href="cp_p1.php?p"><i>('.$num_newforms.')</i><span>New App</span> </a> 
          </li>
        <li class=""><a href="cp_p1.php?rev"><i class="icon-th-list"></i><span>App Under Rev</span> </a> </li>
         <li class=""><a href="cp_p1.php?reviewed_app"><i class="icon-th-list"></i><span>Reviewed App</span> </a> </li>
         <li class="active"><a href="cp_p1.php?pending_sample"><i class="icon-th-list"></i><span>Pending Samples</span> </a> </li>
         <li class=""><a href="cp_p1.php?pending_result"><i class="icon-th-list"></i><span>Pending Results</span> </a> </li>
         <li class=""><a href="cp_p1.php?pending"><i class="icon-th-list"></i><span>Results Under Rev</span> </a> 
         <li class=""><a href="cp_p1.php?reviewed_result"><i class="icon-th-list"></i><span>Reveiwed Results</span> </a> </li>
         <li class=""><a href="cp_p1.php?reminder"><i class="icon-th-list"></i><span>6 Months Reminder</span> </a> </li>
       
        
        
        ';
}
if(isset($_GET['pending_result'])){ 
  
               echo ' <li class="">
            <a href="cp_p1.php?p"><i>('.$num_newforms.')</i><span>New App</span> </a> 
          </li>
        <li class=""><a href="cp_p1.php?rev"><i class="icon-th-list"></i><span>App Under Rev</span> </a> </li>
         <li class=""><a href="cp_p1.php?reviewed_app"><i class="icon-th-list"></i><span>Reviewed App</span> </a> </li>
         <li class=""><a href="cp_p1.php?pending_sample"><i class="icon-th-list"></i><span>Pending Samples</span> </a> </li>
         <li class="active"><a href="cp_p1.php?pending_result"><i class="icon-th-list"></i><span>Pending Results</span> </a> </li>
         <li class=""><a href="cp_p1.php?pending"><i class="icon-th-list"></i><span>Results Under Rev</span> </a> 
         <li class=""><a href="cp_p1.php?reviewed_result"><i class="icon-th-list"></i><span>Reveiwed Results</span> </a> </li>
         <li class=""><a href="cp_p1.php?reminder"><i class="icon-th-list"></i><span>6 Months Reminder</span> </a> </li>
        
        
        
        ';
}
if(isset($_GET['reviewed_result'])){ 
  
               echo ' <li class="">
            <a href="cp_p1.php?p"><i>('.$num_newforms.')</i><span>New App</span> </a> 
          </li>
        <li class=""><a href="cp_p1.php?rev"><i class="icon-th-list"></i><span>App Under Rev</span> </a> </li>
         <li class=""><a href="cp_p1.php?reviewed_app"><i class="icon-th-list"></i><span>Reviewed App</span> </a> </li>
         <li class=""><a href="cp_p1.php?pending_sample"><i class="icon-th-list"></i><span>Pending Samples</span> </a> </li>
         <li class=""><a href="cp_p1.php?pending_result"><i class="icon-th-list"></i><span>Pending Results</span> </a> </li>
         <li class=""><a href="cp_p1.php?pending"><i class="icon-th-list"></i><span>Results Under Rev</span> </a> 
         <li class="active"><a href="cp_p1.php?reviewed_result"><i class="icon-th-list"></i><span>Reveiwed Results</span> </a> </li>
         <li class=""><a href="cp_p1.php?reminder"><i class="icon-th-list"></i><span>6 Months Reminder</span> </a> </li>
        
        
        
        ';
}

if(isset($_GET['rev'])){ 
   echo ' <li class="">
            <a href="cp_p1.php?p"><i>('.$num_newforms.')</i><span>New App</span> </a> 
          </li>
        <li class="active"><a href="cp_p1.php?rev"><i class="icon-th-list"></i><span>App Under Rev</span> </a> </li>
         <li class=""><a href="cp_p1.php?reviewed_app"><i class="icon-th-list"></i><span>Reviewed App</span> </a> </li>
         <li class=""><a href="cp_p1.php?pending_sample"><i class="icon-th-list"></i><span>Pending Samples</span> </a> </li>
         <li class=""><a href="cp_p1.php?pending_result"><i class="icon-th-list"></i><span>Pending Results</span> </a> </li>
         <li class=""><a href="cp_p1.php?pending"><i class="icon-th-list"></i><span>Results Under Rev</span> </a> 
         <li class=""><a href="cp_p1.php?reviewed_result"><i class="icon-th-list"></i><span>Reveiwed Results</span> </a> </li>
         <li class=""><a href="cp_p1.php?reminder"><i class="icon-th-list"></i><span>6 Months Reminder</span> </a> </li>
       
        
        
        ';
}
          
if(isset($_GET['reminder'])){ 
   echo ' <li class="">
            <a href="cp_p1.php?p"><i>('.$num_newforms.')</i><span>New App</span> </a> 
          </li>
        <li class=""><a href="cp_p1.php?rev"><i class="icon-th-list"></i><span>App Under Rev</span> </a> </li>
         <li class=""><a href="cp_p1.php?reviewed_app"><i class="icon-th-list"></i><span>Reviewed App</span> </a> </li>
         <li class=""><a href="cp_p1.php?pending_sample"><i class="icon-th-list"></i><span>Pending Samples</span> </a> </li>
         <li class=""><a href="cp_p1.php?pending_result"><i class="icon-th-list"></i><span>Pending Results</span> </a> </li>
         <li class=""><a href="cp_p1.php?pending"><i class="icon-th-list"></i><span>Results Under Rev</span> </a> 
         <li class=""><a href="cp_p1.php?reviewed_result"><i class="icon-th-list"></i><span>Reveiwed Results</span> </a> </li>
         <li class="active"><a href="cp_p1.php?reminder"><i class="icon-th-list"></i><span>6 Months Reminder</span> </a> </li>
         
        
        
        ';
}
          /*if(isset($_GET['reminder'])){ 
   echo ' <li class="">
            <a href="cp_p1.php?p"><i>('.$num_newforms.')</i><span>New App</span> </a> 
          </li>
        <li class=""><a href="cp_p1.php?rev"><i class="icon-th-list"></i><span>App Under Rev</span> </a> </li>
         <li class=""><a href="cp_p1.php?reviewed_app"><i class="icon-th-list"></i><span>Reviewed App</span> </a> </li>
         <li class=""><a href="cp_p1.php?pending_sample"><i class="icon-th-list"></i><span>Pending Samples</span> </a> </li>
         <li class=""><a href="cp_p1.php?pending_result"><i class="icon-th-list"></i><span>Pending Results</span> </a> </li>
         <li class=""><a href="cp_p1.php?pending"><i class="icon-th-list"></i><span>Results Under Rev</span> </a> 
         <li class=""><a href="cp_p1.php?reviewed_result"><i class="icon-th-list"></i><span>Reveiwed Results</span> </a> </li>
         <li class="active"><a href="cp_p1.php?reminder"><i class="icon-th-list"></i><span>6 Months Reminder</span> </a> </li>
         <li class=""><a href="cp_p1.php?rev"><i class="icon-th-list"></i><span>Reports</span> </a> </li>
        
        
        ';
}
          */
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
