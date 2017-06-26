<script type="text/javascript" src="js/jquery.js"></script>
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
<br /><hr /><br />
<form id="edit-profile" class="form-horizontal" action="review_p1.php?p&formid=<?php echo $formID; ?>" method="post" style="background-color:#e6e6e6; padding:20px">

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
    <tr>
                               <td>
                            <h4>Is Genotyping indicated?</h4> 
                                   
                                     
                        </td>
                                  <td>
                                     <div style="width:110px;  float:left" class="radio_sty span8">
    <input type="radio" id="genotyping"  name="genotyping" value="Yes"  required>
    <label for="genotyping">Yes</label>
    
    <div class="check">
		</div>
  </div>
    <div style="width:100px; float:left" class="radio_sty">
    <input type="radio" id="ngenotyping" name="genotyping" value="No" >
    <label for="ngenotyping">No</label>
    
    <div class="check">
		</div>
  </div>
  
        </td>   
                              </tr>
    <tr><td><br /></td><td><br /></td></tr>
    
    <div class="no box">
     <tr>
                              
                                  <td>
                                      <h4>Comment to Clinician?</h4>
                                      
                                      <textarea type="text" class="span4" rows="8" name="comment_to_clinician"  id="area1" ></textarea>
         </td>   
                              </tr>
    </div>       
                                 
                              </table>
                          </td>    
                    
                          </tr> 
                        
   
                          
                                                                                                                                                   <div class="form-actions">
                                                                                                                                                   <div class="span3">
               <button class="btn" style="padding:10px; float:left; font-size:180%"><a href="review_p1.php?p">Cancel</a></button>                                                                                                                                    </div>
                                                                                                                                                   <div class="span3"><!--
											<button type="submit" class="btn btn-primary" style="padding:10px; font-size:180%">Save</button> -->.
											
                                            </div>
                                            
                                            <div class="span3">
											<button type="submit" class="btn btn-success" style="padding:10px; float:right; font-size:180%" name="submit_review">Next</button> 
                                            </div>
                          </div>
    
                           
</form>