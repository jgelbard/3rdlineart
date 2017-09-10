<div class="subnavbar">
     <div class="subnavbar-inner">
     <div class="container">
     <ul class="mainnav">
     <li><a href="review_p1.php?p"><img src="../img/app_log.png" width="100px"></a></li> 
     
<?php
//     global $num_forms, $num_forms_lead, $lead_num_forms, $num_forms_my_rev, $num_forms_aap_results; 

$select_forms_new="SELECT * FROM assigned_forms where rev_id='$rev_id' and status ='Not Reviewed'"; 
$select_assigned_forms_lead="SELECT distinct form_id,date_assigned FROM assigned_forms WHERE form_id in (select form_id from reviewer_team_lead where reviewer_team_lead.rev_id=$rev_id) and form_id not in (select form_id from expert_review_consolidate1) ORDER BY `assigned_forms`.`form_id` DESC"; 
$select_form_my_reviews="SELECT * FROM assigned_forms where rev_id='$rev_id' and status = 'Reviewed'"; 
$select_form_assigned_app_results="SELECT * FROM assigned_app_results where rev_id='$rev_id' and status ='Not Reviewed'"; 
$select_lead_assigned_forms="SELECT distinct form_id,date_assigned FROM assigned_app_results WHERE form_id in (select form_id from reviewer_team_lead2 where reviewer_team_lead2.rev_id=$rev_id) and form_id not in (select form_id from expert_review_consolidate2) ORDER BY `assigned_app_results`.`form_id` DESC";

function makebuttons($btname) {
    global $cp_query, $bd;
    
    $buttons = [
        'new' => ['New Reviews', 'select_forms_new'],
        'lead_reviewer' => ['Lead App Reviewer', 'select_assigned_forms_lead'], 
        'rev' => ['My Reviewed Forms', 'select_form_my_reviews'],
        'result' => ['Review Results', 'select_form_assigned_app_results'],       
        'lead_result' =>['Lead Results Reviewer', 'select_lead_assigned_forms'],
    ];
    foreach ($buttons as $name => $label_query) {
        if ($label_query[1] == '')
            continue;
        $label = $label_query[0];
        $query = $label_query[1];
        $p = $name == 'new' ? 'p' : $name;       
        // $forms = mysqli_query($bd, $cp_query[$query]);
        eval("global \$$query; \$forms = mysqli_query(\$bd, \$$query);");
        $num_forms = mysqli_num_rows($forms) ?  mysqli_num_rows($forms) : 0;
        echo '<li class="'.($btname==$name?'active':'').'"><a href="review_p1.php?'.$p.'"><i class="icon-th-list" ></i><span style="font-size: 12px;">'.'('.$num_forms.') '.$label.'</span> </a> </li>';
    }
}


if(isset($_GET['p']))
    makebuttons('new');

if(isset($_GET['lead_reviewer']))
    makebuttons('lead_reviewer');

if(isset($_GET['rev']))
    makebuttons('rev');    

if(isset($_GET['result']))
    makebuttons('result');    

if(isset($_GET['lead_result']))
    makebuttons('lead_result');

?>
<li><a href="../reports.php" target="_blank"><i class="icon-bar-chart"></i><span>Reports</span> </a> </li>               
</ul>
</div>
</div>
</div>
