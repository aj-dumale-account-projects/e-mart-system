
<?php
$page_title = "Register";
include 'layout_header.php';

include_once 'config/database.php';
include_once 'objects/customer.php';

$database = new Database();
$db = $database->getConnection();

$customer = new Customer($db);

if ($_POST) {
  $customer->firstname = $_POST['firstname'];
  $customer->lastname = $_POST['lastname'];
  $customer->email_address = $_POST['email_address'];
  $customer->contact_number = $_POST['contact_number'];
  $customer->password = $_POST['password'];
  $_POST['confirm_password'];

  if ($_POST['password'] != $_POST['confirm_password'] ) {
    echo "<div class='alert alert-danger'>Password not matched</div>";

  }else if($customer->checkEmailExist()){
    echo "<div class='alert alert-danger'>Email Already Exist</div>";

  }elseif ($customer->checkContactNOExist()) {
    echo "<div class='alert alert-danger'>Contact NO. is taken.</div>";

  }else{
    $customer->create();
    echo "<div class='alert alert-success'>Register Success</div>";
  }


}



?>

<form class="form-group" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
		<div class="form-group">
			<input type="text" name="firstname" class="form-control" placeholder="First Name" required>
		</div>

		<div class="form-group">
			<input type="text" name="lastname" class="form-control" placeholder="Last Name" required>
		</div>

    <div class="form-group">
      <input type="text" name="contact_number" class="form-control" placeholder="Contact NO." required>
    </div>

    <div class="form-group">
      <input type="email" name="email_address" class="form-control" placeholder="Email Address" required>
    </div>

    <div class="form-group">
      <input type="password" name="password" class="form-control" placeholder="Password" required>
    </div>

    <div class="form-group">
      <input type="password" name="confirm_password" class="form-control" placeholder="Re-type Password" required>
    </div>

    <div class="form-group">
      <p>Already account? <a href="login.php?action=login_required">Sign in</a></p>
    </div>

		<div class="form-group">
			<button type="submit" class="btn btn-primary mt-3" name="button">Sign Up</button>
		</div>

</form>

<?php include_once 'layout_footer.php'; ?>
