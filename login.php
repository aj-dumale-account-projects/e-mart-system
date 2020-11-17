
<?php
include 'config/core.php';
$page_title = "Login";
include 'layout_header.php';

if ($_POST) {

	include_once 'config/database.php';
	include_once 'objects/customer.php';

	$database = new Database();
	$db = $database->getConnection();

	$customer = new Customer($db);

	$customer->email_address = $_POST["email_address"];

	$e_address_exist = $customer->emailExist();

	if ($e_address_exist && password_verify($_POST["password"], $customer->password)) {

    $_SESSION["id"] = $customer->id;
    $_SESSION["firstname"] = $customer->firstname;
    $_SESSION["lastname"] = $customer->lastname;

    header("location: index.php?action=logged_in_success&id={$_SESSION['id']}");
}else{
    echo "<div class='alert alert-danger'>";
        echo "<p class='text-center mt-2'>";
          echo"<span class='glyphicon glyphicon-warning-sign'></span> Invalid Email Address or Password. </p>";
    echo "</div>";
  }





}


?>

		<form class="form-group" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">

			<div class="imagecontainer">
				<img src="image/login_icon.jpg" alt="avatar" class="avatar">
			</div>

			<div class="form-group">
				<input type="text" name="email_address" class="form-control" placeholder="Username">
			</div>

			<div class="form-group">
				<input type="password" name="password" class="form-control" placeholder="Password">
			</div>

			<div class="form-group">
				<a href="#">Forgot Password?</a>
			</div>
			<div class="form-group">
				<p>Don't have account? <a href="register.php">Sign Up</a></p>
			</div>

			<div class="form-group">
				<button type="submit" class="btn btn-primary mt-3" name="button">Sign In</button>
			</div>

</form>

<?php include_once 'layout_footer.php'; ?>
