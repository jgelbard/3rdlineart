<?php
// echo 'loading queries...';


if (file_exists('config.php')) {
    include_once('config.php');    
    include_once ("crypt_function.php");
} else {
    include_once('includes/config.php');    
    include_once ("includes/crypt_function.php");
}

//calculating age of patient 
function getAge($dob) { 
    $dob = explode("/", $dob); 
    $curMonth = date("m");
    $curDay = date("j");
    $curYear = date("Y");
    // echo "curYear: $curYear";
    $age = $curYear - $dob[2]; 
    if($curMonth<$dob[0] || ($curMonth==$dob[0] && $curDay<$dob[1])) 
        $age--; 
    return $age; 
}

class Patient {
    public $fullname;
    public $firstname;
    public $lastname;
    public $age;
    public $dob;
    public $gender;
    public $art_id_num;
    public $pat_art_clinic;
    public $vl_sample_id;
    public $date_created;
    public $enc;
    
    private $row_pat;
    public function __construct($id, $id_type='patient')
    {
        $bd = $GLOBALS['bd'];
        $key = $GLOBALS['key'];
        
        // echo "my key: $key";
        if ($id_type == 'patient') 
            $query = "SELECT * FROM patient WHERE id = '$id'";
        else if ($id_type == 'form')
            $query = "SELECT p.* FROM patient p INNER JOIN form_creation fc on p.id = fc.patient_id WHERE fc.3rdlineart_form_id = '$id'";

        $pat = mysqli_query($bd, $query); 
        $row_pat = mysqli_fetch_assoc($pat);
        $enc = $row_pat['enc'];
        
        // echo "\nencrypt $enc -> ".$row_pat['firstname']." ".$row_pat['lastname'];        

        // db column order specific
        // $this->row_pat[1] = $this->pat_art_clinic = $enc ? decrypt($row_pat['pat_art_clinic'], $key) : $row_pat['pat_art_clinic'];
        // $this->row_pat['pat_art_clinic'] = $this->pat_art_clinic = $enc ? decrypt($row_pat['pat_art_clinic'], $key) : $row_pat['pat_art_clinic'];
        // echo $enc.'=>'.(decrypt($row_pat['pat_art_clinic'], $key) : $row_pat['pat_art_clinic']);
        $this->pat_art_clinic = $enc ? decrypt($row_pat['pat_art_clinic'], $key) : $row_pat['pat_art_clinic'];
        // $this->row_pat['art_id_num'] = $this->art_id_num = $enc ? decrypt($row_pat['art_id_num'], $key) : $row_pat['art_id_num'];
        $this->art_id_num = $enc ? decrypt($row_pat['art_id_num'], $key) : $row_pat['art_id_num'];
        // $this->row_pat['firstname'] = $this->firstname = ($enc == 1) ? decrypt($row_pat['firstname'], $key) : $row_pat['firstname'];
        $this->firstname = ($enc == 1) ? decrypt($row_pat['firstname'], $key) : $row_pat['firstname'];
        //  $this->row_pat['lastname'] = $this->lastname = $enc ? decrypt($row_pat['lastname'], $key) : $row_pat['lastname'];
        $this->lastname = $enc ? decrypt($row_pat['lastname'], $key) : $row_pat['lastname'];
        $this->date_created = $row_pat['date_created'];
        $this->row_pat = $row_pat;
        // echo $this->firstname.' '.$this->lastname;
        /*
          echo "**************";
          foreach($this->row_pat as $key => $value)
             echo "\n$key: $value";
          echo "\n**************";
        */
        $this->gender = $row_pat['gender'];
        $this->dob = $row_pat['dob'];
        $this->vl_sample_id = $row_pat['vl_sample_id'];
        $this->fullname = $this->firstname." ".$this->lastname;       
        $this->age = GetAge($this->dob);
        $this->enc = $enc;
    }
    
    public function Describe()
    {
        return $this->fullname . " is " . $this->age . " years old";
    }
    
    public function getProp($prop='') {
        if ($prop == '')
            return $this->row_pat;
        else
            return ($this->row_pat)[$prop];
    }

    public function getFullname() {
        return $this->fullname;
    }
  
    public function getConsReviews2($clinicianID, $formmID) {
        $query = "SELECT * FROM patient, form_creation, expert_review_consolidate2 WHERE  form_creation.3rdlineart_form_id=expert_review_consolidate2.form_id and form_creation.clinician_id ='$clinicianID' and form_creation.patient_id=patient.id and expert_review_consolidate2.form_id ='$formID' ORDER BY `form_creation`.`3rdlineart_form_id` DESC";
        return mysqli_query($this->$bd, $query); 
    }
}

