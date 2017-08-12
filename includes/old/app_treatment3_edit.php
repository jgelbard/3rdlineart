
<h2 style="background-color:#f8f7f7; text-align:center"> TB Treatment</h2>
<!--   <hr style=" border: 2px solid #1c952f;" />  --> 
<?php

global $pat_id;
$pat_id= $_GET['pat_id'];
/*echo $pat_id;*/

$patient=mysqli_query( $bd,"SELECT * FROM patient where id='$pat_id' "); 
$row_pat=mysqli_fetch_array($patient);

$art_id_num =$row_pat['art_id_num'];
$firstname =$row_pat['firstname'];
$lastname =$row_pat['lastname'];
$gender =$row_pat['gender'];
$dob =$row_pat['dob'];
$vl_sample_id =$row_pat['vl_sample_id'];

$client_name = $firstname.' '.$lastname;

$tb_treatment ="";
//tb_treat
$tb_treat = mysqli_query( $bd,"SELECT * FROM tb_treat where pat_id='$pat_id' "); 
while ( $row_tb_treat=mysqli_fetch_array($tb_treat)){

	$tb_treatment =$row_tb_treat['tb_treatment'];
}

//tb_treat_regimen1
$tb_treat_regimen1=mysqli_query( $bd,"SELECT * FROM tb_treat_regimen1 where pat_id='$pat_id' "); 
while ( $row_tb_treat_regimen1=mysqli_fetch_array($tb_treat_regimen1)){

	$reg1_name [] =$row_tb_treat_regimen1['reg_name'];
	$start_date1 [] =$row_tb_treat_regimen1['start_date'];
	$stop_date1 [] =$row_tb_treat_regimen1['stop_date'];
	$reason_for_change1 [] =$row_tb_treat_regimen1['reason_for_change'];
}

//tb_treat_regimen2
$tb_treat_regimen2=mysqli_query( $bd,"SELECT * FROM tb_treat_regimen2 where pat_id='$pat_id' "); 
while ( $row_tb_treat_regimen2=mysqli_fetch_array($tb_treat_regimen2)){

	$reg2_name []=$row_tb_treat_regimen2['reg_name'];
	$start_date2 [] =$row_tb_treat_regimen2['start_date'];
	$stop_date2 [] =$row_tb_treat_regimen2['stop_date'];
	$reason_for_change2 [] =$row_tb_treat_regimen2['reason_for_change'];


}


//tb_treat_MDR
$tb_treat_mdr=mysqli_query( $bd,"SELECT * FROM tb_treat_mdr where pat_id='$pat_id' "); 
while ( $row_tb_treat_mdr=mysqli_fetch_array($tb_treat_mdr)){

	$reg3_name []=$row_tb_treat_mdr['reg_name'];
	$start_date3 [] =$row_tb_treat_mdr['start_date'];
	$stop_date3 [] =$row_tb_treat_mdr['stop_date'];
	$reason_for_change3 [] =$row_tb_treat_mdr['reason_for_change'];

}

