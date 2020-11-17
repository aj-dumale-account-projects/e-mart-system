<?php

include_once '../config/core.php';



$action = isset($_GET['action']) ? $_GET['action']: "";

if ($action == 'logged_in_success') {
  $_SESSION['store_name'];
  $_SESSION['firstname'];
  $_SESSION['lastname'];
  $_SESSION['contact_number'];
  $_SESSION['address'];
  include_once 'index_template.php';
}else{
  echo "please logged in  <a href='login.php'>Here</a>";
}
 ?>






<?php include_once 'layout_foot.php'; ?>
