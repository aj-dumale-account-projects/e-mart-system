<?php
include_once '../config/database.php';
include_once '../objects/owner.php';

$page_title = "Store Registration";
include_once 'layout_head.php';

$database = new Database();
$db = $database->getConnection();

$owner = new Owner($db);

if ($_POST) {

  $owner->store_name = $_POST['store_name'];
  $owner->firstname = $_POST['firstname'];
  $owner->lastname = $_POST['lastname'];
  $owner->email_address = $_POST['email_address'];
  $owner->contact_number = $_POST['contact_number'];
  $owner->address = $_POST['address'];
  $owner->password = $_POST['password'];

  if ($_POST['password'] != $_POST['confirm_password']) {
    echo "pasword not matched.";
  }elseif($owner->emailExist()){
    echo "<div class='alert alert-danger'>";
      echo "<span class='glyphicon glyphicon-exclamation-sign'></span>";
      echo "<label> Email already exist.</label>";
    echo "</div>";
  }elseif ($owner->storeExist()) {
    echo "<div class='alert alert-danger'>";
      echo "<span class='glyphicon glyphicon-exclamation-sign'></span>";
      echo "<label> Store Name is taken.</label>";
    echo "</div>";
  }else{
    $owner->create();
    echo "<div class='alert alert-success'>Your Store has been added.</div>";
  }
}

//include the register_template
include_once 'register_template.php';
include_once 'layout_foot.php';
?>
