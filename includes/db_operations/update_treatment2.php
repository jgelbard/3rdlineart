<?php

if(isset($_POST['update_treatment2'])){ 
	
    $patient_id= mysqli_real_escape_string(htmlspecialchars($_GET['pat_id']));
    
    $sql_delete_treatment2 = "DELETE FROM monitoring where pat_id =$patient_id";
    
    mysqli_query( $bd,$sql_delete_treatment2);
	
    if (mysqli_query($sql_delete_treatment2, $bd)){
    echo '							
<div class="alert alert-success">
                                                  <button type="button" class="close" data-dismiss="alert">&times;</button>
                                                  <strong>CD4 &VL Monitoring updated</strong> 
                           
                           </div>
   ';
    }
    
    
    
    $monito_date= mysqli_real_escape_string(htmlspecialchars($_POST['monito_date']));
 	$cd4= mysqli_real_escape_string(htmlspecialchars($_POST['cd4']));
	$vl=mysqli_real_escape_string(htmlspecialchars($_POST['vl']));
	$reason_4_detectable_vl=mysqli_real_escape_string(htmlspecialchars($_POST['reason_4_detectable_vl'])); 
	$weight=mysqli_real_escape_string(htmlspecialchars($_POST['weight'])); 
    
    $monito_date2= mysqli_real_escape_string(htmlspecialchars($_POST['monito_date2']));
 	$cd42= mysqli_real_escape_string(htmlspecialchars($_POST['cd42']));
	$vl2=mysqli_real_escape_string(htmlspecialchars($_POST['vl2']));
	$reason_4_detectable_vl2=mysqli_real_escape_string(htmlspecialchars($_POST['reason_4_detectable_vl2'])); 
	$weight2=mysqli_real_escape_string(htmlspecialchars($_POST['weight2'])); 
    
    $monito_date3= mysqli_real_escape_string(htmlspecialchars($_POST['monito_date3']));
 	$cd43= mysqli_real_escape_string(htmlspecialchars($_POST['cd43']));
	$vl3=mysqli_real_escape_string(htmlspecialchars($_POST['vl3']));
	$reason_4_detectable_vl3=mysqli_real_escape_string(htmlspecialchars($_POST['reason_4_detectable_vl3'])); 
	$weight3=mysqli_real_escape_string(htmlspecialchars($_POST['weight3'])); 
    
    $monito_date4= mysqli_real_escape_string(htmlspecialchars($_POST['monito_date4']));
 	$cd44= mysqli_real_escape_string(htmlspecialchars($_POST['cd44']));
	$vl4=mysqli_real_escape_string(htmlspecialchars($_POST['vl4']));
	$reason_4_detectable_vl4=mysqli_real_escape_string(htmlspecialchars($_POST['reason_4_detectable_vl4'])); 
	$weight4=mysqli_real_escape_string(htmlspecialchars($_POST['weight4'])); 
    
    $monito_date5= mysqli_real_escape_string(htmlspecialchars($_POST['monito_date5']));
 	$cd45= mysqli_real_escape_string(htmlspecialchars($_POST['cd45']));
	$vl5=mysqli_real_escape_string(htmlspecialchars($_POST['vl5']));
	$reason_4_detectable_vl5=mysqli_real_escape_string(htmlspecialchars($_POST['reason_4_detectable_vl5'])); 
	$weight5=mysqli_real_escape_string(htmlspecialchars($_POST['weight5'])); 
    
    $monito_date6= mysqli_real_escape_string(htmlspecialchars($_POST['monito_date6']));
 	$cd46= mysqli_real_escape_string(htmlspecialchars($_POST['cd46']));
	$vl6=mysqli_real_escape_string(htmlspecialchars($_POST['vl6']));
	$reason_4_detectable_vl6=mysqli_real_escape_string(htmlspecialchars($_POST['reason_4_detectable_vl6'])); 
	$weight6=mysqli_real_escape_string(htmlspecialchars($_POST['weight6'])); 
    
    $monito_date7= mysqli_real_escape_string(htmlspecialchars($_POST['monito_date7']));
 	$cd47= mysqli_real_escape_string(htmlspecialchars($_POST['cd47']));
	$vl7=mysqli_real_escape_string(htmlspecialchars($_POST['vl7']));
	$reason_4_detectable_vl7=mysqli_real_escape_string(htmlspecialchars($_POST['reason_4_detectable_vl7'])); 
	$weight7=mysqli_real_escape_string(htmlspecialchars($_POST['weight7'])); 
    
    $monito_date8= mysqli_real_escape_string(htmlspecialchars($_POST['monito_date8']));
 	$cd48= mysqli_real_escape_string(htmlspecialchars($_POST['cd48']));
	$vl8=mysqli_real_escape_string(htmlspecialchars($_POST['vl8']));
	$reason_4_detectable_vl8=mysqli_real_escape_string(htmlspecialchars($_POST['reason_4_detectable_vl8'])); 
	$weight8=mysqli_real_escape_string(htmlspecialchars($_POST['weight8'])); 
    
   $monito_date9= mysqli_real_escape_string(htmlspecialchars($_POST['monito_date9']));
 	$cd49= mysqli_real_escape_string(htmlspecialchars($_POST['cd49']));
	$vl9=mysqli_real_escape_string(htmlspecialchars($_POST['vl9']));
	$reason_4_detectable_vl9=mysqli_real_escape_string(htmlspecialchars($_POST['reason_4_detectable_vl9'])); 
	$weight9=mysqli_real_escape_string(htmlspecialchars($_POST['weight9']));
    
    $monito_date10= mysqli_real_escape_string(htmlspecialchars($_POST['monito_date10']));
 	$cd410= mysqli_real_escape_string(htmlspecialchars($_POST['cd410']));
	$vl10=mysqli_real_escape_string(htmlspecialchars($_POST['vl10']));
	$reason_4_detectable_vl10=mysqli_real_escape_string(htmlspecialchars($_POST['reason_4_detectable_vl10'])); 
	$weight10=mysqli_real_escape_string(htmlspecialchars($_POST['weight10'])); 
    
   
 if ($monito_date !=""){    
$insert_monitoring=" INSERT  INTO  monitoring (pat_id,monito_date,cd4,vl,reason_4_detectable_vl,weight)
VALUES (
'$patient_id', '$monito_date', '$cd4', '$vl', '$reason_4_detectable_vl', '$weight')";

mysqli_query( $bd,$insert_monitoring);	
 }
  if ($monito_date2 !=""){           
        $insert_monitoring2=" INSERT  INTO  monitoring (pat_id,monito_date,cd4,vl,reason_4_detectable_vl,weight)
VALUES (
'$patient_id', '$monito_date2', '$cd42', '$vl2', '$reason_4_detectable_vl2', '$weight2')";

mysqli_query( $bd,$insert_monitoring2);	
        
  }
  if ($monito_date3 !=""){          
        $insert_monitoring3=" INSERT  INTO  monitoring (pat_id,monito_date,cd4,vl,reason_4_detectable_vl,weight)
VALUES (
'$patient_id', '$monito_date3', '$cd43', '$vl3', '$reason_4_detectable_vl3', '$weight3')";

mysqli_query( $bd,$insert_monitoring3);	
  }
  if ($monito_date4 !=""){         
     $insert_monitoring4=" INSERT  INTO  monitoring (pat_id,monito_date,cd4,vl,reason_4_detectable_vl,weight)
VALUES (
'$patient_id', '$monito_date4', '$cd44', '$vl4', '$reason_4_detectable_vl4', '$weight4')";

mysqli_query( $bd,$insert_monitoring4);	
     }
  if ($monito_date5 !=""){        
       $insert_monitoring5=" INSERT  INTO  monitoring (pat_id,monito_date,cd4,vl,reason_4_detectable_vl,weight)
VALUES (
'$patient_id', '$monito_date5', '$cd45', '$vl5', '$reason_4_detectable_vl5', '$weight5')";

mysqli_query( $bd,$insert_monitoring5);	
       
  }
  if ($monito_date6 !=""){         
  $insert_monitoring6=" INSERT  INTO  monitoring (pat_id,monito_date,cd4,vl,reason_4_detectable_vl,weight)
VALUES (
'$patient_id', '$monito_date6', '$cd46', '$vl6', '$reason_4_detectable_vl6', '$weight6')";

mysqli_query( $bd,$insert_monitoring6);	
       
  }
    
    if ($monito_date7 !=""){         
  $insert_monitoring7=" INSERT  INTO  monitoring (pat_id,monito_date,cd4,vl,reason_4_detectable_vl,weight)
VALUES (
'$patient_id', '$monito_date7', '$cd47', '$vl7', '$reason_4_detectable_vl7', '$weight7')";

mysqli_query( $bd,$insert_monitoring7);	
       
  }
    
    if ($monito_date8 !=""){         
  $insert_monitoring8=" INSERT  INTO  monitoring (pat_id,monito_date,cd4,vl,reason_4_detectable_vl,weight)
VALUES (
'$patient_id', '$monito_date8', '$cd48', '$vl8', '$reason_4_detectable_vl8', '$weight8')";

mysqli_query( $bd,$insert_monitoring8);	
       
  }
    
    if ($monito_date9 !=""){         
  $insert_monitoring9=" INSERT  INTO  monitoring (pat_id,monito_date,cd4,vl,reason_4_detectable_vl,weight)
VALUES (
'$patient_id', '$monito_date9', '$cd49', '$vl9', '$reason_4_detectable_vl9', '$weight9')";

mysqli_query( $bd,$insert_monitoring9);	
       
  }
    
    if ($monito_date10 !=""){         
  $insert_monitoring10=" INSERT  INTO  monitoring (pat_id,monito_date,cd4,vl,reason_4_detectable_vl,weight)
VALUES (
'$patient_id', '$monito_date10', '$cd410', '$vl10', '$reason_4_detectable_vl10', '$weight10')";

mysqli_query( $bd,$insert_monitoring10);	
       
  }
}

?>