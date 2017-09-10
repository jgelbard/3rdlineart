<div class="subnavbar">
  <div class="subnavbar-inner">
    <div class="container">
      <ul class="mainnav">
          <li><a href="cp_p1.php?p"><img src="../img/app_log.png" width="100px"></a></li> 
<?php
//     global $num_newforms; 

$which = '';
if(isset($_GET['subnav'])) {
    makebuttons($_GET['subnav']);
    return;
}

function makebuttons($btname) {
    global $cp_query, $bd;
    
    $buttons = [
        'new' => ['New App', 'select_new_forms'],
        'rev' => ['Apps Under Rev', 'select_assigned_forms'], 
        'reviewed_app' => ['Reviewed Apps', 'select_expert_review_consolidate1'],
        'pending_sample' => ['Pending Samples', 'select_sec_pending_sample'],
        'pending_result' =>['Pending Results', 'select_sec_pending_results'],
        'pending' => ['Results Under Rev', 'select_sec_results_under_review'],
        'reviewed_result' => ['Reviewed Results', 'select_sec_reviewed_results'],
        'reminder' => ['6 Months Reminder', ''],
    ];
    foreach ($buttons as $name => $label_query) {
        if ($label_query[1] == '')
            continue;
        $label = $label_query[0];
        $query = $label_query[1];
        $p = $name == 'new' ? 'p' : $name;
        $forms = mysqli_query($bd, $cp_query[$query]);
        $num_forms = mysqli_num_rows($forms) ?  mysqli_num_rows($forms) : 0;
        echo '<li class="'.($btname==$name?'active':'').'"><a href="cp_p1.php?'.$p.'"><i class="icon-th-list" style="font-size: 16px;"></i>&nbsp('.$num_forms.')<span style="font-size: 12px;">'.$label.'</span> </a> </li>';
    }
    
    echo '        
         <li class="'.($btname=='reminder'?'active':'').'"><a href="cp_p1.php?reminder"><i class="icon-th-list"></i><span>6 Months Reminder</span> </a> </li>    
        ';
}

if(isset($_GET['p'])){ 
    makebuttons('new');
}

if(isset($_GET['rev'])){ 
    makebuttons('rev');
}
          
if(isset($_GET['reviewed_app'])){ 
    makebuttons('reviewed_app');
}

if(isset($_GET['pending_sample'])){ 
    makebuttons('pending_sample');
}

if(isset($_GET['pending_result'])){ 
    makebuttons('pending_result');
}

if(isset($_GET['pending'])){ 
    makebuttons('pending');
}

if(isset($_GET['reviewed_result'])){ 
    makebuttons('reviewed_result');
}

if(isset($_GET['reminder'])){
    makebuttons('reminder');
}
         
?>
  <li class=""><a href="../reports.php" target="_blank"><i class="icon-th-list"></i><span>Reports</span> </a> </li>      
    </ul>
    </div>
  </div>
</div>
