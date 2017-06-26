<?php

if(isset($_POST['submit_treatment2'])){ 
	
    $patient_id= mysql_real_escape_string(htmlspecialchars($_GET['pat_id']));
    
 
    
    
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
    
    $monito_date6= mysql_real_escape_string(htmlspecialchars($_POST['monito_date6']));
 	$cd46= mysql_real_escape_string(htmlspecialchars($_POST['cd46']));
	$vl6=mysql_real_escape_string(htmlspecialchars($_POST['vl6']));
	$reason_4_detectable_vl6=mysql_real_escape_string(htmlspecialchars($_POST['reason_4_detectable_vl6'])); 
	$weight6=mysql_real_escape_string(htmlspecialchars($_POST['weight6'])); 
    
    $monito_date7= mysql_real_escape_string(htmlspecialchars($_POST['monito_date7']));
 	$cd47= mysql_real_escape_string(htmlspecialchars($_POST['cd47']));
	$vl7=mysql_real_escape_string(htmlspecialchars($_POST['vl7']));
	$reason_4_detectable_vl7=mysql_real_escape_string(htmlspecialchars($_POST['reason_4_detectable_vl7'])); 
	$weight7=mysql_real_escape_string(htmlspecialchars($_POST['weight7'])); 
    
    $monito_date8= mysql_real_escape_string(htmlspecialchars($_POST['monito_date8']));
 	$cd48= mysql_real_escape_string(htmlspecialchars($_POST['cd48']));
	$vl8=mysql_real_escape_string(htmlspecialchars($_POST['vl8']));
	$reason_4_detectable_vl8=mysql_real_escape_string(htmlspecialchars($_POST['reason_4_detectable_vl8'])); 
	$weight8=mysql_real_escape_string(htmlspecialchars($_POST['weight8'])); 
    
   $monito_date9= mysql_real_escape_string(htmlspecialchars($_POST['monito_date9']));
 	$cd49= mysql_real_escape_string(htmlspecialchars($_POST['cd49']));
	$vl9=mysql_real_escape_string(htmlspecialchars($_POST['vl9']));
	$reason_4_detectable_vl9=mysql_real_escape_string(htmlspecialchars($_POST['reason_4_detectable_vl9'])); 
	$weight9=mysql_real_escape_string(htmlspecialchars($_POST['weight9']));
    
    $monito_date10= mysql_real_escape_string(htmlspecialchars($_POST['monito_date10']));
 	$cd410= mysql_real_escape_string(htmlspecialchars($_POST['cd410']));
	$vl10=mysql_real_escape_string(htmlspecialchars($_POST['vl10']));
	$reason_4_detectable_vl10=mysql_real_escape_string(htmlspecialchars($_POST['reason_4_detectable_vl10'])); 
	$weight10=mysql_real_escape_string(htmlspecialchars($_POST['weight10'])); 
    
   
 if ($monito_date !=""){    
$insert_monitoring=" INSERT  INTO  monitoring (pat_id,monito_date,cd4,vl,reason_4_detectable_vl,weight)
VALUES (
'$patient_id', '$monito_date', '$cd4', '$vl', '$reason_4_detectable_vl', '$weight')";

mysql_query($insert_monitoring, $bd);	
 }
  if ($monito_date2 !=""){           
        $insert_monitoring2=" INSERT  INTO  monitoring (pat_id,monito_date,cd4,vl,reason_4_detectable_vl,weight)
VALUES (
'$patient_id', '$monito_date2', '$cd42', '$vl2', '$reason_4_detectable_vl2', '$weight2')";

mysql_query($insert_monitoring2, $bd);	
        
  }
  if ($monito_date3 !=""){          
        $insert_monitoring3=" INSERT  INTO  monitoring (pat_id,monito_date,cd4,vl,reason_4_detectable_vl,weight)
VALUES (
'$patient_id', '$monito_date3', '$cd43', '$vl3', '$reason_4_detectable_vl3', '$weight3')";

mysql_query($insert_monitoring3, $bd);	
  }
  if ($monito_date4 !=""){         
     $insert_monitoring4=" INSERT  INTO  monitoring (pat_id,monito_date,cd4,vl,reason_4_detectable_vl,weight)
VALUES (
'$patient_id', '$monito_date4', '$cd44', '$vl4', '$reason_4_detectable_vl4', '$weight4')";

mysql_query($insert_monitoring4, $bd);	
     }
  if ($monito_date5 !=""){        
       $insert_monitoring5=" INSERT  INTO  monitoring (pat_id,monito_date,cd4,vl,reason_4_detectable_vl,weight)
VALUES (
'$patient_id', '$monito_date5', '$cd45', '$vl5', '$reason_4_detectable_vl5', '$weight5')";

mysql_query($insert_monitoring5, $bd);	
       
  }
  if ($monito_date6 !=""){         
  $insert_monitoring6=" INSERT  INTO  monitoring (pat_id,monito_date,cd4,vl,reason_4_detectable_vl,weight)
VALUES (
'$patient_id', '$monito_date6', '$cd46', '$vl6', '$reason_4_detectable_vl6', '$weight6')";

mysql_query($insert_monitoring6, $bd);	
       
  }
    
    if ($monito_date7 !=""){         
  $insert_monitoring7=" INSERT  INTO  monitoring (pat_id,monito_date,cd4,vl,reason_4_detectable_vl,weight)
VALUES (
'$patient_id', '$monito_date7', '$cd47', '$vl7', '$reason_4_detectable_vl7', '$weight7')";

mysql_query($insert_monitoring7, $bd);	
       
  }
    
    if ($monito_date8 !=""){         
  $insert_monitoring8=" INSERT  INTO  monitoring (pat_id,monito_date,cd4,vl,reason_4_detectable_vl,weight)
VALUES (
'$patient_id', '$monito_date8', '$cd48', '$vl8', '$reason_4_detectable_vl8', '$weight8')";

mysql_query($insert_monitoring8, $bd);	
       
  }
    
    if ($monito_date9 !=""){         
  $insert_monitoring9=" INSERT  INTO  monitoring (pat_id,monito_date,cd4,vl,reason_4_detectable_vl,weight)
VALUES (
'$patient_id', '$monito_date9', '$cd49', '$vl9', '$reason_4_detectable_vl9', '$weight9')";

mysql_query($insert_monitoring9, $bd);	
       
  }
    
    if ($monito_date10 !=""){         
  $insert_monitoring10=" INSERT  INTO  monitoring (pat_id,monito_date,cd4,vl,reason_4_detectable_vl,weight)
VALUES (
'$patient_id', '$monito_date10', '$cd410', '$vl10', '$reason_4_detectable_vl10', '$weight10')";

mysql_query($insert_monitoring10, $bd);	
       
  }
}

?>