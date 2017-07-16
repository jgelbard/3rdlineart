<?php

if(isset($_POST['update_treatment3'])){ 
	
    $patient_id= mysqli_real_escape_string($bd, $_GET['pat_id']);
    $tb_treat= mysqli_real_escape_string($bd, $_POST['tb_treat']);
    
    $sql_delete_treatment3 = "DELETE FROM  tb_treat where pat_id =$patient_id";
    mysqli_query( $bd,$sql_delete_treatment3);
    
    $sql_delete_tb_treat_regimen1 = "DELETE FROM  tb_treat_regimen1 where pat_id =$patient_id";
    mysqli_query( $bd,$sql_delete_tb_treat_regimen1);
    
    $sql_delete_tb_treat_regimen2 = "DELETE FROM  tb_treat_regimen2 where pat_id =$patient_id";
    mysqli_query( $bd,$sql_delete_tb_treat_regimen2);
    
    $sql_delete_tb_treat_mdr = "DELETE FROM  tb_treat_mdr where pat_id =$patient_id";
    mysqli_query( $bd,$sql_delete_tb_treat_mdr);
    
	
    if (mysqli_query($bd, $sql_delete_treatment3)){
    echo '							
<div class="alert alert-success">
                                                  <button type="button" class="close" data-dismiss="alert">&times;</button>
                                                  <strong>TB treatment updated</strong> 
                           
                           </div>
   ';
    }
    
    
     $insert_tb_treat=" INSERT  INTO  tb_treat (tb_treatment,pat_id)
                VALUES ('$tb_treat', '$patient_id')";

                mysqli_query( $bd,$insert_tb_treat);	

    
    if ($tb_treat=='Yes'){
        
        if(isset($_POST['regimen1_checked'])){
            for ($i=1; $i<=5; $i++) {     
                $reg_name= mysqli_real_escape_string($bd, $_POST['reg'.$i]);
                $tbstart_date=mysqli_real_escape_string($bd, $_POST['tbstart_date'.$i]); 
                $tbstop_date=mysqli_real_escape_string($bd, $_POST['tbstop_date'.$i]); 
                $reason_o_changes=mysqli_real_escape_string($bd, $_POST['reason_o_changes'.$i]);

                $insert_tb_treat_regimen1=" INSERT  INTO  tb_treat_regimen1
                    (pat_id,reg_name,start_date,stop_date,reason_for_change)
                    VALUES (
                    '$patient_id', '$reg_name', '$tbstart_date', '$tbstop_date', '$reason_o_changes')";

                mysqli_query( $bd,$insert_tb_treat_regimen1);
                
            }
/*            
                $reg_name1= mysqli_real_escape_string($bd, $_POST['reg1']);
                $tbstart_date1=mysqli_real_escape_string($bd, $_POST['tbstart_date1']); 
                $tbstop_date1=mysqli_real_escape_string($bd, $_POST['tbstop_date1']); 
                $reason_o_changes1=mysqli_real_escape_string($bd, $_POST['reason_o_changes1']); 
            
                $reg_name12= mysqli_real_escape_string($bd, $_POST['reg12']);
                $tbstart_date12=mysqli_real_escape_string($bd, $_POST['tbstart_date12']); 
                $tbstop_date12=mysqli_real_escape_string($bd, $_POST['tbstop_date12']); 
                $reason_o_changes12=mysqli_real_escape_string($bd, $_POST['reason_o_changes12']); 
              
                $reg_name13= mysqli_real_escape_string($bd, $_POST['reg13']);
                $tbstart_date13=mysqli_real_escape_string($bd, $_POST['tbstart_date13']); 
                $tbstop_date13=mysqli_real_escape_string($bd, $_POST['tbstop_date13']); 
                $reason_o_changes13=mysqli_real_escape_string($bd, $_POST['reason_o_changes13']); 
              
                $reg_name14= mysqli_real_escape_string($bd, $_POST['reg14']);
                $tbstart_date14=mysqli_real_escape_string($bd, $_POST['tbstart_date14']); 
                $tbstop_date14=mysqli_real_escape_string($bd, $_POST['tbstop_date14']); 
                $reason_o_changes14=mysqli_real_escape_string($bd, $_POST['reason_o_changes14']); 
              
                $reg_name15= mysqli_real_escape_string($bd, $_POST['reg15']);
                $tbstart_date15=mysqli_real_escape_string($bd, $_POST['tbstart_date15']); 
                $tbstop_date15=mysqli_real_escape_string($bd, $_POST['tbstop_date15']); 
                $reason_o_changes15=mysqli_real_escape_string($bd, $_POST['reason_o_changes15']); 
              
            $insert_tb_treat_regimen1=" INSERT  INTO  tb_treat_regimen1
                (pat_id,reg_name,start_date,stop_date,reason_for_change)
                VALUES (
                '$patient_id', '$reg_name1', '$tbstart_date1', '$tbstop_date1', '$reason_o_changes1')";

                mysqli_query( $bd,$insert_tb_treat_regimen1);
            
            if ($reg_name12 !='' and $tbstart_date12 != '' and  $tbstop_date12 != ''){
                
            $insert_tb_treat_regimen12=" INSERT  INTO  tb_treat_regimen1
                (pat_id,reg_name,start_date,stop_date,reason_for_change)
                VALUES (
                '$patient_id', '$reg_name12', '$tbstart_date12', '$tbstop_date12', '$reason_o_changes12')";

                mysqli_query( $bd,$insert_tb_treat_regimen12);	
            }
            
            if ($reg_name13 !='' and $tbstart_date13 != '' and  $tbstop_date13 != ''){
                
            $insert_tb_treat_regimen13=" INSERT  INTO  tb_treat_regimen1
                (pat_id,reg_name,start_date,stop_date,reason_for_change)
                VALUES (
                '$patient_id', '$reg_name13', '$tbstart_date13', '$tbstop_date13', '$reason_o_changes13')";

                mysqli_query( $bd,$insert_tb_treat_regimen13);	
            }
            
            if ($reg_name14 !='' and $tbstart_date14 != '' and  $tbstop_date14 != ''){
                
            $insert_tb_treat_regimen14=" INSERT  INTO  tb_treat_regimen1
                (pat_id,reg_name,start_date,stop_date,reason_for_change)
                VALUES (
                '$patient_id', '$reg_name14', '$tbstart_date14', '$tbstop_date14', '$reason_o_changes14')";

                mysqli_query( $bd,$insert_tb_treat_regimen14);	
            }
            
            if ($reg_name15 !='' and $tbstart_date15 != '' and  $tbstop_date15 != ''){
                
            $insert_tb_treat_regimen15=" INSERT  INTO  tb_treat_regimen1
                (pat_id,reg_name,start_date,stop_date,reason_for_change)
                VALUES (
                '$patient_id', '$reg_name15', '$tbstart_date15', '$tbstop_date15', '$reason_o_changes15')";

                mysqli_query( $bd,$insert_tb_treat_regimen15);	
            }
*/         
    }
        if(isset($_POST['regimen2_checked'])){ 
     		$arr = array(2, 22, 23, 24, 25);
            foreach ($arr as $i) {

                $reg_name2= mysqli_real_escape_string($bd, $_POST['reg2']);
                $tbstart_date2=mysqli_real_escape_string($bd, $_POST['tbstart_date2']); 
                $tbstop_date2=mysqli_real_escape_string($bd, $_POST['tbstop_date2']); 
                $reason_o_changes2=mysqli_real_escape_string($bd, $_POST['reason_o_changes2']);
     
                $insert_tb_treat_regimen2=" INSERT  INTO  tb_treat_regimen2
                (pat_id,reg_name,start_date,stop_date,reason_for_change)
                VALUES (
                '$patient_id', '$reg_name2', '$tbstart_date2', '$tbstop_date2', '$reason_o_changes2')";

                mysqli_query( $bd,$insert_tb_treat_regimen2);
            }
/*        
                $reg_name2= mysqli_real_escape_string($bd, $_POST['reg2']);
                $tbstart_date2=mysqli_real_escape_string($bd, $_POST['tbstart_date2']); 
                $tbstop_date2=mysqli_real_escape_string($bd, $_POST['tbstop_date2']); 
                $reason_o_changes2=mysqli_real_escape_string($bd, $_POST['reason_o_changes2']);
            
                $reg_name22= mysqli_real_escape_string($bd, $_POST['reg22']);
                $tbstart_date22=mysqli_real_escape_string($bd, $_POST['tbstart_date22']); 
                $tbstop_date22=mysqli_real_escape_string($bd, $_POST['tbstop_date22']); 
                $reason_o_changes22=mysqli_real_escape_string($bd, $_POST['reason_o_changes22']);
            
                $reg_name23= mysqli_real_escape_string($bd, $_POST['reg23']);
                $tbstart_date23=mysqli_real_escape_string($bd, $_POST['tbstart_date23']); 
                $tbstop_date23=mysqli_real_escape_string($bd, $_POST['tbstop_date23']); 
                $reason_o_changes23=mysqli_real_escape_string($bd, $_POST['reason_o_changes23']);
            
                $reg_name24= mysqli_real_escape_string($bd, $_POST['reg24']);
                $tbstart_date24=mysqli_real_escape_string($bd, $_POST['tbstart_date24']); 
                $tbstop_date24=mysqli_real_escape_string($bd, $_POST['tbstop_date24']); 
                $reason_o_changes24=mysqli_real_escape_string($bd, $_POST['reason_o_changes24']);
            
                $reg_name25= mysqli_real_escape_string($bd, $_POST['reg25']);
                $tbstart_date25=mysqli_real_escape_string($bd, $_POST['tbstart_date25']); 
                $tbstop_date25=mysqli_real_escape_string($bd, $_POST['tbstop_date25']); 
                $reason_o_changes25=mysqli_real_escape_string($bd, $_POST['reason_o_changes25']);
            
            $insert_tb_treat_regimen2=" INSERT  INTO  tb_treat_regimen2
                (pat_id,reg_name,start_date,stop_date,reason_for_change)
                VALUES (
                '$patient_id', '$reg_name2', '$tbstart_date2', '$tbstop_date2', '$reason_o_changes2')";

                mysqli_query( $bd,$insert_tb_treat_regimen2);
            
             if ($reg_name22 !='' and $tbstart_date22 != '' and  $tbstop_date22 != ''){
            
            $insert_tb_treat_regimen22=" INSERT  INTO  tb_treat_regimen2
                (pat_id,reg_name,start_date,stop_date,reason_for_change)
                VALUES (
                '$patient_id', '$reg_name22', '$tbstart_date22', '$tbstop_date22', '$reason_o_changes22')";

                mysqli_query( $bd,$insert_tb_treat_regimen22);
             } 
             if ($reg_name23 !='' and $tbstart_date23 != '' and  $tbstop_date23 != ''){
            
            $insert_tb_treat_regimen23=" INSERT  INTO  tb_treat_regimen2
                (pat_id,reg_name,start_date,stop_date,reason_for_change)
                VALUES (
                '$patient_id', '$reg_name23', '$tbstart_date23', '$tbstop_date23', '$reason_o_changes23')";

                mysqli_query( $bd,$insert_tb_treat_regimen23);
             } 
             if ($reg_name24 !='' and $tbstart_date24 != '' and  $tbstop_date24 != ''){
            
            $insert_tb_treat_regimen24=" INSERT  INTO  tb_treat_regimen2
                (pat_id,reg_name,start_date,stop_date,reason_for_change)
                VALUES (
                '$patient_id', '$reg_name24', '$tbstart_date24', '$tbstop_date24', '$reason_o_changes24')";

                mysqli_query( $bd,$insert_tb_treat_regimen24);
             } 
             if ($reg_name25 !='' and $tbstart_date25 != '' and  $tbstop_date25 != ''){
            
            $insert_tb_treat_regimen25=" INSERT  INTO  tb_treat_regimen2
                (pat_id,reg_name,start_date,stop_date,reason_for_change)
                VALUES (
                '$patient_id', '$reg_name25', '$tbstart_date25', '$tbstop_date25', '$reason_o_changes25')";

                mysqli_query( $bd,$insert_tb_treat_regimen25);
             }
*/          
    }
        if(isset($_POST['mdr_checked'])){ 
            for($i=0; $i<=5; $i++) {
                $mdr= mysqli_real_escape_string($bd, $_POST['mdr'.$i]);
                $tbstart_date_mdr=mysqli_real_escape_string($bd, $_POST['tbstart_date_mdr'.$i]); 
                $tbstop_date_mdr=mysqli_real_escape_string($bd, $_POST['tbstop_date_mdr'.$i]); 
                $reason_o_changes_mdr=mysqli_real_escape_string($bd, $_POST['reason_o_changes_mdr'.$i]);

                $insert_tb_treat_mdr="INSERT INTO tb_treat_mdr
                          (pat_id,reg_name,start_date,stop_date,reason_for_change)
                          VALUES (
                          '$patient_id', '$mdr', '$tbstart_date_mdr', '$tbstop_date_mdr', '$reason_o_changes_mdr')";

                mysqli_query( $bd,$insert_tb_treat_mdr);
                
            }
/*            
                $mdr= mysqli_real_escape_string($bd, $_POST['mdr1']);
                $tbstart_date_mdr=mysqli_real_escape_string($bd, $_POST['tbstart_date_mdr1']); 
                $tbstop_date_mdr=mysqli_real_escape_string($bd, $_POST['tbstop_date_mdr1']); 
                $reason_o_changes_mdr=mysqli_real_escape_string($bd, $_POST['reason_o_changes_mdr1']);
             
                $mdr2= mysqli_real_escape_string($bd, $_POST['mdr2']);
                $tbstart_date_mdr2=mysqli_real_escape_string($bd, $_POST['tbstart_date_mdr2']); 
                $tbstop_date_mdr2=mysqli_real_escape_string($bd, $_POST['tbstop_date_mdr2']); 
                $reason_o_changes_mdr2=mysqli_real_escape_string($bd, $_POST['reason_o_changes_mdr2']);
            
                $mdr3= mysqli_real_escape_string($bd, $_POST['mdr3']);
                $tbstart_date_mdr3=mysqli_real_escape_string($bd, $_POST['tbstart_date_mdr3']); 
                $tbstop_date_mdr3=mysqli_real_escape_string($bd, $_POST['tbstop_date_mdr3']); 
                $reason_o_changes_mdr3=mysqli_real_escape_string($bd, $_POST['reason_o_changes_mdr3']);
            
                $mdr4= mysqli_real_escape_string($bd, $_POST['mdr4']);
                $tbstart_date_mdr4=mysqli_real_escape_string($bd, $_POST['tbstart_date_mdr4']); 
                $tbstop_date_mdr4=mysqli_real_escape_string($bd, $_POST['tbstop_date_mdr4']); 
                $reason_o_changes_mdr4=mysqli_real_escape_string($bd, $_POST['reason_o_changes_mdr4']);
            
                $mdr5= mysqli_real_escape_string($bd, $_POST['mdr5']);
                $tbstart_date_mdr5=mysqli_real_escape_string($bd, $_POST['tbstart_date_mdr5']); 
                $tbstop_date_mdr5=mysqli_real_escape_string($bd, $_POST['tbstop_date_mdr5']); 
                $reason_o_changes_mdr5=mysqli_real_escape_string($bd, $_POST['reason_o_changes_mdr5']);
            
            $insert_tb_treat_mdr=" INSERT  INTO  tb_treat_mdr
                (pat_id,reg_name,start_date,stop_date,reason_for_change)
                VALUES (
                '$patient_id', '$mdr', '$tbstart_date_mdr', '$tbstop_date_mdr', '$reason_o_changes_mdr')";

                mysqli_query( $bd,$insert_tb_treat_mdr);
            
             if ($mdr2 !='' and $tbstart_date_mdr2 != '' and  $tbstop_date_mdr2 != ''){
             
            $insert_tb_treat_mdr2=" INSERT  INTO  tb_treat_mdr
                (pat_id,reg_name,start_date,stop_date,reason_for_change)
                VALUES (
                '$patient_id', '$mdr2', '$tbstart_date_mdr2', '$tbstop_date_mdr2', '$reason_o_changes_mdr2')";

                mysqli_query( $bd,$insert_tb_treat_mdr2);
             
             }
      
             if ($mdr3 !='' and $tbstart_date_mdr3 != '' and  $tbstop_date_mdr3 != ''){
             
            $insert_tb_treat_mdr3=" INSERT  INTO  tb_treat_mdr
                (pat_id,reg_name,start_date,stop_date,reason_for_change)
                VALUES (
                '$patient_id', '$mdr3', '$tbstart_date_mdr3', '$tbstop_date_mdr3', '$reason_o_changes_mdr3')";

                mysqli_query( $bd,$insert_tb_treat_mdr3);
             
             }
      
             if ($mdr4 !='' and $tbstart_date_mdr4 != '' and  $tbstop_date_mdr4 != ''){
             
            $insert_tb_treat_mdr4=" INSERT  INTO  tb_treat_mdr
                (pat_id,reg_name,start_date,stop_date,reason_for_change)
                VALUES (
                '$patient_id', '$mdr4', '$tbstart_date_mdr4', '$tbstop_date_mdr4', '$reason_o_changes_mdr4')";

                mysqli_query( $bd,$insert_tb_treat_mdr4);
             
             }
      
             if ($mdr5 !='' and $tbstart_date_mdr5 != '' and  $tbstop_date_mdr5 != ''){
             
            $insert_tb_treat_mdr5=" INSERT  INTO  tb_treat_mdr
                (pat_id,reg_name,start_date,stop_date,reason_for_change)
                VALUES (
                '$patient_id', '$mdr5', '$tbstart_date_mdr5', '$tbstop_date_mdr5', '$reason_o_changes_mdr5')";

                mysqli_query( $bd,$insert_tb_treat_mdr5);
             
             }
*/  
    }
  

    /* $reg11= mysqli_real_escape_string($bd, $_POST['reg11']);
 	$reg21= mysqli_real_escape_string($bd, $_POST['reg21']);
	$mdr1=mysqli_real_escape_string($bd, $_POST['mdr1']);
	$tbstart_date1=mysqli_real_escape_string($bd, $_POST['tbstart_date1']); 
	$tbstop_date1=mysqli_real_escape_string($bd, $_POST['tbstop_date1']); 
	$reason_o_changes1=mysqli_real_escape_string($bd, $_POST['reason_o_changes1']); 
    
  
$insert_tb_treatment=" INSERT  INTO  tb_treatment (pat_id,reg1,reg2,mdr,start_date,stop_date,reason_o_changes)
VALUES (
'$patient_id', '$reg11', '$reg21', '$mdr1', '$tbstart_date1', '$tbstop_date1', '$reason_o_changes1')";

mysqli_query( $bd,$insert_tb_treatment);	*/
        
    }
    
  
  
}

?>