/*
./includes/app_consolidated2_view.php:12:$form_creation=mysqli_query( $bd,"SELECT * FROM patient, form_creation, expert_review_consolidate2 WHERE  form_creation.3rdlineart_form_id=expert_review_consolidate2.form_id and form_creation.clinician_id ='$clinicianID' and form_creation.patient_id=patient.id and expert_review_consolidate2.form_id ='$formID' ORDER BY `form_creation`.`3rdlineart_form_id` DESC"); 

./includes/db_operations/insert_patient.php:18:    $check_patient=mysqli_query( $bd,"SELECT * FROM patient where art_id_num='$art_id_num' "); 

./includes/app_consolidated1_view.php:11:$form_creation=mysqli_query( $bd,"SELECT * FROM patient, form_creation, expert_review_consolidate1 WHERE  form_creation.3rdlineart_form_id=expert_review_consolidate1.form_id and form_creation.clinician_id ='$clinicianID' and form_creation.patient_id=patient.id and expert_review_consolidate1.form_id ='$formID' ORDER BY `form_creation`.`3rdlineart_form_id` DESC"); 

../includes/app_clinic_status_edit.php:147:$patient_side_effects=mysqli_query( $bd,"SELECT * FROM patient_side_effects where patient_id='$pat_id' ");

./pih/includes/lab_sample.php:23:       $patient=mysqli_query( $bd,"SELECT * FROM patient,form_creation where patient.id=form_creation.patient_id and form_creation.3rdlineart_form_id='$formid' "); 

./includes/db_operations/update_clinic_status.php:90:   $insert_pat_side_effect="INSERT INTO patient_side_effects (patient_id,PeripheralNeuropathy,Jaundice,Lipodystrophy,KidneyFailure,Psychosis,Gynecomastia,Anemia,other)

./includes/db_operations/insert_clinic_status.php:82:// echo(" INSERT  INTO patient_side_effects (patient_id,PeripheralNeuropathy,Jaundice,Lipodystrophy,Psychosis,Gynecomastia,Anemia,other) VALUES ('$patient_id', '$Jaundice', '$Lipodystrophy', '$KidneyFailure', '$Psychosis', '$Gynecomastia','$Anemia','$other')");

./includes/db_operations/insert_clinic_status.php:84:$insert_pat_side_effect=" INSERT  INTO patient_side_effects (patient_id,PeripheralNeuropathy,Jaundice,Lipodystrophy,KidneyFailure,Psychosis,Gynecomastia,Anemia,other)
./includes/db_operations/insert_patient.php:23:$insert_patient=" INSERT  INTO patient(pat_art_clinic,art_id_num,firstname,lastname,gender,dob,vl_sample_id, date_created)

./includes/db_operations/update_patient.php:16:$sql_update_patient = "UPDATE patient
      
./includes/db_operations/update_clinic_status.php:124:  $sql_update_patient = "UPDATE patient 
*/

$cp_query = [
    'select_assigned_forms' => "SELECT distinct form_id,date_assigned FROM assigned_forms 
         WHERE form_id not in (select form_id from expert_review_consolidate1) 
         ORDER BY `assigned_forms`.`form_id` DESC",
    'select_new_forms' => "SELECT * FROM form_creation 
         WHERE status='Complete' and complete !='Rejected' 
         ORDER BY `form_creation`.`3rdlineart_form_id` DESC ",
    'select_expert_review_consolidate1' => "SELECT * FROM expert_review_consolidate1 
         ORDER BY `expert_review_consolidate1`.`id` DESC ",
    'select_sec_pending_sample' => "SELECT * FROM expert_review_consolidate1 
         WHERE genotyping='Yes' and form_id not in (select form_id from sample) ORDER BY `expert_review_consolidate1`.`id` DESC ",
    'select_sec_pending_results' => "SELECT * FROM form_creation, lab_vl_repeat 
         WHERE form_id not in (select form_id from app_results) and form_creation.3rdlineart_form_id=lab_vl_repeat.form_id ORDER BY `form_creation`.`3rdlineart_form_id` DESC",
    'select_sec_results_under_review' => "SELECT distinct form_id,date_assigned 
         FROM assigned_app_results WHERE form_id not in (select form_id from expert_review_consolidate2) ORDER BY `assigned_app_results`.`form_id` DESC",
    'select_sec_reviewed_results' => "SELECT * FROM expert_review_consolidate2 ORDER BY `expert_review_consolidate2`.`id` DESC ",
];

$rev_query = [
];

$lab_query = [
];

$admin_query = [
    'select_drugs' => 'SELECT * FROM drugs',
    'select_facilitys' => 'SELECT * FROM facility',
    'select_affiliates' => 'SELECT * FROM partner_org',
    'select_rev' => 'SELECT * FROM reviewer',
    'select_clinician' => 'SELECT * FROM clinician',
    'select_labs' => 'SELECT * FROM pih_lab',
    'select_sec' => 'SELECT * FROM secretary',
    'select_admin' => 'SELECT * FROM admin',
];

$main_query = [
];

/*
$p = new Patient(384);
echo "\n".$p->getFullname()."\n".$p->fullname."\n";
echo $p->getProp('dob').' age: '.$p->age."\n";

$arr = ['one', 'two', 'three'];
list($a, $b, $c) = $p->getProp();
echo "\n$a";
echo "\n$b";
echo "\n$c";
*/

// $p = new Patient(267, 'form');
/*
$select_patients = "SELECT * FROM patient";
$patients = mysqli_query($bd, $select_patients);
while ($row = mysqli_fetch_array($patients)) {
    echo "id: ".$row['id'];
    $p = new Patient($row['id']);
    echo "*********** ".$p->getProp('firstname').' '.$p->getProp('lastname').' '.$p->getProp('pat_art_clinic').' '.$p->pat_art_clinic;
echo "\n";
}

$p = new Patient(410);
echo $p->getProp('firstname').' '.$p->getProp('lastname').' '.$p->getProp('pat_art_clinic').' '.$p->pat_art_clinic;
// list($id, $clinic, $art_id_num, $firstname, $lastname, $gender, $dob, $vl_sample_id, $date_created) = $p->getProp();  // order dependent (but concise)
// echo "id: $id, art_clinic: $clinic, $art_id_num, fn: $firstname, ln: $lastname, g: $gender, dob: $dob, samp: $vl_sample_id, created: $date_created";
// echo "<br>".$p->firstname." ".$p->lastname.": ".$p->gender.", age: ".$p->age.", art_clinic: ".$p->pat_art_clinic;
// testClass(411);
*/
?>