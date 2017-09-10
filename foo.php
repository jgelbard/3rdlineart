<?php
$s = file_get_contents ('/home/jgelbard/Documents/baobab/harnessing_technology_for_healthcare_improvement.pdf', false);
$es = base64_encode($s);
file_put_contents('/tmp/harness.pdf.64', $es);
$ep = file_get_contents ('/tmp/harness.pdf.64', false);
$p = base64_decode($ep);
file_put_contents('/tmp/harness.pdf', $p);
?>