echo '
<form id="edit-profile" class="form-horizontal" action="app.php?pat_id='.$pat_id.'" method="post">

	';
	?> 

	<h3>Client Name: <strong><i style="background-color:#f8f7f7; color:red"><?php echo $client_name; ?></i></strong></h3>

	<input type="hidden" name="pat_id" value="<?php echo $pat_id; ?>" style="background-color:#fff; border:none; height:20px; color:#fff; position:relative; top:-300px;"/>
	<input type="hidden" name="dob" value="<?php echo $dob; ?>" style="background-color:#fff; border:none; height:20px; color:#fff; position:relative; top:-300px;" /> 

	<script type="text/javascript">
		$(document).ready(function(){
			$('input[type="radio"]').click(function(){
				if($(this).attr("value")=="Yes"){
					$(".box").not(".yes").hide();
					$(".yes").show();
				}
				if($(this).attr("value")=="No"){
					$(".box").not(".no").hide();
					$(".no").show();
				}

			});
		});

	</script>

    <!-- <hr style=" border: 1px solid #cbe509;" />
    <h3>TB Treatment</h3>-->
    <fieldset>
    	<div style="width:110px; float:left" class="radio_sty">

    		<input type="radio" id="tb_treat-yes" name="tb_treat" value="Yes"  <?php if ($tb_treatment =='Yes'){echo 'checked="checked"'; } ?> >
    		<label for="tb_treat-yes">Yes</label>

    		<div class="check">
    		</div>
    	</div>
    	<div style="width:100px; float:left" class="radio_sty">
    		<input type="radio" id="tb_treat-no" name="tb_treat" value="No"  <?php if ($tb_treatment =='No'){echo 'checked="checked"'; } ?> >
    		<label for="tb_treat-no">No</label>

    		<div class="check">
    		</div>
    	</div>

    	<div class="yes box">
    		<table style="width:90%" border="0">
    			<thead>
    				<tr>
    					<th><label><input type="checkbox" name="regimen1_checked" value="red"> Regimen 1</label></th>
    					<th><label><input type="checkbox" name="regimen2_checked" value="green"> Regimen 2</label>   </th>
    					<th><label><input type="checkbox" name="mdr_checked" value="blue"> MDR</label>  </th>
    				</tr>             

    			</thead>
    			<tbody>
    				<tr style="background-color:#cb9112; font-size:112%; font-weight:300; color:#000">
    					<td> </td>
    					<td> Regimen Drug </td>
     					<td> Start Date</td>
    					<td> Stop Date</td>
    					<td> Reason for changes (toxicities?)</td>
    					<td> </td>
    				</tr>
    				<script type="text/javascript">
    					$(document).ready(function(){
    						$('input[type="checkbox"]').click(function(){
    							if($(this).attr("value")=="red"){
    								$(".red").toggle();
    							}
    							if($(this).attr("value")=="green"){
    								$(".green").toggle();
    							}
    							if($(this).attr("value")=="blue"){
    								$(".blue").toggle();
    							}
    						});
    					});
    				</script>
    				<script type="text/javascript">
    					$(document).ready(function(){
    						$('input[type="button"]').click(function(){
<?php
$colors = ["red", "green", "blue"];
$js = '';

for($regimen=1; $regimen<=3; $regimen++) {
    $regnamecl = $regimen<3 ? "r$regimen" : 'mdr_';
    $regname = $regimen<3 ? "$regimen" : 'mdr_';
    $regrow = 0;

    for ($col=0; $col<5; $col++) {
        $cols = $col ? $col : '';
        // $datepicker_2 = $datepicker + 1;
        $color = $colors[$regimen-1];

        $regrowp1 = $regrow+1;
        $regrowp2 = $regrowp1+1;
        $cols_1 = $col-1 ? $col-1 : '';

        $regrow1 = $regnamecl.'+row'.($regrowp1);
        $regrow2 = $regnamecl.'-row'.($regrow); // was $regname-1
        
        if ($regrow < 4) {
            $js += "\nif($(this).attr(\"name\")==\"$regnamecl+row$regrowp1\"){
                 $(\".$regnamecl"."row$regrowp1\").show();
                 $(\".$regnamecl"."butts$cols\").hide();
                 $(\".$regnamecl"."butts$regrowp1\").show();
            }";
        }
        if ($regrow > 0) {
            $js += "\nif($(this).attr(\"name\")==\"$regnamecl-row$regrow\"){
                $(\".$regnamecl"."row$regrow\").hide();
                $(\".$regnamecl"."butts$cols_1\").show();".
                ($regrow < 4 ? "\n\t$(\".$regnamecl"."butts$regrowp1\").hide();":"").
            "\n}";
        }
        $regrow++;
    }
}
?>
/*                         
if($(this).attr("name")=="r1+row1"){
                $(".r1row1").show();
                $(".r1butts").hide();
                $(".r1butts1").show();                
}

if($(this).attr("name")=="r1+row2"){  
                $(".r1row2").show();    
                $(".r1butts1").hide();
                $(".r1butts2").show();
}
if($(this).attr("name")=="r1-row1"){
                $(".r1row1").hide();
                $(".r1butts").show();
                $(".r1butts2").hide();
            }

if($(this).attr("name")=="r1+row3"){
                $(".r1row3").show();
                $(".r1butts2").hide();
                $(".r1butts3").show();
}
if($(this).attr("name")=="r1-row2"){
                $(".r1row2").hide();
                $(".r1butts1").show();
                $(".r1butts3").hide();
            }

if($(this).attr("name")=="r1+row4"){
                $(".r1row4").show();    
                $(".r1butts3").hide();
                $(".r1butts4").show();
}
if($(this).attr("name")=="r1-row3"){
                $(".r1row3").hide();
                $(".r1butts2").show();
                $(".r1butts4").hide();
            }

if($(this).attr("name")=="r1-row4"){
                $(".r1row4").hide();
                $(".r1butts3").show();
            }


if($(this).attr("name")=="r2+row1"){
                $(".sec2").not(".row1").hide();  // was sec1
                $(".r2row1").show();
}
if($(this).attr("name")=="r2+row2"){
                $(".sec2").not(".row2").hide();
                $(".r2row2").show();
                $(".r2sec1").hide();
                $(".r2sec2").show();
}
if($(this).attr("name")=="r2-row1"){
                $(".r2row1").hide();
                $(".sec2").show();  // was sec1
            }
if($(this).attr("name")=="r2+row3"){
                $(".sec3").not(".row3").hide();
                $(".r2row3").show();
                $(".r2sec2").hide();
                $(".r2sec3").show();
}
if($(this).attr("name")=="r2-row2"){
                $(".r2row2").hide();
                $(".r2sec1").show();
            }
if($(this).attr("name")=="r2+row4"){
                $(".sec4").not(".row4").hide();
                $(".r2row4").show();
                $(".r2sec3").hide();
                $(".r2sec4").show();
}
if($(this).attr("name")=="r2-row3"){
                $(".r2row3").hide();
                $(".r2sec2").show();
            }
if($(this).attr("name")=="r2-row4"){
                $(".r2row4").hide();
                $(".r2sec3").show();
            }
*/
/*
if($(this).attr("name")=="mdr_+row1"){
                $(".sec1").not(".row1").hide();
                $(".mdr_row1").show();
}
if($(this).attr("name")=="mdr_+row2"){
                $(".sec2").not(".row2").hide();
                $(".mdr_row2").show();
                $(".mdr_sec1").hide();
                $(".mdr_sec2").show();
}
if($(this).attr("name")=="mdr_-row1"){
                $(".mdr_row1").hide();
                $(".sec1").show();
            }
if($(this).attr("name")=="mdr_+row3"){
                $(".sec3").not(".row3").hide();
                $(".mdr_row3").show();
                $(".mdr_sec2").hide();
                $(".mdr_sec3").show();
}
if($(this).attr("name")=="mdr_-row2"){
                $(".mdr_row2").hide();
                $(".mdr_sec1").show();
            }
if($(this).attr("name")=="mdr_+row4"){
                $(".sec4").not(".row4").hide();
                $(".mdr_row4").show();
                $(".mdr_sec3").hide();
                $(".mdr_sec4").show();
}
if($(this).attr("name")=="mdr_-row3"){
                $(".mdr_row3").hide();
                $(".mdr_sec2").show();
            }
if($(this).attr("name")=="mdr_-row4"){
                $(".mdr_row4").hide();
                $(".mdr_sec3").show();
            }

/***********
                                if($(this).attr("name")=="r1+row1"){
    								$(".sec1").not(".row1").hide();
    								$(".r1row1").show();
    							}
                                
    							if($(this).attr("name")=="r1+row2"){
    								$(".sec2").not(".row2").hide();
                                    $(".r1sec1").hide();
                                    $(".r1sec2").show();
    								$(".r1row2").show();
    							}
                                if($(this).attr("name")=="r1-row1"){
                                    $(".r1row1").hide();
    								$(".sec1").show();
                                }
                                
    							if($(this).attr("name")=="r1+row3"){
    								$(".sec3").not(".row3").hide();
                                    $(".r1sec2").hide();
                                    $(".r1sec3").show();
    								$(".r1row3").show();
    							}
                                if($(this).attr("name")=="r1-row2"){
                                    $(".r1row2").hide();
    								$(".r1sec1").show();
                                }
                                
    							if($(this).attr("name")=="r1+row4"){
    								$(".sec4").not(".row4").hide();
                                    $(".r1sec3").hide();
                                    $(".r1sec4").show();
    								$(".r1row4").show();
    							}
                                if($(this).attr("name")=="r1-row3"){
                                    $(".r1row3").hide();
    								$(".r1sec2").show();
                                }

                                if($(this).attr("name")=="r1-row4"){
                                    $(".r1row4").hide();
    								$(".r1sec3").show();
                                }
                                ***************/

/*
    							if($(this).attr("name")=="row1"){
    								$(".sec1").not(".row1").hide();
    								$(".row1").show();
    							}
    							if($(this).attr("name")=="row2"){
    								$(".sec2").not(".row2").hide();
    								$(".r1row1").show();

    							}
    							if($(this).attr("name")=="r1row2"){
    								$(".r1sec2").not(".r1row2").hide();
    								$(".r1row4").not(".r1row2").hide();
    								$(".r1sec3").show();
    								$(".r1row2").show();

    							} 
    							if($(this).attr("name")=="r1row1"){
    								$(".r1row2").not(".r1row1").hide();
    								$(".r1row3").not(".r1row1").hide();
    								$(".r1row4").not(".r1row1").hide();
    								$(".r1sec2").show();
    								$(".r1row1").show();

    							} 
    							if($(this).attr("name")=="r1row0"){
    								$(".r1row1").not(".r1row0").hide();
    								$(".r1row2").not(".r1row0").hide();
    								$(".r1row3").not(".r1row0").hide();
    								$(".r1row4").not(".r1row0").hide();
    								$(".sec2").show();
    								$(".row1").show();

    							}
    							if($(this).attr("name")=="row0"){
    								$(".row1").not(".row0").hide();
    								$(".r1row1").not(".row0").hide();
    								$(".r1row2").not(".row0").hide();
    								$(".r1row3").not(".row0").hide();
    								$(".r1row4").not(".row0").hide();
    								$(".sec1").show();
    								$(".red").show();

    							}
    							if($(this).attr("name")=="r1row3"){
    								$(".r1sec3").not(".r1row3").hide();
    								$(".r1row5").not(".r1row3").hide();
    								$(".r1row4").show();

    							}

       if($(this).attr("name")=="r2row1"){
       	$(".sec3").not(".r2row1").hide();
       	$(".r2row2").not(".r2row1").hide();
       	$(".r2sec1").show();
       	$(".r2row1").show();

       }  
       if($(this).attr("name")=="green"){
       	$(".sec3").not(".green").hide();
       	$(".r2row1").not(".green").hide();
       	$(".r2row2").not(".green").hide();
       	$(".sec3").show();
       	$(".green").show();

       }  

       if($(this).attr("name")=="r2row2"){
       	$(".sec3").not(".r2row2").hide();
       	$(".r2sec1").not(".r2row2").hide();
       	$(".r2row3").not(".r2row2").hide();
       	$(".r2sec2").show();
       	$(".r2row2").show();

       } 

       if($(this).attr("name")=="r2row3"){
       	$(".sec3").not(".r2row3").hide();
       	$(".r2sec1").not(".r2row3").hide();
       	$(".r2sec2").not(".r2row3").hide();
       	$(".r2row4").not(".r2row3").hide();
       	$(".r2sec3").show();
       	$(".r2row3").show();

       } 
       if($(this).attr("name")=="r2row4"){
       	$(".sec3").not(".r2row1").hide();
       	$(".r2sec1").not(".r2row1").hide();
       	$(".r2sec2").not(".r2row1").hide();
       	$(".r2sec3").not(".r2row1").hide();
       	$(".r2sec4").show();
       	$(".r2row4").show();

       }

       if($(this).attr("name")=="row4"){
       	$(".row3").not(".row4").hide();
       	$(".sec3").show();

       }
       if($(this).attr("name")=="blue"){
       	$(".mdr_row1").not(".blue").hide();
       	$(".mdr_row2").not(".blue").hide();
       	$(".mdr_row3").not(".blue").hide();
       	$(".mdr_row4").not(".blue").hide();
       	$(".sec_mdr").show();
       	$(".blue").show();

       }

       if($(this).attr("name")=="mdr_row1"){
       	$(".sec_mdr").not(".mdr_row1").hide();
       	$(".mdr_row2").not(".mdr_row1").hide();
       	$(".mdr_row3").not(".mdr_row1").hide();
       	$(".mdr_row4").not(".mdr_row1").hide();
       	$(".sec_mdr1").show();
       	$(".mdr_row1").show();

       }

       if($(this).attr("name")=="mdr_row2"){
       	$(".sec_mdr").not(".mdr_row2").hide();
       	$(".sec_mdr1").not(".mdr_row2").hide();
       	$(".mdr_row3").not(".mdr_row2").hide();
       	$(".mdr_row4").not(".mdr_row2").hide();
       	$(".sec_mdr2").show();
       	$(".mdr_row2").show();

       }
       if($(this).attr("name")=="mdr_row3"){
       	$(".sec_mdr").not(".mdr_row3").hide();
       	$(".sec_mdr1").not(".mdr_row3").hide();
       	$(".sec_mdr2").not(".mdr_row3").hide();
       	$(".mdr_row4").not(".mdr_row3").hide();
       	$(".sec_mdr3").show();
       	$(".mdr_row3").show();

       }
       if($(this).attr("name")=="mdr_row4"){
       	$(".sec_mdr").not(".mdr_row2").hide();
       	$(".sec_mdr1").not(".mdr_row2").hide();
       	$(".sec_mdr2").not(".mdr_row2").hide();
       	$(".sec_mdr3").not(".mdr_row2").hide();
       	$(".sec_mdr4").show();
       	$(".mdr_row4").show();

       }

       if($(this).attr("name")=="row2"){
       	$(".box2").not(".row7").hide();
       	$(".row8").not(".row7").hide();
       	$(".box3").show();
       	$(".row7").show();
       }

       if($(this).attr("name")=="row9"){
       	$(".box4").not(".row9").hide();
       	$(".row9").show();
       }
       if($(this).attr("name")=="endline"){

       	$(".box1").not(".endline").hide();
       	$(".box2").not(".endline").hide();
       	$(".endline").show();
       }
*/
   });
});
</script>

<script>
<?php
for($i=21; $i<=29; $i+=2) {
		$i_1 = $i+1;
		echo "
		$( function() {
			$( \"#datepicker$i\" ).datepicker({
				changeMonth: true,
				maxDate: '0', 
				beforeShow : function()
				{
					jQuery( this ).datepicker('option','maxDate', jQuery('#datepicker$i_1').val() );
				},
				changeYear: true
			});
		} );

		$( function() {
			$( \"#datepicker$i_1\" ).datepicker({
				changeMonth: true,
				changeYear: true
			});
		} );";
	}
	for ($i=31; $i<=50; $i++) {
		echo "
		$( function() {
			$( \"#datepicker$i\" ).datepicker({
				changeMonth: true,
				changeYear: true
			});
		} );";
	}
?>
</script>

<?php
$colors = ["red", "green", "blue"];
$colorcodes = ["#d7f76d", "#f7cc6d", "#6decf7"];
$regimens = ['2RHZE/4RH', '2SRHZE/1RHZE/5RH', 'Km-Et-Z-Of-Cs'];
$startdate = 1;
$datepicker = 21;
$row = 1;
$row_1 = 0;
$regimen = 1;
    
$i = 0;
for($regimen=1; $regimen<=3; $regimen++) {
    $regnamecl = $regimen<3 ? "r$regimen" : 'mdr_';
    $regname = $regimen<3 ? "$regimen" : 'mdr_';
    $regrow = 0;
    for ($col=1; $col<=5; $col++) { // col means row within a regimen
        $cols = $col; // $col>1 ? $col : '';
        $datepicker_2 = $datepicker + 1;
        $color = $colors[$regimen-1];
        $regrow1 = $regnamecl.'+row'.($regrow+1);
        $regrow2 = $regnamecl.'-row'.($regrow); // was $regname-1
        /* 
        echo("\n\$reg_name = !empty (\$reg$regimen"."_name [$regrow]) ? \$reg$regimen"."_name [$regrow] : '2RHZE/4RH';");
        echo("\n\$start_date = !empty(\$start_date$regimen [$regrow]) ? \$start_date$regimen [$regrow] : '';");
        echo("\n\$stop_date = !empty (\$stop_date$regimen [$regrow]) ? \$stop_date$regimen [$regrow] : '';");
        echo("\n\$reason = !empty (\$reason_for_change$regimen [$regrow]) ? \$reason_for_change$regimen [$regrow] : '';");
        */
        
        eval("\$reg_name = !empty (\$reg$regimen"."_name [$regrow]) ? \$reg$regimen"."_name [$regrow] : '".$regimens[$regimen-1]."';");
        eval("\$start_date = !empty(\$start_date$regimen [$regrow]) ? \$start_date$regimen [$regrow] : '';");
        eval("\$stop_date = !empty (\$stop_date$regimen [$regrow]) ? \$stop_date$regimen [$regrow] : '';");
        eval("\$reason = !empty (\$reason_for_change$regimen [$regrow]) ? \$reason_for_change$regimen [$regrow] : '';");

        $class = $col==1 ? "$color sec": $regnamecl."row$regrow box";
        // $class_sec = $regrow==0 ? "sec$regimen" : $regnamecl."sec$regrow"; // sec$cols
        $class_sec = $regrow==0 ? "$regnamecl"."butts" : $regnamecl."butts$regrow"; // sec$cols
        echo "\n<tr class=\"$class\">
        <td style=\"background-color:$color; color:#000; min-width:110px\"><h4>Regimen. $regimen </h4></td>
        <td><input type=\"text\" name=\"regname$cols\" value=\"$reg_name\" style=\"width:150px\" id=\"td_treatment21\" /></td>
		<td> <input type=\"text\" name=\"tbstart_date$regname$cols\" value=\"$start_date\" id=\"datepicker$datepicker\" /> </td>
        <td> <input type=\"text\" name=\"tbstop_date$regname$cols\" value=\"$stop_date\" id=\"datepicker$datepicker_2\"/> </td>
        <td><textarea name=\"reason_o_changes$regname$cols\" id=\"reason_o_changes$regimen\">$reason</textarea></td>
        <td style=\"background-color:#f7cc6d; color:#000; min-width:110px\">

        <div class=\"$class_sec\">".
        ($regrow<4?"<input type=\"button\" class=\"btn btn-success\" name=\"$regrow1\" value=\"+\" />\n\t":"").
        ($regrow>0?"<input type=\"button\" class=\"btn btn-danger\" name=\"$regrow2\"  value=\"-\" />":"").
        "</div>
        </td>
        </tr>";
        $regrow++;
        $datepicker++;
    }
    $i++;
}
?>
<!--
<tr class="red sec">
        <td style="background-color:#d7f76d; color:#000; min-width:110px"><h4>Regimen. 1 </h4></td>
        <td><input type="text" name="reg1" value="<?php 
		if (!empty ($reg1_name ['0'])) { echo $reg1_name ['0']; } else { echo '2RHZE/4RH';} ?>"  style="width:150px" id="td_treatment21" /></td>
		<td> <input type="text" name="tbstart_date1" value="<?php 
			if (!empty ($start_date1 ['0'])) { echo $start_date1 ['0']; } ?>" id="datepicker21" /> </td>
        <td> <input type="text" name="tbstop_date1"   value="<?php 
				if (!empty ($stop_date1 ['0'])) { echo $stop_date1 ['0']; } ?>" id="datepicker22"/> </td>
        <td><textarea name="reason_o_changes1" id="reason_o_changes1">
			<?php if (!empty ($reason_for_change1 ['0'])) { echo $reason_for_change1 ['0']; } ?> 
        </textarea></td>
        
        <td style="background-color:#f7cc6d; color:#000; min-width:110px">
        <div class="sec1">
        <input type="button" class="btn btn-success"  name="row1"  value="+" />
        </div>
        </td>
</tr>        
<tr class="row1 box">
        <td style="background-color:#d7f76d; color:#000; min-width:110px"><h4>Regimen. 1 </h4></td>
        <td><input type="text" name="reg12" value="<?php 
					if (!empty ($reg1_name ['1'])) { echo $reg1_name ['1']; } else { echo '2RHZE/4RH';} ?>"  style="width:150px" id="td_treatment21" /></td>
        <td> <input type="text" name="tbstart_date12" value="<?php 
						if (!empty ($start_date1 ['1'])) { echo $start_date1 ['1']; } ?>" id="datepicker23" /> </td>
        <td> <input type="text" name="tbstop_date12"  value="<?php 
							if (!empty ($stop_date1 ['1'])) { echo $stop_date1 ['1']; } ?>" id="datepicker24"/> </td>
        <td><textarea name="reason_o_changes12" id="reason_o_changes1">
			<?php if (!empty ($reason_for_change1 ['1'])) { echo $reason_for_change1 ['1']; } ?>    
		</textarea></td>
		
		<td style="background-color:#f7cc6d; color:#000; min-width:110px">
        <div class="sec2">

        <input type="button" class="btn btn-success"  name="row2"  value="+" />
        <input type="button" class="btn btn-danger"  name="row0"  value="-" />
        </div>
        </td>
</tr>  
<tr class="r1row1 box">

        <td style="background-color:#d7f76d; color:#000; min-width:110px"><h4>Regimen. 1 </h4></td>
        <td><input type="text" name="reg13" value="<?php 
								if (!empty ($reg1_name ['2'])) { echo $reg1_name ['2']; } else { echo '2RHZE/4RH';} ?>"  style="width:150px" id="td_treatment21" /></td>
        <td> <input type="text" name="tbstart_date13" value="<?php 
									if (!empty ($start_date1 ['2'])) { echo $start_date1 ['2']; } ?>" id="datepicker25" /> </td>
        <td> <input type="text" name="tbstop_date13"  value="<?php 
										if (!empty ($stop_date1 ['2'])) { echo $stop_date1 ['2']; } ?>"  id="datepicker26"/> </td>
        <td><textarea name="reason_o_changes13" id="reason_o_changes1">
		<?php if (!empty ($reason_for_change1 ['2'])) { echo $reason_for_change1 ['2']; } ?>          
		</textarea></td>
		
		<td style="background-color:#f7cc6d; color:#000; min-width:110px">
        <div class="r1sec2">

        <input type="button" class="btn btn-success"  name="r1row2"  value="+" />
        <input type="button" class="btn btn-danger"  name="r1row0"  value="-" />
        </div>
        </td>
</tr>   
<tr class="r1row2 box">

        <td style="background-color:#d7f76d; color:#000; min-width:110px"><h4>Regimen. 1 </h4></td>
        <td><input type="text" name="reg14" value="<?php 
											if (!empty ($reg1_name ['3'])) { echo $reg1_name ['3']; } else { echo '2RHZE/4RH';} ?>"  style="width:150px" id="td_treatment21" /></td>
        <td> <input type="text" name="tbstart_date14" value="<?php 
												if (!empty ($start_date1 ['3'])) { echo $start_date1 ['3']; } ?>" id="datepicker27" /> </td>
        <td> <input type="text" name="tbstop_date14"  value="<?php 
													if (!empty ($stop_date1 ['3'])) { echo $stop_date1 ['3']; } ?>" id="datepicker28"/> </td>
        <td><textarea name="reason_o_changes14" id="reason_o_changes1">
<?php 
        if (!empty ($reason_for_change1 ['3'])) { echo $reason_for_change1 ['3']; } ?>            
</textarea></td>
<td style="background-color:#f7cc6d; color:#000; min-width:110px">
        <div class="r1sec3">

        <input type="button" class="btn btn-success"  name="r1row3"  value="+" />
        <input type="button" class="btn btn-danger"  name="r1row1"  value="-" />

        </div>
        </td>
        </tr>  

 <tr class="r1row4 box">
        <td style="background-color:#d7f76d; color:#000; min-width:110px"><h4>Regimen. 1 </h4></td>
        <td><input type="text" name="reg15" value="<?php 
														if (!empty ($reg1_name ['4'])) { echo $reg1_name ['4']; } else { echo '2RHZE/4RH';} ?>"  style="width:150px" id="td_treatment21" /></td>
        <td> <input type="text" name="tbstart_date15" value="<?php 
															if (!empty ($start_date1 ['4'])) { echo $start_date1 ['4']; } ?>" id="datepicker29" /> </td>
        <td> <input type="text" name="tbstop_date15" value="<?php 
																if (!empty ($stop_date1 ['4'])) { echo $stop_date1 ['4']; } ?>" id="datepicker30"/> </td>
        <td><textarea name="reason_o_changes15" id="reason_o_changes1">
<?php 
        if (!empty ($reason_for_change1 ['4'])) { echo $reason_for_change1 ['4']; } ?>      
</textarea></td>
<td style="background-color:#f7cc6d; color:#000; min-width:110px">
        <div class="r1sec4">
        <input type="button" class="btn btn-danger"  name="r1row2"  value="-" />

        </div>
        </td>
        </tr>  



        <tr class="green sec">
        <td style="background-color:#f7cc6d; color:#000; min-width:110px"><h4>Regimen. 2 </h4></td>
        <td><input type="text" name="reg2" value="<?php 
																	if (!empty ($reg2_name ['0'])) { echo $reg2_name ['0']; } else { echo '2SRHZE/1RHZE/5RH';} ?>" style="width:150px" id="td_treatment21" /></td>
        <td> <input type="text" name="tbstart_date2" value="<?php 
																		if (!empty ($start_date2 ['0'])) { echo $start_date2 ['0']; } ?>" id="datepicker31" /> </td>
        <td> <input type="text" name="tbstop_date2" value="<?php 
																			if (!empty ($stop_date2 ['0'])) { echo $stop_date2 ['0']; } ?>" id="datepicker32" /> </td>
        <td><textarea name="reason_o_changes2" id="reason_o_changes2">
<?php 
        if (!empty ($reason_for_change2 ['0'])) { echo $reason_for_change2 ['0']; } ?>      
</textarea></td>
<td style="background-color:#f7cc6d; color:#000; min-width:110px">
        <div class="sec3">

        <input type="button" class="btn btn-success"  name="r2row1"  value="+" />
        </div>
        </td>
        </tr>    

        <tr class="r2row1 box">
        <td style="background-color:#f7cc6d; color:#000; min-width:110px"><h4>Regimen. 2 </h4></td>
        <td><input type="text" name="reg22" value="<?php 
																				if (!empty ($reg2_name ['1'])) { echo $reg2_name ['1']; } else { echo '2SRHZE/1RHZE/5RH';} ?>"  style="width:150px" id="td_treatment21" /></td>
        <td> <input type="text" name="tbstart_date22" value="<?php 
																					if (!empty ($start_date2 ['1'])) { echo $start_date2 ['1']; } ?>" id="datepicker33" /> </td>
        <td> <input type="text" name="tbstop_date22" value="<?php 
																						if (!empty ($stop_date2 ['1'])) { echo $stop_date2 ['1']; } ?>" id="datepicker34" /> </td>
        <td><textarea name="reason_o_changes22" id="reason_o_changes2">
<?php 
        if (!empty ($reason_for_change2 ['1'])) { echo $reason_for_change2 ['1']; } ?>    
</textarea></td>
<td style="background-color:#f7cc6d; color:#000; min-width:110px">
        <div class="r2sec1">

        <input type="button" class="btn btn-success"  name="r2row2"  value="+" />
        <input type="button" class="btn btn-danger" name="green"  value="-" />
        </div>
        </td>
        </tr>    

        <tr class="r2row2 box">
        <td style="background-color:#f7cc6d; color:#000; min-width:110px"><h4>Regimen. 2 </h4></td>
        <td><input type="text" name="reg23" value="<?php 
																							if (!empty ($reg2_name ['2'])) { echo $reg2_name ['2']; } else { echo '2SRHZE/1RHZE/5RH';} ?>"  style="width:150px" id="td_treatment21" /></td>
        <td> <input type="text" name="tbstart_date23" value="<?php 
																								if (!empty ($start_date2 ['2'])) { echo $start_date2 ['2']; } ?>" id="datepicker35" /> </td>
        <td> <input type="text" name="tbstop_date23" value="<?php 
																									if (!empty ($stop_date2 ['2'])) { echo $stop_date2 ['2']; } ?>" id="datepicker36" /> </td>
        <td><textarea name="reason_o_changes23" id="reason_o_changes2">
<?php 
        if (!empty ($reason_for_change2 ['2'])) { echo $reason_for_change2 ['2']; } ?>          
</textarea></td>
<td style="background-color:#f7cc6d; color:#000; min-width:110px">
        <div class="r2sec2">

        <input type="button" class="btn btn-success"  name="r2row3"  value="+" />
        <input type="button" class="btn btn-danger" name="r2row1"  value="-" />
        </div>
        </td>
        </tr>    

        <tr class="r2row3 box">
        <td style="background-color:#f7cc6d; color:#000; min-width:110px"><h4>Regimen. 2 </h4></td>
        <td><input type="text" name="reg24" value="<?php 
																										if (!empty ($reg2_name ['3'])) { echo $reg2_name ['3']; } else { echo '2SRHZE/1RHZE/5RH';} ?>"  style="width:150px" id="td_treatment21" /></td>
        <td> <input type="text" name="tbstart_date24" value="<?php 
																											if (!empty ($start_date2 ['3'])) { echo $start_date2 ['3']; } ?>" id="datepicker37" /> </td>
        <td> <input type="text" name="tbstop_date24" value="<?php 
																												if (!empty ($stop_date2 ['3'])) { echo $stop_date2 ['3']; } ?>" id="datepicker38" /> </td>
        <td><textarea name="reason_o_changes24" id="reason_o_changes2">
<?php 
        if (!empty ($reason_for_change2 ['3'])) { echo $reason_for_change2 ['3']; } ?>         
</textarea></td>
<td style="background-color:#f7cc6d; color:#000; min-width:110px">
        <div class="r2sec3">

        <input type="button" class="btn btn-success"  name="r2row4"  value="+" />

        <input type="button" class="btn btn-danger" name="r2row2"  value="-" />
        </div>
        </td>
        </tr>    

        <tr class="r2row4 box">
        <td style="background-color:#f7cc6d; color:#000; min-width:110px"><h4>Regimen. 2 </h4></td>
        <td><input type="text" name="reg25" value="<?php 
																													if (!empty ($reg2_name ['4'])) { echo $reg2_name ['4']; } else { echo '2SRHZE/1RHZE/5RH';} ?>"  style="width:150px" id="td_treatment21" /></td>
        <td> <input type="text" name="tbstart_date25" value="<?php 
																														if (!empty ($start_date2 ['4'])) { echo $start_date2 ['4']; } ?>" id="datepicker39" /> </td>
        <td> <input type="text" name="tbstop_date25" value="<?php 
																															if (!empty ($stop_date2 ['4'])) { echo $stop_date2 ['4']; } ?>" id="datepicker40" /> </td>
        <td><textarea name="reason_o_changes25" id="reason_o_changes2">
<?php 
        if (!empty ($reason_for_change2 ['4'])) { echo $reason_for_change2 ['4']; } ?>         
</textarea></td>
<td style="background-color:#f7cc6d; color:#000; min-width:110px">
        <div class="r2sec4">

        <input type="button" class="btn btn-danger" name="r2row3"  value="-" />
        </div>
        </td>
        </tr>       




        <tr class="blue sec">
        <td style="background-color:#6decf7; color:#000; min-width:110px"><h4>MDR 1</h4></td>
        <td><input type="text" name="mdr" value="<?php 
																																if (!empty ($reg3_name ['0'])) { echo $reg3_name ['0']; } else { echo 'Km-Et-Z-Of-Cs';} ?>"  style="width:150px" id="td_treatment21" /></td>
        <td> <input type="text" name="tbstart_date_mdr" value="<?php 
																																	if (!empty ($start_date3 ['0'])) { echo $start_date3 ['0']; } ?>" id="datepicker41" /> </td>
        <td> <input type="text" name="tbstop_date_mdr" value="<?php 
																																		if (!empty ($stop_date3 ['0'])) { echo $stop_date3 ['0']; } ?>" id="datepicker42" /> </td>
        <td><textarea name="reason_o_changes_mdr" id="reason_o_changes_mdr">
<?php 
        if (!empty ($reason_for_change3 ['0'])) { echo $reason_for_change3 ['0']; } ?>             
</textarea></td>

<td style="background-color:#f7cc6d; color:#000; min-width:110px">
        <div class="sec_mdr">

        <input type="button" class="btn btn-success"  name="mdr_row1"  value="+" />
        </div>
        </td>
        </tr>    
        <tr class="mdr_row1 box">
        <td style="background-color:#6decf7; color:#000; min-width:110px"><h4>MDR </h4></td>
        <td><input type="text" name="mdr2" value="<?php 
																																			if (!empty ($reg3_name ['1'])) { echo $reg3_name ['1']; } else { echo 'Km-Et-Z-Of-Cs';} ?>"  style="width:150px" id="td_treatment21" /></td>
        <td> <input type="text" name="tbstart_date_mdr2" value="<?php 
																																				if (!empty ($start_date3 ['1'])) { echo $start_date3 ['1']; } ?>" id="datepicker43" /> </td>
        <td> <input type="text" name="tbstop_date_mdr2" value="<?php 
																																					if (!empty ($stop_date3 ['1'])) { echo $stop_date3 ['1']; } ?>" id="datepicker44" /> </td>
        <td><textarea name="reason_o_changes_mdr2" id="reason_o_changes_mdr">
<?php 
        if (!empty ($reason_for_change3 ['1'])) { echo $reason_for_change3 ['1']; } ?>           
</textarea></td>

<td style="background-color:#f7cc6d; color:#000; min-width:110px">
        <div class="sec_mdr1">

        <input type="button" class="btn btn-success"  name="mdr_row2"  value="+" />
        <input type="button" class="btn btn-danger" name="blue"  value="-" />
        </div>
        </td>
        </tr>    
																																				<tr class="mdr_row2 box">
																																					<td style="background-color:#6decf7; color:#000; min-width:110px"><h4>MDR </h4></td>
																																					<td><input type="text" name="mdr3" value="<?php 
																																						if (!empty ($reg3_name ['2'])) { echo $reg3_name ['2']; } else { echo 'Km-Et-Z-Of-Cs';} ?>"   style="width:150px" id="td_treatment21" /></td>
																																						<td> <input type="text" name="tbstart_date_mdr3" value="<?php 
																																							if (!empty ($start_date3 ['2'])) { echo $start_date3 ['2']; } ?>" id="datepicker45" /> </td>
																																							<td> <input type="text" name="tbstop_date_mdr3" value="<?php 
																																								if (!empty ($stop_date3 ['2'])) { echo $stop_date3 ['2']; } ?>" id="datepicker46" /> </td>
																																								<td><textarea name="reason_o_changes_mdr3" id="reason_o_changes_mdr">
																																									<?php 
																																									if (!empty ($reason_for_change3 ['2'])) { echo $reason_for_change3 ['2']; } ?>             
																																								</textarea></td>

																																								<td style="background-color:#f7cc6d; color:#000; min-width:110px">
																																									<div class="sec_mdr2">

																																										<input type="button" class="btn btn-success"  name="mdr_row3"  value="+" />
																																										<input type="button" class="btn btn-danger" name="mdr_row1"  value="-" />
																																									</div>
																																								</td>
																																							</tr>    
																																							<tr class="mdr_row3 box">
																																								<td style="background-color:#6decf7; color:#000; min-width:110px"><h4>MDR </h4></td>
																																								<td><input type="text" name="mdr4" value="<?php 
																																									if (!empty ($reg3_name ['3'])) { echo $reg3_name ['3']; } else { echo 'Km-Et-Z-Of-Cs';} ?>"  style="width:150px" id="td_treatment21" /></td>
																																									<td> <input type="text" name="tbstart_date_mdr4" value="<?php 
																																										if (!empty ($start_date3 ['3'])) { echo $start_date3 ['3']; } ?>" id="datepicker47" /> </td>
																																										<td> <input type="text" name="tbstop_date_mdr4" value="<?php 
																																											if (!empty ($stop_date3 ['3'])) { echo $stop_date3 ['3']; } ?>" id="datepicker48" /> </td>
																																											<td><textarea name="reason_o_changes_mdr4" id="reason_o_changes_mdr">
																																												<?php 
																																												if (!empty ($reason_for_change3 ['3'])) { echo $reason_for_change3 ['3']; } ?>           
																																											</textarea></td>

																																											<td style="background-color:#f7cc6d; color:#000; min-width:110px">
																																												<div class="sec_mdr3">

																																													<input type="button" class="btn btn-success"  name="mdr_row4"  value="+" />
																																													<input type="button" class="btn btn-danger" name="mdr_row2"  value="-" />
																																												</div>
																																											</td>
																																										</tr>  

																																										<tr class="mdr_row4 box">
																																											<td style="background-color:#6decf7; color:#000; min-width:110px"><h4>MDR </h4></td>
																																											<td><input type="text" name="mdr5" value="<?php 
																																												if (!empty ($reg3_name ['4'])) { echo $reg3_name ['4']; } else { echo 'Km-Et-Z-Of-Cs';} ?>"   style="width:150px" id="td_treatment21" /></td>
																																												<td> <input type="text" name="tbstart_date_mdr5" value="<?php 
																																													if (!empty ($start_date3 ['4'])) { echo $start_date3 ['4']; } ?>" id="datepicker49" /> </td>
																																													<td> <input type="text" name="tbstop_date_mdr5" value="<?php 
																																														if (!empty ($stop_date3 ['4'])) { echo $stop_date3 ['4']; } ?>" id="datepicker50" /> </td>
																																														<td><textarea name="reason_o_changes_mdr5" id="reason_o_changes_mdr">
																																															<?php 
																																															if (!empty ($reason_for_change3 ['4'])) { echo $reason_for_change3 ['4']; } ?>          
																																														</textarea></td>

																																														<td style="background-color:#f7cc6d; color:#000; min-width:110px">
																																															<div class="sec_mdr4">

																																																<input type="button" class="btn btn-danger" name="mdr_row3"  value="-" />
																																															</div>
																																														</td>
																																													</tr>  
																																												</tbody>
																																											</table>
																																										</div>
																																									</fieldset>   

																																									<div class="form-actions">
																																										<div class="span3">
																																											<a class="btn" href="app.php?back&back_treatment2<?php echo '&pat_id='.$pat_id.'&g='.$gender.'&xx='.$age.'' ?>" style="padding:10px; font-size:180%">Back</a>                                                                                                                                      </div> 
                                                                                                                                                   <div class="span3">
                                                                                                                                                   </div>

                                                                                                                                                   <div class="span3">
                                                                                                                                                   	<button type="submit" class="btn btn-success" style="padding:10px; font-size:180%" name="update_treatment3">Next</button> 
                                                                                                                                                   </div>
                                                                                                                                               </div>
-->
                                                                                                                                           </form>