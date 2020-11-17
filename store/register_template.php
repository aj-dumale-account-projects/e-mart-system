
<div class="panel-group">
  <div class="panel panel-primary">
    <div class="panel-heading">
      <label class=""><span class="glyphicon glyphicon-edit"></span> Sign Up Form.</label>
    </div>
    <div class="panel-body">

<form class="row" action="<?php htmlspecialchars($_SERVER["PHP_SELF"] )?>" method="post">
    <div class="col-sm-6">
        <label class="mt-2">Store Name:</label>
        <input type="text" id="register_field" class="form-control" name="store_name" required>
    </div>

    <div class="col-sm-6">
       	<label class="mt-2">Email Address</label>
        <input type="email" class="form-control" name="email_address" required>
    </div>

    <div class="col-sm-6">
        <label class="mt-3">First Name:</label>
        <input type="text" id="register_field" class="form-control" name="firstname" required>
    </div>

    <div class="col-sm-6">
       	<label class="mt-3">Password:</label>
        <input type="password" id="register_field" class="form-control" name="password" required>
    </div>

    <div class="col-sm-6">
        <label class="mt-3">Last Name:</label>
        <input type="text" id="register_field" class="form-control" name="lastname" required>
     </div>

    <div class="col-sm-6">
        <label class="mt-3">Confirm Password:</label>
        <input type="password" class="form-control" name="confirm_password" required>
    </div>

    <div class="col-sm-6">
        <label class="mt-3">Contact No.</label>
        <input type="text" class="form-control" name="contact_number" required>
    </div>

    <div class="col-sm-6">
        <button type="submit" id="button_submit" class="btn btn-primary mt-5"><span class="glyphicon glyphicon-floppy-save"></span> Submit</button>
        <button type="reset" id="button_submit" class="btn btn-danger mt-5"><span class="	glyphicon glyphicon-refresh"></span> Clear</button>

    </div>

    <div class="col-sm-6">
        <label class="mt-3">Addres</label>
       	<input type="text" id="register_field" class="form-control" name="address" required>
    </div>

    <div class="col-sm-6">
        <a href="login.php">Sign In</a>

    </div>
</form>
