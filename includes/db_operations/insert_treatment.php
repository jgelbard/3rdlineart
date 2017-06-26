<?php

if(isset($_POST['submit_treat'])){ 
	
    $patient_id= mysql_real_escape_string(htmlspecialchars($_GET['pat_id']));
    
 	$art_drug= mysql_real_escape_string(htmlspecialchars($_POST['art_drug']));
 	$start_date= mysql_real_escape_string(htmlspecialchars($_POST['start_date']));
	$stop_date=mysql_real_escape_string(htmlspecialchars($_POST['stop_date']));
	$reason_for_change=mysql_real_escape_string(htmlspecialchars($_POST['reason_for_change']));
    
    $art_drug2= mysql_real_escape_string(htmlspecialchars($_POST['art_drug2']));
 	$start_date2= mysql_real_escape_string(htmlspecialchars($_POST['start_date2']));
	$stop_date2=mysql_real_escape_string(htmlspecialchars($_POST['stop_date2']));
	$reason_for_change2=mysql_real_escape_string(htmlspecialchars($_POST['reason_for_change2']));
    
    $art_drug3= mysql_real_escape_string(htmlspecialchars($_POST['art_drug3']));
 	$start_date3= mysql_real_escape_string(htmlspecialchars($_POST['start_date3']));
	$stop_date3=mysql_real_escape_string(htmlspecialchars($_POST['stop_date3']));
	$reason_for_change3=mysql_real_escape_string(htmlspecialchars($_POST['reason_for_change3']));
    
    $art_drug4= mysql_real_escape_string(htmlspecialchars($_POST['art_drug4']));
 	$start_date4= mysql_real_escape_string(htmlspecialchars($_POST['start_date4']));
	$stop_date4=mysql_real_escape_string(htmlspecialchars($_POST['stop_date4']));
	$reason_for_change4=mysql_real_escape_string(htmlspecialchars($_POST['reason_for_change4']));
    
    $art_drug5= mysql_real_escape_string(htmlspecialchars($_POST['art_drug5']));
 	$start_date5= mysql_real_escape_string(htmlspecialchars($_POST['start_date5']));
	$stop_date5=mysql_real_escape_string(htmlspecialchars($_POST['stop_date5']));
	$reason_for_change5=mysql_real_escape_string(htmlspecialchars($_POST['reason_for_change5']));
    
    
    
    $monito_date= mysql_real_escape_string(htmlspecialchars($_POST['monito_date']));
 	$cd4= mysql_real_escape_string(htmlspecialchars($_POST['cd4']));
	$vl=mysql_real_escape_string(htmlspecialchars($_POST['vl']));
	$reason_4_detectable_vl=mysql_real_escape_string(htmlspecialchars($_POST['reason_4_detectable_vl'])); 
	$weight=mysql_real_escape_string(htmlspecialchars($_POST['weight'])); 
    
    $monito_date2= mysql_real_escape_string(htmlspecialchars($_POST['monito_date2']));
 	$cd42= mysql_real_escape_string(htmlspecialchars($_POST['cd42']));
	$vl2=mysql_real_escape_string(htmlspecialchars($_POST['vl2']));
	$reason_4_detectable_vl2=mysql_real_escape_string(htmlspecialchars($_POST['reason_4_detectable_vl2'])); 
	$weight2=mysql_real_escape_string(htmlspecialchars($_POST['weight2'])); 
    
    $monito_date3= mysql_real_escape_string(htmlspecialchars($_POST['monito_date3']));
 	$cd43= mysql_real_escape_string(htmlspecialchars($_POST['cd43']));
	$vl3=mysql_real_escape_string(htmlspecialchars($_POST['vl3']));
	$reason_4_detectable_vl3=mysql_real_escape_string(htmlspecialchars($_POST['reason_4_detectable_vl3'])); 
	$weight3=mysql_real_escape_string(htmlspecialchars($_POST['weight3'])); 
    
    $monito_date4= mysql_real_escape_string(htmlspecialchars($_POST['monito_date4']));
 	$cd44= mysql_real_escape_string(htmlspecialchars($_POST['cd44']));
	$vl4=mysql_real_escape_string(htmlspecialchars($_POST['vl4']));
	$reason_4_detectable_vl4=mysql_real_escape_string(htmlspecialchars($_POST['reason_4_detectable_vl4'])); 
	$weight4=mysql_real_escape_string(htmlspecialchars($_POST['weight4'])); 
    
    $monito_date5= mysql_real_escape_string(htmlspecialchars($_POST['monito_date5']));
 	$cd45= mysql_real_escape_string(htmlspecialchars($_POST['cd45']));
	$vl5=mysql_real_escape_string(htmlspecialchars($_POST['vl5']));
	$reason_4_detectable_vl5=mysql_real_escape_string(htmlspecialchars($_POST['reason_4_detectable_vl5'])); 
	$weight5=mysql_real_escape_string(htmlspecialchars($_POST['weight5'])); 
    
    $tb_treat= mysql_real_escape_string(htmlspecialchars($_POST['tb_treat']));
    
    if ($tb_treat=='Yes'){
        
        if(isset($_POST['regimen1_checked'])){ 
     
                $reg_name1= mysql_real_escape_string(htmlspecialchars($_POST['reg1']));
                $tbstart_date1=mysql_real_escape_string(htmlspecialchars($_POST['tbstart_date1'])); 
                $tbstop_date1=mysql_real_escape_string(htmlspecialchars($_POST['tbstop_date1'])); 
                $reason_o_changes1=mysql_real_escape_string(htmlspecialchars($_POST['reason_o_changes1'])); 
            
              
            $insert_tb_treat_regimen1=" INSERT  INTO  tb_treat_regimen1
                (pat_id,reg_name,start_date,stop_date,reason_for_change)
                VALUES (
                '$patient_id', '$reg_name1', '$tbstart_date1', '$tbstop_date1', '$reason_o_changes1')";

                mysql_query($insert_tb_treat_regimen1, $bd);	

    }
        if(isset($_POST['regimen2_checked'])){ 
     
                $reg_name2= mysql_real_escape_string(htmlspecialchars($_POST['reg2']));
                $tbstart_date2=mysql_real_escape_string(htmlspecialchars($_POST['tbstart_date2'])); 
                $tbstop_date2=mysql_real_escape_string(htmlspecialchars($_POST['tbstop_date2'])); 
                $reason_o_changes2=mysql_real_escape_string(htmlspecialchars($_POST['reason_o_changes2']));
            
            $insert_tb_treat_regimen2=" INSERT  INTO  tb_treat_regimen2
                (pat_id,reg_name,start_date,stop_date,reason_for_change)
                VALUES (
                '$patient_id', '$reg_name2', '$tbstart_date2', '$tbstop_date2', '$reason_o_changes2')";

                mysql_query($insert_tb_treat_regimen2, $bd);
            
    }
        if(isset($_POST['mdr_checked'])){ 
     
                $mdr= mysql_real_escape_string(htmlspecialchars($_POST['mdr']));
                $tbstart_date_mdr=mysql_real_escape_string(htmlspecialchars($_POST['tbstart_date_mdr'])); 
                $tbstop_date_mdr=mysql_real_escape_string(htmlspecialchars($_POST['tbstop_date_mdr'])); 
                $reason_o_changes_mdr=mysql_real_escape_string(htmlspecialchars($_POST['reason_o_changes_mdr']));
            
            $insert_tb_treat_mdr=" INSERT  INTO  tb_treat_mdr
                (pat_id,reg_name,start_date,stop_date,reason_for_change)
                VALUES (
                '$patient_id', '$mdr', '$tbstart_date_mdr', '$tbstop_date_mdr', '$reason_o_changes_mdr')";

                mysql_query($insert_tb_treat_mdr, $bd);
    
    }
  
    /* $reg11= mysql_real_escape_string(htmlspecialchars($_POST['reg11']));
 	$reg21= mysql_real_escape_string(htmlspecialchars($_POST['reg21']));
	$mdr1=mysql_real_escape_string(htmlspecialchars($_POST['mdr1']));
	$tbstart_date1=mysql_real_escape_string(htmlspecialchars($_POST['tbstart_date1'])); 
	$tbstop_date1=mysql_real_escape_string(htmlspecialchars($_POST['tbstop_date1'])); 
	$reason_o_changes1=mysql_real_escape_string(htmlspecialchars($_POST['reason_o_changes1'])); 
    
  
$insert_tb_treatment=" INSERT  INTO  tb_treatment (pat_id,reg1,reg2,mdr,start_date,stop_date,reason_o_changes)
VALUES (
'$patient_id', '$reg11', '$reg21', '$mdr1', '$tbstart_date1', '$tbstop_date1', '$reason_o_changes1')";

mysql_query($insert_tb_treatment, $bd);	*/
        
    }
    
     
$insert_monitoring=" INSERT  INTO  monitoring (pat_id,monito_date,cd4,vl,reason_4_detectable_vl,weight)
VALUES (
'$patient_id', '$monito_date', '$cd4', '$vl', '$reason_4_detectable_vl', '$weight')";

mysql_query($insert_monitoring, $bd);	
        
        $insert_monitoring2=" INSERT  INTO  monitoring (pat_id,monito_date,cd4,vl,reason_4_detectable_vl,weight)
VALUES (
'$patient_id', '$monito_date2', '$cd42', '$vl2', '$reason_4_detectable_vl2', '$weight2')";

mysql_query($insert_monitoring2, $bd);	
        
        
        $insert_monitoring3=" INSERT  INTO  monitoring (pat_id,monito_date,cd4,vl,reason_4_detectable_vl,weight)
VALUES (
'$patient_id', '$monito_date3', '$cd43', '$vl3', '$reason_4_detectable_vl3', '$weight3')";

mysql_query($insert_monitoring3, $bd);	
       
     $insert_monitoring4=" INSERT  INTO  monitoring (pat_id,monito_date,cd4,vl,reason_4_detectable_vl,weight)
VALUES (
'$patient_id', '$monito_date4', '$cd44', '$vl4', '$reason_4_detectable_vl4', '$weight4')";

mysql_query($insert_monitoring4, $bd);	
         
       $insert_monitoring5=" INSERT  INTO  monitoring (pat_id,monito_date,cd4,vl,reason_4_detectable_vl,weight)
VALUES (
'$patient_id', '$monito_date5', '$cd45', '$vl5', '$reason_4_detectable_vl5', '$weight5')";

mysql_query($insert_monitoring5, $bd);	
       
       
    
   echo  $patient_id.$art_drug.$stop_date.$monito_date;
 	
$insert_treatment_history=" INSERT  INTO  treatment_history (pat_id,art_drug,start_date,stop_date,reason_for_change)
VALUES (
'$patient_id', '$art_drug', '$start_date', '$stop_date', '$reason_for_change')";

mysql_query($insert_treatment_history, $bd);	
    
    
    $insert_treatment_history2=" INSERT  INTO  treatment_history (pat_id,art_drug,start_date,stop_date,reason_for_change)
VALUES (
'$patient_id', '$art_drug2', '$start_date2', '$stop_date2', '$reason_for_change2')";

mysql_query($insert_treatment_history2, $bd);	
    
    
    $insert_treatment_history3=" INSERT  INTO  treatment_history (pat_id,art_drug,start_date,stop_date,reason_for_change)
VALUES (
'$patient_id', '$art_drug3', '$start_date3', '$stop_date3', '$reason_for_change3')";

mysql_query($insert_treatment_history3, $bd);	
    
    
    $insert_treatment_history4=" INSERT  INTO  treatment_history (pat_id,art_drug,start_date,stop_date,reason_for_change)
VALUES (
'$patient_id', '$art_drug4', '$start_date4', '$stop_date4', '$reason_for_change4')";

mysql_query($insert_treatment_history4, $bd);	
    
    
    $insert_treatment_history5=" INSERT  INTO  treatment_history (pat_id,art_drug,start_date,stop_date,reason_for_change)
VALUES (
'$patient_id', '$art_drug5', '$start_date5', '$stop_date5', '$reason_for_change5')";

mysql_query($insert_treatment_history5, $bd);	
    
 	
  
}

?>