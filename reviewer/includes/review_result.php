<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $('input[type="radio"]').click(function(){
        if($(this).attr("value")=="SwitchYes"){
            $(".box").not(".yes").hide();
            $(".yes").show();
        }
        if($(this).attr("value")=="SwitchNo"){
            $(".box").not(".no").hide();
            $(".no").show();
        }
        
    });
});
</script>

<br /><hr /><br />
<form id="edit-profile" class="form-horizontal" action="review_p1.php?result&formid=<?php echo $formID; ?>" method="post" style="background-color:#e0e0e0; padding:20px">

<h2 style="background-color:#f5ec10; text-align:center">Expert Form Review</h2>
                          <hr style=" border: 1.5px solid #b49308;" />
   
<script type="text/javascript">
      jQuery(document).ready(function ($) {
    $('input[name="art_interrup"]').on('click', function () {
        if ($(this).val() === 'Yes') {
            $('#datepicker,#art_interupt_reason').prop("disabled", false);
        } else {
            $('#datepicker,#art_interupt_reason').prop("disabled", "disabled");
        }
    });
});
</script>  
     
        <script type="text/javascript" src="../../js/tinymce/tinymce.min.js"></script>
<script type="text/javascript">
tinymce.init({
    selector: "textarea",
    theme: "modern",
    plugins: [
        "advlist autolink lists link image charmap print preview hr anchor pagebreak",
        "searchreplace wordcount visualblocks visualchars code fullscreen",
        "insertdatetime nonbreaking save table contextmenu directionality",
        "emoticons template paste textcolor colorpicker textpattern"
    ],
    toolbar1: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
    toolbar2: "print preview | forecolor backcolor emoticons",
    image_advtab: true,
    templates: [
        {title: 'Test template 1', content: 'Test 1'},
        {title: 'Test template 2', content: 'Test 2'}
    ]
});
</script> 
    
    <table style="width:100%">
        <tr>
        <td>
         <h4>Is PI mutation present?</h4>
            
             <div style="width:110px; float:left" class="radio_sty">
    <input type="radio" id="pi_mutation" name="pi_mutation" value="Yes"  required>
    <label for="pi_mutation">Yes</label>
    
    <div class="check">
		</div>
  </div>
    <div style="width:100px; float:left" class="radio_sty">
    <input type="radio" id="npi_mutation" name="pi_mutation" value="No" >
    <label for="npi_mutation">No</label>
    
    <div class="check">
		</div>
  </div>
            <!--<div class="controls" style="position:relative; left:-150px">
                                            <label class="radio inline">
                                              <input type="radio"  name="pi_mutation" value="Yes" id="app_radio" required> Yes
                                            </label>
                                            
                                            <label class="radio inline">
                                              <input type="radio" name="pi_mutation" value="No" id="app_radio"> No
                                            </label>
                                          </div>	 /controls -->  
            
              
        </td>
        
        </tr>
        <tr><td>   
            <h4>Switch Patient to 3rd line drug?</h4> 
            
            
             <div style="width:110px; float:left" class="radio_sty span12">
    <input type="radio" id="switch"  name="switch" value="SwitchYes"  required>
    <label for="switch">Yes</label>
    
    <div class="check">
		</div>
  </div>
    <div style="width:100px; float:left" class="radio_sty">
    <input type="radio" id="nswitch" name="switch" value="SwitchNo" >
    <label for="nswitch">No</label>
    
    <div class="check">
		</div>
  </div>
            <!--<div class="controls" style="position:relative; left:-150px">
                                            <label class="radio inline">
                                              <input type="radio"  name="switch" value="SwitchYes" id="app_radio" required> Yes
                                            </label>
                                            
                                            <label class="radio inline">
                                              <input type="radio" name="switch" value="SwitchNo" id="app_radio"> No
                                            </label>
                                          </div>	 /controls  -->   
        
            
            </td></tr>
    </table>
     <div class="yes box">
    
     <table style="width:100%; font-size:120%" >
        <hr />
        <tr>
        <td>
            <p><i>*If switch is indicated, suggest ART regimen</i></p>
         <P>ART Regimen</P>  
            <p><strong>Drug 1:</strong> 
                <select name="drug1">
                <option>none</option>
                <option>AZT</option>
                <option>ABC</option>
                <option>TDF</option>
                <option>3TC</option>
                <option>EFV</option>
                <option>NVP</option>
                <option>LPV/r</option>
                <option>ATV/r</option>
                <option>DRV/r</option>
                <option>ETV</option>
                <option>RAL</option>
                </select>
            </p> 
           <p><strong>Drug 2:</strong>
            
             <select name="drug2">
                <option>none</option>
                <option>AZT</option>
                <option>ABC</option>
                <option>TDF</option>
                <option>3TC</option>
                <option>EFV</option>
                <option>NVP</option>
                <option>LPV/r</option>
                <option>ATV/r</option>
                <option>DRV/r</option>
                <option>ETV</option>
                <option>RAL</option>
                </select>
            </p> 
           <p><strong>Drug 3:</strong>
              <select name="drug3">
                <option>none</option>
                <option>AZT</option>
                <option>ABC</option>
                <option>TDF</option>
                <option>3TC</option>
                <option>EFV</option>
                <option>NVP</option>
                <option>LPV/r</option>
                <option>ATV/r</option>
                <option>DRV/r</option>
                <option>ETV</option>
                <option>RAL</option>
                </select>
            
            </p> <p><strong>Drug 4:</strong>
              <select name="drug4">
                <option>none</option>
                <option>AZT</option>
                <option>ABC</option>
                <option>TDF</option>
                <option>3TC</option>
                <option>EFV</option>
                <option>NVP</option>
                <option>LPV/r</option>
                <option>ATV/r</option>
                <option>DRV/r</option>
                <option>ETV</option>
                <option>RAL</option>
                </select>
            
            </p> <p><strong>Drug 3:</strong>
              <select name="drug5">
                <option>none</option>
                <option>AZT</option>
                <option>ABC</option>
                <option>TDF</option>
                <option>3TC</option>
                <option>EFV</option>
                <option>NVP</option>
                <option>LPV/r</option>
                <option>ATV/r</option>
                <option>DRV/r</option>
                <option>ETV</option>
                <option>RAL</option>
                </select>
            
            </p> 
            </td>
            <td>
           <h4>Comment: </h4>
           <textarea type="text" class="span4" rows="4" name="comment_to_clinician"  id="area1" ></textarea>    
        </td>
       
        </tr>
     
    </table>
    
    </div>
    <div class="no box">
        <table style="width:100%; font-size:120%" >
        <hr />
        <tr>
     <td>
         <p><i>*If switch is NOT indicated, suggest ART regimen</i></p>
            <h4>Feedback to Clinician</h4>
              <textarea type="text" class="span4" rows="12" style="width:80%" name="feedback_to_clinician"  id="area1" ></textarea> 
        </td>
            </tr>
        </table>
    
    
    </div>
   
    
                <div class="form-actions">
                                                                                                                                                   <div class="span3">
               <button class="btn" style="padding:10px; font-size:180%"><a href="review_p1.php?p">Cancel</a></button>                                                                                                                                    </div>
                                                                                                                                                   <div class="span3"><!--
											<button type="submit" class="btn btn-primary" style="padding:10px; font-size:180%">Save</button> -->.
											
                                            </div>
                                            
                                            <div class="span3">
											<button type="submit" class="btn btn-success" style="padding:10px; font-size:180%" name="submit_review_result">Next</button> 
                                            </div>
                          </div>
    
                           
</form>