<?php


$action = isset($_GET['action']) ? $_GET['action'] : "";

if ($action == "") {
  header("location: login.php?login_required");
}

else{
  echo "welcome user";
}

 ?>
