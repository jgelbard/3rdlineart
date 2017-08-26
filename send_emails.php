<?php
require 'includes/config.php';
require 'includes/email_templates.php';

function get_email_body($id) {
      global $bd;
      // echo 'id='.$id;
      $query_email = "SELECT body from email_log WHERE sent = 0 and id = ".$id;      
      $emails=mysqli_query( $bd, $query_email);
      // echo 'rows='.mysqli_num_rows($emails);
      while ($row_emails=mysqli_fetch_array($emails))
          return base64_decode($row_emails['body']);
}

function get_email_body2($id) {
      global $bd;
      echo 'id='.$id;

      $query_email = "SELECT body from email_log WHERE sent = 0 and id = ?";
      $stmt = mysqli_prepare($bd, $query_email);
      mysqli_stmt_bind_param($stmt, "i", $id);
      mysqli_stmt_execute($stmt);
      mysqli_stmt_store_result($stmt);
      mysqli_stmt_bind_result($stmt, $body);
      mysqli_stmt_fetch($stmt);

      return $body;
}

function mail_unsentmsgs() {
    global $bd;
    $curMonth = date("m");
    $curDay = date("j");
    $curYear = date("Y");
    $date_sent = "$curYear/$curMonth/$curDay";
    
	$query_unsent_emails = "SELECT id, msg_from, msg_to, subject from email_log WHERE sent = 0";
    $emails=mysqli_query( $bd, $query_unsent_emails); 

    while ($row_emails=mysqli_fetch_array($emails)) {
        $id = $row_emails['id'];
            // echo $id;
        $from = $row_emails['msg_from'];      
        $to = $row_emails['msg_to'];
        $subject = $row_emails['subject'];
        $body = get_email_body($id); // $row_emails['body'];
        // echo "body: $body";
        // echo '<img src="data:image/jpeg;base64,' . base64_encode($body) . '" width="200" height="200">';
        if ($body == '')
            continue;
        // echo "$to, $subject, $from";
        phpmailer_send($to, $subject, $body, $from);
    }
}
mail_unsentmsgs();
?>
