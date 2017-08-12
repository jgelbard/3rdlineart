<script type="text/javascript" >
function changeClass(id)
{
    document.getElementById(id).classList.toggle('active');        
}

</script>
<div class="subnavbar">
  <div class="subnavbar-inner">
    <div class="container">
      <ul class="mainnav">
        <li><a href="dash.php?p"><img src="../img/app_log.png" width="100px"></a></li> 
     <li id="Facility_menubtn" onclick=changeClass(id)><a href="dash.php?man_facility" class="button btn btn-invert btn-large" style="margin:5px">Facility </a></li> 
     <li id="Drugs_menubtn" onclick=changeClass(id)><a href="dash.php?man_drugs" class="button btn btn-invert btn-large" style="margin:5px">Drugs </a></li>
     <li id="Affiliates_menubtn" onclick=changeClass(id)><a href="dash.php?man_affliates" class="button btn btn-invert btn-large" style="margin:5px">Affiliates </a></li>
        <li><a href="dash.php?man_rev" class="button btn btn-invert btn-large" style="margin:5px">Reviewers </a></li>
        <li><a href="dash.php?man_clin" class="button btn btn-invert btn-large" style="margin:5px">Clinician </a></li>           
        <li><a href="dash.php?man_lab" class="button btn btn-invert btn-large" style="margin:5px">Lab user </a></li>
        <li><a href="dash.php?man_sec" class="button btn btn-invert btn-large" style="margin:5px">Secretary </a></li>
        <li><a href="../reports.php" target="_blank" class="button btn btn-invert btn-large" style="margin:5px">Reports </a> </li>
      </ul>
    </div>
  </div>
</div>
