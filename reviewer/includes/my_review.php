<?php

$expert_review_form=mysqli_query( $bd,"SELECT * FROM expert_review_form where form_id ='$formID' and rev_id = '$rev_id' "); 
while ($row_expert_review_form=mysqli_fetch_array($expert_review_form)){

	$rev_id = $row_expert_review_form['rev_id'];
	$genotyping = $row_expert_review_form['genotyping'];
	$comment_to_clinician = $row_expert_review_form['comment_to_clinician'];
	$date_reviewed = $row_expert_review_form['date_reviewed'];

	$select_reviewer = mysqli_query( $bd,"SELECT * FROM reviewer where id='$rev_id'"); 
	$row_select_reviewer = mysqli_fetch_array($select_reviewer);

	$rev_fname = $row_select_reviewer['fname']; 
	$rev_lname = $row_select_reviewer['lname']; 
	$rev_title = $row_select_reviewer['title']; 

	$rev_fullname = $rev_title.'.  '.$rev_fname.' '.$rev_lname;

	echo ' 
	<table class="table table-striped table-bordered" title="Reviewer 1">
		<th><h4>My Review from: <strong><u> '.$date_reviewed.'</u></strong></h4></th>
		<tr><td><p style="font-size: 12pt;">Genotyping: <b>'.$genotyping.'</b></p>
			<h4>Comment</h4>
			<p style="font-size: 12pt;">
				'.$comment_to_clinician.'
			</p>
		</td></tr>
	</table>
	';
}

?>
