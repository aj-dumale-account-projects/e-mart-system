<?php

include '../config/core.php';

$page_title = "Store Login Access";
include 'layout_head.php';
?>

<div class="panel-group" id='store_login'>
  <div class="panel panel-primary">
    <div class="panel-heading">
      <label class="">Welcome</label>
    </div>
    <div class="panel-body">

<?php
if ($_POST) {
  include '../config/database.php';
  include '../objects/owner.php';

  $database = new Database();
  $db = $database->getConnection();

  $owner = new Owner($db);

  $owner->email_address = $_POST["email_address"];
  $email_address_exist = $owner->EAexist();

  if ($email_address_exist && password_verify($_POST["password"], $owner->password)) {

    $_SESSION["id"] = $owner->id;
    $_SESSION["store_name"] = $owner->store_name;
    $_SESSION["firstname"] = $owner->firstname;
    $_SESSION["lastname"] = $owner->lastname;
    $_SESSION["contact_number"] = $owner->contact_number;
    $_SESSION["address"] = $owner->address;

    header("location: index.php?action=logged_in_success&id={$_SESSION['id']}");
}else{
    echo "<div class='alert alert-danger'>";
        echo "<p class='text-center'>";
          echo"<span class='glyphicon glyphicon-warning-sign'></span> Invalid Email Address or Password. </p>";
    echo "</div>";
  }
}

?>



<form class="row" action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST">

  <div class="col-lg-12">
    <label class="mt-3">Email Address:</label>
    <input type="email" name="email_address" class="form-control">
  </div>

  <div class="col-lg-12">
    <label class="mt-3">Password:</label>
    <input type="password" name="password" class="form-control">
  </div>

  <div class="col-lg-12">
    <a href="#">Forgot Password?</a>
  </div>

  <div class="col-lg-12">
    <button type="submit" id="btn_login" class="btn btn-success mt-5">Login</button>
  </div>
  <div class="col-lg-12">
    <a href="register.php" id="">Sign Up</label></a>
  </div>


</form>

<?php include_once 'layout_foot.php'; ?>
