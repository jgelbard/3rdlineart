<?php

if(isset($_POST['submit_treat'])){ 
	
<<<<<<< HEAD
    $patient_id= mysqli_real_escape_string($bd, $_GET['pat_id']);
    
 	$art_drug= mysqli_real_escape_string($bd, $_POST['art_drug']);
 	$start_date= mysqli_real_escape_string($bd, $_POST['start_date']);
	$stop_date=mysqli_real_escape_string($bd, $_POST['stop_date']);
	$reason_for_change=mysqli_real_escape_string($bd, $_POST['reason_for_change']);
    
    $art_drug2= mysqli_real_escape_string($bd, $_POST['art_drug2']);
 	$start_date2= mysqli_real_escape_string($bd, $_POST['start_date2']);
	$stop_date2=mysqli_real_escape_string($bd, $_POST['stop_date2']);
	$reason_for_change2=mysqli_real_escape_string($bd, $_POST['reason_for_change2']);
    
    $art_drug3= mysqli_real_escape_string($bd, $_POST['art_drug3']);
 	$start_date3= mysqli_real_escape_string($bd, $_POST['start_date3']);
	$stop_date3=mysqli_real_escape_string($bd, $_POST['stop_date3']);
	$reason_for_change3=mysqli_real_escape_string($bd, $_POST['reason_for_change3']);
    
    $art_drug4= mysqli_real_escape_string($bd, $_POST['art_drug4']);
 	$start_date4= mysqli_real_escape_string($bd, $_POST['start_date4']);
	$stop_date4=mysqli_real_escape_string($bd, $_POST['stop_date4']);
	$reason_for_change4=mysqli_real_escape_string($bd, $_POST['reason_for_change4']);
    
    $art_drug5= mysqli_real_escape_string($bd, $_POST['art_drug5']);
 	$start_date5= mysqli_real_escape_string($bd, $_POST['start_date5']);
	$stop_date5=mysqli_real_escape_string($bd, $_POST['stop_date5']);
	$reason_for_change5=mysqli_real_escape_string($bd, $_POST['reason_for_change5']);
    
    
    
    $monito_date= mysqli_real_escape_string($bd, $_POST['monito_date']);
 	$cd4= mysqli_real_escape_string($bd, $_POST['cd4']);
	$vl=mysqli_real_escape_string($bd, $_POST['vl']);
	$reason_4_detectable_vl=mysqli_real_escape_string($bd, $_POST['reason_4_detectable_vl']); 
	$weight=mysqli_real_escape_string($bd, $_POST['weight']); 
    
    $monito_date2= mysqli_real_escape_string($bd, $_POST['monito_date2']);
 	$cd42= mysqli_real_escape_string($bd, $_POST['cd42']);
	$vl2=mysqli_real_escape_string($bd, $_POST['vl2']);
	$reason_4_detectable_vl2=mysqli_real_escape_string($bd, $_POST['reason_4_detectable_vl2']); 
	$weight2=mysqli_real_escape_string($bd, $_POST['weight2']); 
    
    $monito_date3= mysqli_real_escape_string($bd, $_POST['monito_date3']);
 	$cd43= mysqli_real_escape_string($bd, $_POST['cd43']);
	$vl3=mysqli_real_escape_string($bd, $_POST['vl3']);
	$reason_4_detectable_vl3=mysqli_real_escape_string($bd, $_POST['reason_4_detectable_vl3']); 
	$weight3=mysqli_real_escape_string($bd, $_POST['weight3']); 
    
    $monito_date4= mysqli_real_escape_string($bd, $_POST['monito_date4']);
 	$cd44= mysqli_real_escape_string($bd, $_POST['cd44']);
	$vl4=mysqli_real_escape_string($bd, $_POST['vl4']);
	$reason_4_detectable_vl4=mysqli_real_escape_string($bd, $_POST['reason_4_detectable_vl4']); 
	$weight4=mysqli_real_escape_string($bd, $_POST['weight4']); 
    
    $monito_date5= mysqli_real_escape_string($bd, $_POST['monito_date5']);
 	$cd45= mysqli_real_escape_string($bd, $_POST['cd45']);
	$vl5=mysqli_real_escape_string($bd, $_POST['vl5']);
	$reason_4_detectable_vl5=mysqli_real_escape_string($bd, $_POST['reason_4_detectable_vl5']); 
	$weight5=mysqli_real_escape_string($bd, $_POST['weight5']); 
    
    $tb_treat= mysqli_real_escape_string($bd, $_POST['tb_treat']);
=======
    $patient_id= mysqli_real_escape_string($bd, htmlspecialchars($_GET['pat_id']));
    
 	$art_drug= mysqli_real_escape_string($bd, htmlspecialchars($_POST['art_drug']));
 	$start_date= mysqli_real_escape_string($bd, htmlspecialchars($_POST['start_date']));
	$stop_date=mysqli_real_escape_string($bd, htmlspecialchars($_POST['stop_date']));
	$reason_for_change=mysqli_real_escape_string($bd, htmlspecialchars($_POST['reason_for_change']));
    
    $art_drug2= mysqli_real_escape_string($bd, htmlspecialchars($_POST['art_drug2']));
 	$start_date2= mysqli_real_escape_string($bd, htmlspecialchars($_POST['start_date2']));
	$stop_date2=mysqli_real_escape_string($bd, htmlspecialchars($_POST['stop_date2']));
	$reason_for_change2=mysqli_real_escape_string($bd, htmlspecialchars($_POST['reason_for_change2']));
    
    $art_drug3= mysqli_real_escape_string($bd, htmlspecialchars($_POST['art_drug3']));
 	$start_date3= mysqli_real_escape_string($bd, htmlspecialchars($_POST['start_date3']));
	$stop_date3=mysqli_real_escape_string($bd, htmlspecialchars($_POST['stop_date3']));
	$reason_for_change3=mysqli_real_escape_string($bd, htmlspecialchars($_POST['reason_for_change3']));
    
    $art_drug4= mysqli_real_escape_string($bd, htmlspecialchars($_POST['art_drug4']));
 	$start_date4= mysqli_real_escape_string($bd, htmlspecialchars($_POST['start_date4']));
	$stop_date4=mysqli_real_escape_string($bd, htmlspecialchars($_POST['stop_date4']));
	$reason_for_change4=mysqli_real_escape_string($bd, htmlspecialchars($_POST['reason_for_change4']));
    
    $art_drug5= mysqli_real_escape_string($bd, htmlspecialchars($_POST['art_drug5']));
 	$start_date5= mysqli_real_escape_string($bd, htmlspecialchars($_POST['start_date5']));
	$stop_date5=mysqli_real_escape_string($bd, htmlspecialchars($_POST['stop_date5']));
	$reason_for_change5=mysqli_real_escape_string($bd, htmlspecialchars($_POST['reason_for_change5']));
    
    
    
    $monito_date= mysqli_real_escape_string($bd, htmlspecialchars($_POST['monito_date']));
 	$cd4= mysqli_real_escape_string($bd, htmlspecialchars($_POST['cd4']));
	$vl=mysqli_real_escape_string($bd, htmlspecialchars($_POST['vl']));
	$reason_4_detectable_vl=mysqli_real_escape_string($bd, htmlspecialchars($_POST['reason_4_detectable_vl'])); 
	$weight=mysqli_real_escape_string($bd, htmlspecialchars($_POST['weight'])); 
    
    $monito_date2= mysqli_real_escape_string($bd, htmlspecialchars($_POST['monito_date2']));
 	$cd42= mysqli_real_escape_string($bd, htmlspecialchars($_POST['cd42']));
	$vl2=mysqli_real_escape_string($bd, htmlspecialchars($_POST['vl2']));
	$reason_4_detectable_vl2=mysqli_real_escape_string($bd, htmlspecialchars($_POST['reason_4_detectable_vl2'])); 
	$weight2=mysqli_real_escape_string($bd, htmlspecialchars($_POST['weight2'])); 
    
    $monito_date3= mysqli_real_escape_string($bd, htmlspecialchars($_POST['monito_date3']));
 	$cd43= mysqli_real_escape_string($bd, htmlspecialchars($_POST['cd43']));
	$vl3=mysqli_real_escape_string($bd, htmlspecialchars($_POST['vl3']));
	$reason_4_detectable_vl3=mysqli_real_escape_string($bd, htmlspecialchars($_POST['reason_4_detectable_vl3'])); 
	$weight3=mysqli_real_escape_string($bd, htmlspecialchars($_POST['weight3'])); 
    
    $monito_date4= mysqli_real_escape_string($bd, htmlspecialchars($_POST['monito_date4']));
 	$cd44= mysqli_real_escape_string($bd, htmlspecialchars($_POST['cd44']));
	$vl4=mysqli_real_escape_string($bd, htmlspecialchars($_POST['vl4']));
	$reason_4_detectable_vl4=mysqli_real_escape_string($bd, htmlspecialchars($_POST['reason_4_detectable_vl4'])); 
	$weight4=mysqli_real_escape_string($bd, htmlspecialchars($_POST['weight4'])); 
    
    $monito_date5= mysqli_real_escape_string($bd, htmlspecialchars($_POST['monito_date5']));
 	$cd45= mysqli_real_escape_string($bd, htmlspecialchars($_POST['cd45']));
	$vl5=mysqli_real_escape_string($bd, htmlspecialchars($_POST['vl5']));
	$reason_4_detectable_vl5=mysqli_real_escape_string($bd, htmlspecialchars($_POST['reason_4_detectable_vl5'])); 
	$weight5=mysqli_real_escape_string($bd, htmlspecialchars($_POST['weight5'])); 
    
    $tb_treat= mysqli_real_escape_string($bd, htmlspecialchars($_POST['tb_treat']));
>>>>>>> 6efad32ac1db985d04e400ec932fc4f3ad788296
    
    if ($tb_treat=='Yes'){
        
        if(isset($_POST['regimen1_checked'])){ 
     
<<<<<<< HEAD
                $reg_name1= mysqli_real_escape_string($bd, $_POST['reg1']);
                $tbstart_date1=mysqli_real_escape_string($bd, $_POST['tbstart_date1']); 
                $tbstop_date1=mysqli_real_escape_string($bd, $_POST['tbstop_date1']); 
                $reason_o_changes1=mysqli_real_escape_string($bd, $_POST['reason_o_changes1']); 
=======
                $reg_name1= mysqli_real_escape_string($bd, htmlspecialchars($_POST['reg1']));
                $tbstart_date1=mysqli_real_escape_string($bd, htmlspecialchars($_POST['tbstart_date1'])); 
                $tbstop_date1=mysqli_real_escape_string($bd, htmlspecialchars($_POST['tbstop_date1'])); 
                $reason_o_changes1=mysqli_real_escape_string($bd, htmlspecialchars($_POST['reason_o_changes1'])); 
>>>>>>> 6efad32ac1db985d04e400ec932fc4f3ad788296
            
              
            $insert_tb_treat_regimen1=" INSERT  INTO  tb_treat_regimen1
                (pat_id,reg_name,start_date,stop_date,reason_for_change)
                VALUES (
                '$patient_id', '$reg_name1', '$tbstart_date1', '$tbstop_date1', '$reason_o_changes1')";

                mysqli_query( $bd,$insert_tb_treat_regimen1);	

    }
        if(isset($_POST['regimen2_checked'])){ 
     
<<<<<<< HEAD
                $reg_name2= mysqli_real_escape_string($bd, $_POST['reg2']);
                $tbstart_date2=mysqli_real_escape_string($bd, $_POST['tbstart_date2']); 
                $tbstop_date2=mysqli_real_escape_string($bd, $_POST['tbstop_date2']); 
                $reason_o_changes2=mysqli_real_escape_string($bd, $_POST['reason_o_changes2']);
=======
                $reg_name2= mysqli_real_escape_string($bd, htmlspecialchars($_POST['reg2']));
                $tbstart_date2=mysqli_real_escape_string($bd, htmlspecialchars($_POST['tbstart_date2'])); 
                $tbstop_date2=mysqli_real_escape_string($bd, htmlspecialchars($_POST['tbstop_date2'])); 
                $reason_o_changes2=mysqli_real_escape_string($bd, htmlspecialchars($_POST['reason_o_changes2']));
>>>>>>> 6efad32ac1db985d04e400ec932fc4f3ad788296
            
            $insert_tb_treat_regimen2=" INSERT  INTO  tb_treat_regimen2
                (pat_id,reg_name,start_date,stop_date,reason_for_change)
                VALUES (
                '$patient_id', '$reg_name2', '$tbstart_date2', '$tbstop_date2', '$reason_o_changes2')";

                mysqli_query( $bd,$insert_tb_treat_regimen2);
            
    }
        if(isset($_POST['mdr_checked'])){ 
     
<<<<<<< HEAD
                $mdr= mysqli_real_escape_string($bd, $_POST['mdr']);
                $tbstart_date_mdr=mysqli_real_escape_string($bd, $_POST['tbstart_date_mdr']); 
                $tbstop_date_mdr=mysqli_real_escape_string($bd, $_POST['tbstop_date_mdr']); 
                $reason_o_changes_mdr=mysqli_real_escape_string($bd, $_POST['reason_o_changes_mdr']);
=======
                $mdr= mysqli_real_escape_string($bd, htmlspecialchars($_POST['mdr']));
                $tbstart_date_mdr=mysqli_real_escape_string($bd, htmlspecialchars($_POST['tbstart_date_mdr'])); 
                $tbstop_date_mdr=mysqli_real_escape_string($bd, htmlspecialchars($_POST['tbstop_date_mdr'])); 
                $reason_o_changes_mdr=mysqli_real_escape_string($bd, htmlspecialchars($_POST['reason_o_changes_mdr']));
>>>>>>> 6efad32ac1db985d04e400ec932fc4f3ad788296
            
            $insert_tb_treat_mdr=" INSERT  INTO  tb_treat_mdr
                (pat_id,reg_name,start_date,stop_date,reason_for_change)
                VALUES (
                '$patient_id', '$mdr', '$tbstart_date_mdr', '$tbstop_date_mdr', '$reason_o_changes_mdr')";

                mysqli_query( $bd,$insert_tb_treat_mdr);
    
    }
  
<<<<<<< HEAD
    /* $reg11= mysqli_real_escape_string($bd, $_POST['reg11']);
 	$reg21= mysqli_real_escape_string($bd, $_POST['reg21']);
	$mdr1=mysqli_real_escape_string($bd, $_POST['mdr1']);
	$tbstart_date1=mysqli_real_escape_string($bd, $_POST['tbstart_date1']); 
	$tbstop_date1=mysqli_real_escape_string($bd, $_POST['tbstop_date1']); 
	$reason_o_changes1=mysqli_real_escape_string($bd, $_POST['reason_o_changes1']); 
=======
    /* $reg11= mysqli_real_escape_string($bd, htmlspecialchars($_POST['reg11']));
 	$reg21= mysqli_real_escape_string($bd, htmlspecialchars($_POST['reg21']));
	$mdr1=mysqli_real_escape_string($bd, htmlspecialchars($_POST['mdr1']));
	$tbstart_date1=mysqli_real_escape_string($bd, htmlspecialchars($_POST['tbstart_date1'])); 
	$tbstop_date1=mysqli_real_escape_string($bd, htmlspecialchars($_POST['tbstop_date1'])); 
	$reason_o_changes1=mysqli_real_escape_string($bd, htmlspecialchars($_POST['reason_o_changes1'])); 
>>>>>>> 6efad32ac1db985d04e400ec932fc4f3ad788296
    
  
$insert_tb_treatment=" INSERT  INTO  tb_treatment (pat_id,reg1,reg2,mdr,start_date,stop_date,reason_o_changes)
VALUES (
'$patient_id', '$reg11', '$reg21', '$mdr1', '$tbstart_date1', '$tbstop_date1', '$reason_o_changes1')";

mysqli_query( $bd,$insert_tb_treatment);	*/
        
    }
    
     
$insert_monitoring=" INSERT  INTO  monitoring (pat_id,monito_date,cd4,vl,reason_4_detectable_vl,weight)
VALUES (
'$patient_id', '$monito_date', '$cd4', '$vl', '$reason_4_detectable_vl', '$weight')";

mysqli_query( $bd,$insert_monitoring);	
        
        $insert_monitoring2=" INSERT  INTO  monitoring (pat_id,monito_date,cd4,vl,reason_4_detectable_vl,weight)
VALUES (
'$patient_id', '$monito_date2', '$cd42', '$vl2', '$reason_4_detectable_vl2', '$weight2')";

mysqli_query( $bd,$insert_monitoring2);	
        
        
        $insert_monitoring3=" INSERT  INTO  monitoring (pat_id,monito_date,cd4,vl,reason_4_detectable_vl,weight)
VALUES (
'$patient_id', '$monito_date3', '$cd43', '$vl3', '$reason_4_detectable_vl3', '$weight3')";

mysqli_query( $bd,$insert_monitoring3);	
       
     $insert_monitoring4=" INSERT  INTO  monitoring (pat_id,monito_date,cd4,vl,reason_4_detectable_vl,weight)
VALUES (
'$patient_id', '$monito_date4', '$cd44', '$vl4', '$reason_4_detectable_vl4', '$weight4')";

mysqli_query( $bd,$insert_monitoring4);	
         
       $insert_monitoring5=" INSERT  INTO  monitoring (pat_id,monito_date,cd4,vl,reason_4_detectable_vl,weight)
VALUES (
'$patient_id', '$monito_date5', '$cd45', '$vl5', '$reason_4_detectable_vl5', '$weight5')";

mysqli_query( $bd,$insert_monitoring5);	
       
       
    
   echo  $patient_id.$art_drug.$stop_date.$monito_date;
 	
$insert_treatment_history=" INSERT  INTO  treatment_history (pat_id,art_drug,start_date,stop_date,reason_for_change)
VALUES (
'$patient_id', '$art_drug', '$start_date', '$stop_date', '$reason_for_change')";

mysqli_query( $bd,$insert_treatment_history);	
    
    
    $insert_treatment_history2=" INSERT  INTO  treatment_history (pat_id,art_drug,start_date,stop_date,reason_for_change)
VALUES (
'$patient_id', '$art_drug2', '$start_date2', '$stop_date2', '$reason_for_change2')";

mysqli_query( $bd,$insert_treatment_history2);	
    
    
    $insert_treatment_history3=" INSERT  INTO  treatment_history (pat_id,art_drug,start_date,stop_date,reason_for_change)
VALUES (
'$patient_id', '$art_drug3', '$start_date3', '$stop_date3', '$reason_for_change3')";

mysqli_query( $bd,$insert_treatment_history3);	
    
    
    $insert_treatment_history4=" INSERT  INTO  treatment_history (pat_id,art_drug,start_date,stop_date,reason_for_change)
VALUES (
'$patient_id', '$art_drug4', '$start_date4', '$stop_date4', '$reason_for_change4')";

mysqli_query( $bd,$insert_treatment_history4);	
    
    
    $insert_treatment_history5=" INSERT  INTO  treatment_history (pat_id,art_drug,start_date,stop_date,reason_for_change)
VALUES (
'$patient_id', '$art_drug5', '$start_date5', '$stop_date5', '$reason_for_change5')";

mysqli_query( $bd,$insert_treatment_history5);	
    
 	
  
}

?>